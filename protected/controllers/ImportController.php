<?php

class ImportController extends Controller {

    /**
     * @var string the default background image for this controller.
     */
    public $background = './images/document-index.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => [
                    'queryArtemis',
                    'legacyImportComplete',
                    'syncLdapPods',
                    'legacyProject',
                    'legacyProjects',
                    'legacyDocument',
                    'legacyDocumentRelation'
                ],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
            // deny all users
            ['deny'],
        ];
    }

    /**
     * Redirects to the Documents index page, sending it's id as the parent
     * project id up which the document interface depends
     *
     * @param integer $id the ID of the project to be displayed
     */
    public function actionView($id) {
        $this->redirect(['document/index', 'project_id' => $id]);
    }

    public function actionاختبار() {
        echo shell_exec("balls");
        Yii::app()->end();
    }

    public function actionSyncLdapPods() {
        Pod::syncPods();
    }

    public function actionQueryArtemis($query = null) {
        if (empty($query)) {
            $query = 'SELECT * FROM pg_tables;';
        }
        $sql = urlencode($query);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");

        if (strpos($json, 'has failed')) {
            $err = trim(explode(':', $json)[1]);
            $return = [['error' => $err]];
            $json = json_encode($return, JSON_PRETTY_PRINT);
        }
        $this->render('view', [
            'json' => $json,
            'query' => $query
        ]);
    }

    public function actionLegacyImportComplete($legacy_project_id) {
        $model = Project::model()->findByAttributes(['legacy_id' => $legacy_project_id]);
        $model->imported = true;
        echo json_encode(['success' => $model->save()]);
        Yii::app()->end();
    }

// Interface to pull records from the pdms database on artemis
    public function actionLegacyProjects() {
        $sql = urlencode("select * from project");
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $oldProjects = CJSON::decode($json);
        foreach ($oldProjects as $oldProj) {
            $project = new Project();
            $project->legacy_id = $oldProj['id'];
            $project->title = $oldProj['project'];
            $project->archived = ($oldProj['is_archived'] === '1');
            $project->restricted = ($oldProj['is_restricted'] === '1');
            if ($project->save()) {
                echo "{$project->title} imported</br>";
            } else {
                echo "{$project->title} Not imported</br>";
            }
        }
    }

// Interface to pull records from the pdms database on artemis
    public function actionLegacyProject($legacy_project_id) {
        $this->updateDocCounts();
        if (!isset($legacy_project_id) or $legacy_project_id == "")
            Yii::app()->end('Nope');
        $project = Project::model()->findByAttributes(['legacy_id' => $legacy_project_id]);
        $sql = urlencode("select id, title from document where projectid = $legacy_project_id");
        $docsJson = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");

        $docsArr = CJSON::decode($docsJson);
        $this->render('index', array(
            #'alreadyDone' => CJSON::encode($alreadyDone),
            'docs' => $docsArr,
            'docsJson' => $docsJson,
            'project' => $project,
        ));
    }

    public function actionLegacyDocument($legacy_document_id, $update = false) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No');
        $return = '';
        $sql = "SELECT d.id,d.title,d.projectid ,
	author.author,
	type.type,
	topic.topic,
	electronicdocument, identification_number,pages,notes,
    is_restricted, received_on, created_on
FROM
	document d
	left JOIN author ON (d.authorid = author.id)
	left JOIN topic ON (d.topicid = topic.id)
	left JOIN type ON (d.typeid = type.id)
WHERE
    d.id = $legacy_document_id";

        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $oldDocs = CJSON::decode($json);
        $oldPath = null;
        $oldDoc = $oldDocs[0];
        if ($update) {
            $document = Document::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
        }
        if (!isset($document))
            $document = new Document();

        $project = Project::model()->findByAttributes(['legacy_id' => $oldDoc['projectid']]);


        $document->legacy_id = $oldDoc['id'];
        $document->title = strlen(trim($oldDoc['title'])) > 0 ? $oldDoc['title'] : 'Empty Title';
        $document->project_id = $project->id;
        $document->corporate_author = $oldDoc['author'];
        $document->type = $oldDoc['type'];
        $document->topic = $oldDoc['topic'];
        $document->catalog_number = $oldDoc['identification_number'];

        if (is_numeric($oldDoc['pages']))
            $document->page_count = $oldDoc['pages'];

        $document->notes = $oldDoc[''];
        $document->received_date = $oldDoc['received_on'];
        $document->original_date = $oldDoc['created_on'];
        if (strlen($oldDoc['electronicdocument'])) {
            $oldPath = '/var/lib/intradox/IntraDox/';
            $oldPath .= $oldDoc['projectid'] . '/';
            $oldPath .= $oldDoc['electronicdocument'];
        }

        $document->restricted = ($oldDoc['is_restricted'] === '1');
        $extension = strtolower(substr($oldDoc['electronicdocument'], strrpos($oldDoc['electronicdocument'], '.') + 1));
        $document->file_extension = $extension;
        if ($document->save()) {
            $log = Log::model()->findByAttributes(['action' => 'CREATE', 'super_id' => $document->id]);
            if ($log) {
                $log->log_time = $document->received_date;
                $log->save();
            }
            $return .= $this->fart("Record imported");
            if (!is_null($oldPath) && file_exists($oldPath)) {
                $newPath = $document->getFilePath($extension);
                if (@copy($oldPath, $newPath)) {
                    $document->file_extension = $extension;
                    $return .= $this->fart("File '{$oldPath}' copied to '$newPath'");
                    $document->full_text = $document->readFileText();
                    if ($document->save()) {
                        $return .= $this->fart("Second save successful! file_extension: {$document->file_extension}, full_text size:" . strlen($document->full_text));
                    } else
                        $return .= $this->fart("Second save failed:" . CJSON::encode($document->errors), false);

                    $document->makeThumbnail();
                } else {
                    $return .= $this->fart("{$oldPath} Not copied to $newPath", false);
                }
            } else {
                $return .= $this->fart("File copy failed: '{$oldPath}' Doesn't exits or is null", FALSE);
            }
        } else {
            $errs = '';
            foreach ($document->errors as $field => $error) {
                $errs .= "<br/>$field: {$error[0]}";
            }
            $return .= $this->fart("Not imported. $errs", FALSE);
        }
        echo '<div id="reponse_id">' . "{$document->legacy_id}</div><div id=\"reponse_text\">$return</div>";
        Yii::app()->end();
    }

    public function actionLegacyDocumentRelation($legacy_document_id) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No');
        $return = '';
        $sql = "SELECT documentid_b FROM document_document WHERE documentid_a  = $legacy_document_id";

        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        if ($json != 'null') {
            $oldDocDocs = CJSON::decode($json);
            $document = Document::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
            if ($document) {
                foreach ($oldDocDocs as $oldDocDoc) {
                    $documentb = Document::model()->findByAttributes(['legacy_id' => $oldDocDoc['documentid_b']]);
                    if ($documentb) {
                        $docDoc = new DocumentDocument();
                        $docDoc->document_id_a = $document->id;
                        $docDoc->document_id_b = $documentb->id;
                        if ($docDoc->save()) {
                            $return .= $this->fart("Relation imported: $documentb->title");
                        } else {
                            $errs = '';
                            foreach ($docDoc->errors as $field => $error) {
                                $errs .= "<br/>$field: {$error[0]}";
                            }
                            $return .= $this->fart("Not imported. $errs", FALSE);
                        }
                    } else {
                        $return .= $this->fart("Document b ({$oldDocDoc['documentid_b']}) not found.", FALSE);
                    }
                }
            } else {
                $return .= $this->fart("Document a ($legacy_document_id) not found.", FALSE);
            }
        } else {
            $return = $this->fart('No relations found', FALSE);
        }
        echo '<div id="reponse_id">' . "{$legacy_document_id}</div><div id=\"reponse_text\">$return</div>";
        Yii::app()->end();
    }

    private function fart($says, $happy = true) {
        $color = $happy ? 'lightgreen' : 'pink';
        $return = '<p style="background-color: ' . $color . '">';
        $return .= $says;
        $return .= '</p>';
        return $return;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Project('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Project']))
            $model->attributes = $_GET['Project'];

        $this->render('admin', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Project::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    private function updateDocCounts() {
        $sql = "UPDATE project SET document_count = (SELECT count(*) FROM document WHERE project_id = project.id) ";
        Yii::app()->db->createCommand($sql)->queryScalar();
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'project-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

?>

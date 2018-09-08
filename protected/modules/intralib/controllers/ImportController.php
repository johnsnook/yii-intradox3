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
                    'legacyMonographs',
                    'legacyMonograph',
                    'legacyAuthorRelations',
                    'legacyCorpAuthorRelations',
                    'legacySubjectRelations',
                    'legacyTest'
                ],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
            // deny all users
            ['deny'],
        ];
    }

    public function actionLegacyTest() {
        //echo json_encode(LegacyImport::LegacyAuthors(), JSON_PRETTY_PRINT);
        echo "<pre>";
        echo json_encode(LegacyImport::LegacySubjects(), JSON_PRETTY_PRINT);
        echo "</pre>";
    }

// Interface to pull records from the pdms database on artemis
    public function actionLegacyMonographs() {
        $sql = urlencode("select id, title from il_monograph ");
        $docsJson = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");

        $this->render('index', array(
            'docsJson' => $docsJson,
        ));
    }

    public function actionLegacyMonograph($legacy_document_id) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No legacy ID');
        $return = '';
        $sql = "SELECT m.*, location 
        FROM il_monograph m
	LEFT JOIN il_location ON (m.location_id = il_location.id)
        WHERE m.id = {$legacy_document_id}";

        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $oldMs = CJSON::decode($json);
        $oldPath = null;
        $oldM = $oldMs[0];
        $m = Monograph::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
        if (is_null($m)) {
            $m = new Monograph();

            $m->legacy_id = $oldM['id'];
            $m->accession_number = $oldM['accession_number'];
            $m->call_number = $oldM['call_number'];
            $m->title = strlen(trim($oldM['title'])) > 0 ? $oldM['title'] : 'Empty Title';
            $m->series_title = strlen(trim($oldM['series_title'])) > 0 ? $oldM['series_title'] : '';
            $m->location = $oldM['location'];
            $m->pages = $oldM['pages'];
            $m->year = $oldM['year'];
            $m->volumn_number = $oldM['volumn_number'];
            $m->edition_number = $oldM['edition_number'];
            $m->binding = $oldM['binding'];
            $m->document_type = $oldM['document_type'];
            $m->agency_number = $oldM['agency_number'];
            $m->notes = $oldM['notes'];
            if (strlen($oldM['file_name'])) {
                $oldPath = '/var/lib/intradox/IntraLib/';
                $oldPath .= $oldM['file_name'];
            }

            $extension = strtolower(substr($oldM['file_name'], strrpos($oldM['file_name'], '.') + 1));
            $m->file_extension = $extension;
            if ($m->save()) {
                $return .= $this->fart("Record imported");
                if (!is_null($oldPath) && file_exists($oldPath)) {
                    $newPath = $m->getFilePath($extension);
                    if (@copy($oldPath, $newPath)) {
                        $m->file_extension = $extension;
                        $return .= $this->fart("File '{$oldPath}' copied to '$newPath'");
                        $m->full_text = $m->readFileText();
                        if ($m->save()) {
                            $return .= $this->fart("Second save successful! file_extension: {$m->file_extension}, full_text size:" . strlen($m->full_text));
                        } else {
                            $return .= $this->fart("Second save failed:" . CJSON::encode($m->errors), false);
                        }
                    } else {
                        $return .= $this->fart("{$oldPath} Not copied to $newPath", false);
                    }
                } else {
                    $return .= $this->fart("File copy failed: '{$oldPath}' Doesn't exits or is null", FALSE);
                }
            } else {
                $errs = '';
                foreach ($m->errors as $field => $error) {
                    $errs .= "<br/>$field: {$error[0]}";
                }
                $return .= $this->fart("Not imported. $errs", FALSE);
            }
        } else {
            $return .= $this->fart("Skipping $m->title since it already exists.");
        }
        echo '<div id="reponse_id">' . "{$m->legacy_id}</div><div id=\"reponse_text\">$return</div>";
        Yii::app()->end();
    }

    public function actionLegacyAuthorRelations($legacy_document_id) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No');
        $return = '';
        $sql = "SELECT author_id FROM il_monograph_author WHERE monograph_id  = $legacy_document_id";
        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        if ($json != 'null') {
            $oldRecs = CJSON::decode($json);
            $m = Monograph::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
            if ($m) {
                foreach ($oldRecs as $oldRec) {
                    $a = Author::model()->findByAttributes(['legacy_id' => $oldRec['author_id']]);
                    if ($a) {
                        $rel = new MonographAuthor();
                        $rel->monograph_id = $m->id;
                        $rel->author_id = $a->id;
                        if ($rel->save()) {
                            $return .= $this->fart("Author Relation imported: $a->title");
                        } else {
                            $errs = '';
                            foreach ($rel->errors as $field => $error) {
                                $errs .= "<br/>$field: {$error[0]}";
                            }
                            $return .= $this->fart("Author Relation Not imported. $errs", FALSE);
                        }
                    } else {
                        $return .= $this->fart("$a->tableName ({$oldRec['author_id']}) not found.", FALSE);
                    }
                }
            } else {
                $return .= $this->fart("$m->tableName ($legacy_document_id) not found.", FALSE);
            }
        } else {
            $return = $this->fart('No Author relations found', FALSE);
        }
        echo '<div id="reponse_id">' . "{$legacy_document_id}</div><div id=\"reponse_text\">$return</div>";
        Yii::app()->end();
    }

    public function actionLegacyCorpAuthorRelations($legacy_document_id) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No');
        $return = '';
        $sql = "SELECT corporate_author_id FROM il_monograph_corporate_author WHERE monograph_id  = $legacy_document_id";
        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        if ($json != 'null') {
            $oldRecs = CJSON::decode($json);
            $m = Monograph::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
            if ($m) {
                foreach ($oldRecs as $oldRec) {
                    $a = CorporateAuthor::model()->findByAttributes(['legacy_id' => $oldRec['corporate_author_id']]);
                    if ($a) {
                        $rel = new MonographCorporateAuthor();
                        $rel->monograph_id = $m->id;
                        $rel->corporate_author_id = $a->id;
                        if ($rel->save()) {
                            $return .= $this->fart("Corporate Author Relation imported: $a->title");
                        } else {
                            $errs = '';
                            foreach ($rel->errors as $field => $error) {
                                $errs .= "<br/>$field: {$error[0]}";
                            }
                            $return .= $this->fart("Corporate Author Relation Not imported. $errs", FALSE);
                        }
                    } else {
                        $return .= $this->fart("$a->tableName ({$oldRec['corporate_author_id']}) not found.", FALSE);
                    }
                }
            } else {
                $return .= $this->fart("$m->tableName ($legacy_document_id) not found.", FALSE);
            }
        } else {
            $return = $this->fart('No Corporate Author relations found', FALSE);
        }
        echo '<div id="reponse_id">' . "{$legacy_document_id}</div><div id=\"reponse_text\">$return</div>";
        Yii::app()->end();
    }

    public function actionLegacySubjectRelations($legacy_document_id) {
        if (!isset($legacy_document_id))
            Yii::app()->end('No');
        $return = '';
        $sql = "SELECT subject_id FROM il_monograph_subject WHERE monograph_id  = $legacy_document_id";
        $sql = urlencode($sql);
        $json = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        if ($json != 'null') {
            $oldRecs = CJSON::decode($json);
            $m = Monograph::model()->findByAttributes(['legacy_id' => $legacy_document_id]);
            if ($m) {
                foreach ($oldRecs as $oldRec) {
                    $a = Subject::model()->findByAttributes(['legacy_id' => $oldRec['subject_id']]);
                    if ($a) {
                        $rel = new MonographSubject();
                        $rel->monograph_id = $m->id;
                        $rel->subject_id = $a->id;
                        if ($rel->save()) {
                            $return .= $this->fart("Subject Relation imported: $a->title");
                        } else {
                            $errs = '';
                            foreach ($rel->errors as $field => $error) {
                                $errs .= "<br/>$field: {$error[0]}";
                            }
                            $return .= $this->fart("Subject Relation Not imported. $errs", FALSE);
                        }
                    } else {
                        $return .= $this->fart("$a->tableName ({$oldRec['author_id']}) not found.", FALSE);
                    }
                }
            } else {
                $return .= $this->fart("$m->tableName ($legacy_document_id) not found.", FALSE);
            }
        } else {
            $return = $this->fart('No Subject relations found', FALSE);
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

}

?>

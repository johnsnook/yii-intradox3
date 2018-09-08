<?php

class DocumentController extends ProjectChildController {

    /**
     * @var string the default background image for this controller.
     */
    public $background = '/images/document-view.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['index', 'view', 'quickView', 'download', 'wordCount', 'getNetworkGraphData', 'timelineAjax', 'getGridView', 'getPieData', 'getExcel', 'createSupplementaryForm'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER, ROLE_CLIENT])',
            ],
            ['allow', // allow users and admins to perform 'create' and 'update' actions
                'actions' => ['create', 'test', 'delete', 'update', 'duplicate', 'd2a', 'd2c', 'viz'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'sphinx', 'batchProcess', 'nuke', 'fixTypes', 'searchAndReplacePreview'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
            ['deny', // deny all users
                'users' => ['*'],
            ],
        ];
    }

    public function actionSphinx($query, $project_id) {
        $project_id = intval($project_id);
        if (strlen(trim($query))) {
            $query = addslashes($query);
            $s = new SphinxClient();
            if ($s->setServer("127.0.0.1", 9312) == false) {
                throw new Exception("Unable to connect to the Sphinx searchd service.  Please contact Marjorie.", $code);
                return null;
            }
            $s->SetLimits(0, 1001, 1000);
            $s->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
//$s->SetRankingMode(SPH_RANK_SPH04);
            $s->setMatchMode(SPH_MATCH_EXTENDED);

            $s->SetFieldWeights([
                "title" => 4,
                "author" => 3,
                "topic" => 4,
                "type" => 3,
                "catno" => 2,
                "notes" => 2,
                "date" => 2,
                "text" => 1
            ]);

            $s->setMaxQueryTime(30);
            echo "$project_id <br/>";
            $s->SetFilter('project_id', [$project_id]);
            $result = $s->query($query, 'id3');
        }

        echo '<pre>' . json_encode($result, JSON_PRETTY_PRINT) . '</pre>';
        Yii::app()->end($s->GetLastError());
        if ($result['total'] > 0) {
            $docs = [];
            $words = '';
            $docs = array_keys($result['matches']);
            $words = implode(' ', array_keys($result['words']));
            $fields = $result['fields'];
            $files = [];
            $documents = Document::model()->findAllByPk($docs);
            foreach ($documents as $doc) {
                $files[] = $doc->title
                        . ' ' . $doc->file_extension
                        . ' ' . $doc->corporate_author
                        . ' ' . $doc->topic
                        . ' ' . $doc->type
                        . ' ' . $doc->catalog_number
                        . ' ' . $doc->notes
                        . ' ' . $doc->original_date
                        . ' ' . $doc->full_text
                        . ' ' . $doc->createDatetime
                ;
                $excerpts = $s->BuildExcerpts($files, 'id3', $words);
                ?>
                <p><?= $doc->title ?>: <?= $excerpts[0] ?></p>
                <?php
            }
        } else {
            echo "No results";
        }

        Yii::app()->end($s->GetLastError());
    }

    /**
     * Deletes all records in this project
     * @param type $project_id
     */
    public function actionNuke($project_id) {
        Document::model()->deleteAll('project_id = :projectId', [':projectId' => $project_id]);
        $this->redirect($this->createUrl('document/index', ['project_id' => $project_id]));
    }

// this will be useful after checkboxes are added to grid
    public function actionBatchProcess($project_id) {

    }

    /**
     * Returns html for the documents timeline using the search criteria
     * This method is used by the 'timeline' widget.
     * @return html
     */
    public function actionTimelineAjax($project_id, $year, $month, $group) {
        if (!$group)
            $group = 'type';
#header('Content-type: application/json');
        $model = new Document('search');

        $criteria = $model->searchDBCriteria();
        $criteria->addCondition("original_date is not null");

        if (is_numeric($year)) {
            $criteria->order = "original_date ASC, $group, title";
            if (is_numeric($month)) {
                $criteria->addCondition("original_date like '$year-$month%'");
            } else {
                $criteria->addCondition("original_date like '$year%'");
            }
        } else {
            $criteria->select = 'substring(original_date for 4) as original_date';
            $criteria->distinct = true;
            $criteria->order = "original_date ASC";
        }

        $docsDP = new CActiveDataProvider('Document', [
            'criteria' => $criteria,
            'pagination' => false, #$this->userData->paginationParam,
        ]);
        $docs = $docsDP->getData();

        $timelineData = [];
        if (is_numeric($year)) {
            if (empty($month)) { // Year range only
                foreach ($docs as $index => $row) {
                    $date = explode('-', $row['original_date']);
                    if (count($date) > 1)
                        $timelineData[$date[1]][$row[$group]][] = [$row['original_date'], $row['title'], $row['id'], $group];
                    else
                        $timelineData[0][$row[$group]][] = [$row['original_date'], $row['title'], $row['id'], $group];
                }
                echo $this->widget('ext.timeline.year', [
                    'project_id' => $this->Project->id,
                    'months' => $timelineData,
                    'ajaxURL' => $this->createUrl('timelineAjax'),
                    'titleField' => 'title',
                    'dateField' => 'original_date',
                    'groupField' => $group
                        ], true);

#echo CJSON::encode($timelineData);
            }
        }else {// Just send the main timeline widget with the years
            foreach ($docs as $index => $row) {
// we're just trying to make an array where the year is the index
// and the document count is the value
                $timelineData[] = ['year' => $row['original_date']];
            }
            echo $this->widget('ext.timeline.timeline', [
                'project_id' => $project_id,
                'years' => $timelineData,
                'ajaxURL' => $this->createUrl('timelineAjax'),
                'titleField' => 'title',
                'dateField' => 'original_date',
                'groupField' => $group
                    ], true);
        }
        Yii::app()->end();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title . ' - View ' . $model->title);

        $this->background = '/images/document-view.jpg';
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $this->Project->id]];
        $this->NavbarItems[] = ['label' => SnookTools::truncate($model->title, 30), 'icon' => 'file', 'url' => ['document/view', 'id' => $model->id]];

        $this->loadProject($model->project_id);
        $model_name = strtolower(get_class($model));
        $logDataProvider = new CActiveDataProvider('Log', [
            'criteria' => [
                'condition' => "model= '$model_name' AND super_id = $id",
                'order' => 'log_time DESC',
            ],
        ]);

// Log what we've been viewing
        $model->logView();

        $this->render('view', [
            'model' => $model,
            'logDataProvider' => $logDataProvider,
        ]);
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionQuickView($id) {
        $model = $this->loadModel($id);

        $this->loadProject($model->project_id);


        $this->renderPartial('index/_quickView', [
            'model' => $model,
        ]);
        Yii::app()->end();
    }

    public function actionWordCount($project_id) {
        $sql = "SELECT distinct word, count(*) FROM ("
                . "select regexp_split_to_table(title, '\s') as word from document where project_id = :pid UNION "
                . "select regexp_split_to_table(corporate_author, '\s') as word from document where project_id = :pid UNION "
                . "select regexp_split_to_table(topic, '\s') as word from document where project_id = :pid UNION "
                . "select regexp_split_to_table(type, '\s') as word from document where project_id = :pid UNION "
                . "select regexp_split_to_table(full_text, '\s') as word from document where project_id = :pid "
                . ") as words group by word order by count desc ;";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindValue(':pid', $project_id);
        $docsArray = $cmd->queryAll();
        echo json_encode($docsArray, JSON_PRETTY_PRINT);
    }

    /**
     * Creates a new model.  This action is typically called twice by the user:
     * The first time, there is no $_POST, so it renders the form
     * The second time, there is a post from the form and we redirect
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * We're also using ajax validation, so this action will also be called several
     * times but should return with performAjaxValidation
     */
    public function actionCreate($project_id) {
        $this->loadProject($project_id);
        $model = new Document;
        $model->project_id = $project_id;
        //$model->class_name = 'document';
        // This also terminates the action with some validation json

        if (isset($_POST['ModelName'])) {
            /* DocumentController handles the document parent class as well as
             * the child models for DocumentArticle and DocumentCorrespondence.
             */
            $modelName = $_POST['ModelName'];
            $e = '$newModel = new ' . $modelName . ';';
            eval($e);
            // we only save if we have a $modelName
            $newModel->attributes = $_POST[$modelName];
            $this->performAjaxValidation($newModel);

            // this handles the file upload
            if ($this->saveAndUpload($newModel, $modelName)) {
                $this->redirect($this->createUrl('view', ['id' => $newModel->id]));
            } else
                $model = $newModel;
//            } else
//                throw new CException('Save failed. newModel->attributes =' . json_encode($newModel->attributes, JSON_PRETTY_PRINT));
        }

        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title . ' - Add document');
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $this->Project->id]];


// mix in the types that every project has
        $typesArray = $model->lookupDistinctField('type', $project_id);

// This is first time action is called, render the default form
        $this->render('create', [
            'model' => $model,
            'authorsArray' => $model->lookupDistinctField('corporate_author', $project_id),
            'topicsArray' => $model->lookupDistinctField('topic', $project_id),
            'typesArray' => $typesArray,
        ]);
    }

    /**
     * Duplicates a  model.  This action is typically called twice by the user:
     * The first time, there is no $_POST, so it renders the form
     * The second time, there is a post from the form and we redirect
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * This function is a weird hybrid between the create and update action.
     *
     * First, we load the model we're going to duplicate
     *
     * We're also using ajax validation, so this action will also be called several
     * times but should terminate when performAjaxValidation is called
     * @var $className
     */
    public function actionDuplicate($id) {
        $model = $this->loadModel($id);
        $model->id = $model->full_text = $model->file_extension = null;
        $model->setIsNewRecord(true);
        $this->performAjaxValidation($model);

        if (isset($_POST['ModelName'])) {
            $modelName = $_POST['ModelName'];
            $e = '$newModel = new ' . $modelName . ';';
            eval($e);
            // we only save if we have a $modelName
            $newModel->attributes = $_POST[$modelName];
            // this handles the file upload
            if ($this->saveAndUpload($newModel, $modelName)) {
                $this->redirect($this->createUrl('view', ['id' => $newModel->id]));
            } else
                echo "Save Failed";
        }

        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title . ' - Duplicate document');
        $model->title .= ' - Duplicate document';
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $this->Project->id]];

        $this->render('create', [
            'model' => $model,
            'authorsArray' => $model->lookupDistinctField('corporate_author', $model->project_id),
            'topicsArray' => $model->lookupDistinctField('topic', $model->project_id),
            'typesArray' => $model->lookupDistinctField('type', $model->project_id),
        ]);
    }

// converts a document record to a document_correspondence by caling a stored procedure
    public function actionD2c($id) {
        $sql = "select id from public.intradox_document_to_correspondence(:id)";
        $r = Yii::app()->db->createCommand($sql)->bindValue(':id', $id)->queryRow();
        $this->actionView($id);
    }

// converts a document record to a document_article by caling a stored procedure
    public function actionD2a($id) {
        $sql = "select id from public.intradox_document_to_article(:id)";
        $r = Yii::app()->db->createCommand($sql)->bindValue(':id', $id)->queryRow();
        $this->actionView($id);
    }

    /**
     * Hear that Mr. Anderson?  That's the sound of inevitability.
     *
     * @param Document $model
     * @param string $class
     * @return Document A new DocumentArticle or DocumentCorrespondence object
     * with attributes copied from $model
     */
    private function ConvertDocClass($model, $class) {
//$oldclass = get_class($model);
        switch ($class) {
            case 'DocumentArticle':
                $return = new DocumentArticle();
                $return->setAttributes($model->attributes, FALSE);
                break;
            case 'DocumentCorrespondence':
                $return = new DocumentCorrespondence();
                $return->setAttributes($model->attributes, FALSE);
                break;
            case 'Document':
                $return = new Document;
                $return->setAttributes($model->attributes, FALSE);

                break;
            default:
                throw new CHttpException(400, 'No class name specified, wtf indeed.');
        }
        return $return;
    }

    public function actionFixTypes($project_id) {
        $this->render('convert', [
            'project_id' => $project_id,
        ]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $className = get_class($model);

// returns json errors, terminates action
        $this->performAjaxValidation($model);

        if (isset($_POST[$className])) {
            $model->attributes = $_POST[$className];
            /* this handles the file upload         */
            if ($this->saveAndUpload($model, $className)) {
                $this->redirect($this->createUrl('view', ['id' => $model->id]));
            }
        }

// first time rendering, or we have errors
        $this->setPageTitle(Yii::app()->name . ' -  ' . $this->Project->title . ' - Edit ' . $model->title);
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['project/view', 'id' => $this->Project->id]];
        $this->NavbarItems[] = ['label' => SnookTools::truncate($model->title, 20), 'icon' => 'file', 'url' => ['document/view', 'id' => $model->id]];

        $typesArray = $model->lookupDistinctField('type', $model->project_id);

        $sql = "SELECT id, title FROM document WHERE project_id = :pid AND id != :docid ORDER BY title";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindValue(':pid', $model->project_id);
        $cmd->bindValue(':docid', $model->id);
        $docsArray = $cmd->queryAll();

        $this->render('update', [
            'model' => $model,
            'authorsArray' => $model->lookupDistinctField('corporate_author', $model->project_id),
            'topicsArray' => $model->lookupDistinctField('topic', $model->project_id),
            'typesArray' => $typesArray,
            'docsArray' => $docsArray,
        ]);
    }

    /**
     * Saves the record and uploads the electronic document if one was attached.
     * Also calls the makeThumbnail and readText private methods
     *
     * The retarded _FILES structure
     * $_FILES[fieldname] => array(
     *     [name] => array(of names of each file)
     *     [type] => array(etc)
     *     [tmp_name] => array(etc)
     *     [error] => array()
     *     [size] => array()
     * );
     *
     * What I'm getting in $_FILES
     * {
     *     "Document": {
     *         "name": {"temp_file": "262792039-Fuck-This-Court.pdf"},
     *         "type": {"temp_file": "application\/pdf"},
     *         "tmp_name": {"temp_file": "\/tmp\/php4niOav"},
     *         "error": {"temp_file": 0},
     *         "size": {"temp_file": 1552747}
     *     }
     * }
     *
     * @param CActiveRecord $model the document model
     * @return boolean
     */
    private function saveAndUpload($model, $className = 'Document') {

        $bSaved = false;

        if (isset($_POST[$className])) {
            $model->attributes = $_POST[$className];

            /** saves the document to document relationship
             * @todo change to use aradvancedbehavior method
             */
            $model->documents1 = $_POST[$className]['documents'];

            $bSaved = $model->save();
            if ($bSaved == false) {
                //throw new CException("Error saving document" . var_export($model->getErrors(), true));
            }
            if ($bSaved and isset($_FILES[$className]) and strlen($_FILES[$className]['tmp_name']['temp_file'])) {// The upload
//if ($model->temp_file) {
//throw new CException(json_encode($_FILES));
                $model->temp_file = $_FILES[$className]['tmp_name']['temp_file'];
                $destination = $_FILES[$className]['name']['temp_file'];

                $file_extension = strtolower(substr($destination, strrpos($destination, '.') + 1));
                $destination = $model->getFilePath($file_extension);

                if (!file_exists($model->temp_file) or ! is_readable($model->temp_file) or ! is_uploaded_file($model->temp_file)) {
                    throw new CException($model->temp_file . ',' . $destination . ', ' . json_encode($_FILES));
                }
                if (!is_writable(dirname($destination))) {
                    throw new CHttpException("Cain't write to dir", "Call cousin Lee, we can't write the file: $destination");
                }
// move the file from temp storage to its final home and update
// our record with the proper extension and get the full text
// for searching
                if (move_uploaded_file($model->temp_file, $destination)) {
                    $model->file_extension = $file_extension;
                    $model->full_text = $model->readFileText();
                    $model->save();
                    $model->makeThumbnail();
                } else {
                    throw new CException($model->temp_file . ',' . $destination . ', ' . json_encode($_FILES));
                }
//}
            }
        } else
            throw new CException("$_POST[$className] no set. \$className =$className ");

        return $bSaved;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateSupplementaryForm($class_name, $id = 0) {
        switch ($class_name) {
            case 'document_article':
                if ($id > 0)
                    $model = DocumentArticle::model()->findByPk($id);
                else
                    $model = new DocumentArticle();
                $form = '_articleForm';
                break;
            case 'document_correspondence':
                if ($id > 0)
                    $model = DocumentCorrespondence::model()->findByPk($id);
                else
                    $model = new DocumentCorrespondence();
                $form = '_correspondenceForm';
                break;
        }

        $this->renderPartial($form, [
            'model' => $model,
        ]);
        Yii::app()->end();
    }

    /**
     * Downloads the associated electronic document.
     *
     * @param integer $id the ID of the model pointing to the electronic document
     */
    public function actionDownload($id, $embed = false) {
        $model = $this->loadModel($id);
#$file = Yii::app()->params['docs_path'] . "$model->project_id/$model->filename";
        $file = $model->filePath;
        $filename = SnookTools::sanitize($model->title) . '.' . $model->file_extension;
        header('Content-Description: File Transfer');
        if ($model->file_extension == 'pdf' && $embed) {
            header("Content-type:application/pdf");
            header("Content-Disposition:inline;filename='$filename'");
        } else {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $filename);
            header('Content-Transfer-Encoding: binary');
        }
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $project_id = $model->project_id;

            if (file_exists($model->filePath))
                unlink($model->filePath);
            if (file_exists($model->thumbnailPath))
                unlink($model->thumbnailPath);

            if ($model->delete()) {
                if (isset($_REQUEST['ajax'])) {
                    echo $this->createUrl('index', ['project_id' => $project_id]);
                    Yii::app()->end();
                } else
                    $this->redirect(['index', ['project_id' => $project_id]]);
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex($project_id, $query = null) {
        $this->layout = "//layouts/full_width";
        $project = $this->loadProject($project_id);
        $this->setPageTitle(Yii::app()->name . ' -  ' . $this->Project->title);
        $this->background = '/images/document-index.jpg';
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-open', 'url' => $this->createUrl('document/index', ['project_id' => $this->Project->id])];

        if (!isset($project_id))
            $this->redirect($this->createUrl('project/index'));

        /**
         * Document DataProvider for the grid and timeline
         */
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
#$model->searchFields = ['title', 'corporate_author', 'topic', 'type', 'notes', 'original_date', 'full_text'];

        if (isset($_GET['Document'])) {
            $model->attributes = $_GET['Document'];
            Yii::app()->session['searchAttr'] = $_GET['Document'];
        }
        $model->project_id = $project_id;

// Log that we've been viewing this particular project
        $project->logView();

        /**
         *  Get the logs for this project and any documents
         */
        $logDataProvider = new CActiveDataProvider('Log', [
            'criteria' => [
                'condition' => "super_id = :pid OR super_id in (SELECT id from document where project_id = :pid)",
                'order' => 'log_time DESC',
                'params' => [':pid' => $project_id]
            ],
            'pagination' => $this->userData->paginationParam,
        ]);

        /**
         *  Get most recently viewed documents
         */
        $criteria = new CDbCriteria;

        $sort = 'log.log_time DESC';
        if (isset($_POST['rdpSort']))
            $sort = $_POST['rdpSort'];

//$criteria->select = 't.*';
        $criteria->order = $sort;
        $criteria->join = 'INNER JOIN log ON t.id = log.super_id';
        $criteria->condition = "log.person_id=:personId AND log.action = 'VIEW' AND t.project_id = :pid";
        $criteria->params = [':personId' => Yii::app()->user->id, ':pid' => $project_id];

        $recentDocumentsProvider = new CActiveDataProvider('Document', [
            'criteria' => $criteria,
            'pagination' => $this->userData->paginationParam,
        ]);
        $recentDocumentsProvider->sort->defaultOrder = 'log.log_time DESC';

        /**
         *  Get favorite documents
         */
//$FavoriteDP = Favorite::model()->GetMyFavorites('document');
        $FavoriteDP = new CActiveDataProvider('document', [
            'criteria' => [
                'condition' => "project_id = :pid AND id in (SELECT super_id from favorite where person_id = :userId)",
                'order' => 'title ASC',
                'params' => [':pid' => $project_id, ':userId' => Yii::app()->user->id]
            ],
            'pagination' => $this->userData->paginationParam,
        ]);

        /**
         *  Get saved searches
         */
        $searchesDP = new CActiveDataProvider('DocumentSearch', [
            'criteria' => [
                'condition' => "project_id = :pid",
                'order' => 'title ASC',
                'params' => [':pid' => $project_id]
            ],
            'pagination' => false,
        ]);
        $p = $this->userData->paginationParam;
        $p['route'] = 'document/getGridView';
        if (is_null($query)) {
            $docsGridDP = new CActiveDataProvider('Document', [
                'criteria' => [
                    'condition' => "project_id = :pid",
                    'order' => 'id desc',
                    'params' => [':pid' => $project_id]
                ],
                'sort' => ['defaultOrder' => 'id desc', 'route' => 'document/getGridView'],
                'pagination' => $p,
            ]);
        } else {
            $docsGridDP = $model->search($query);
        }

        $this->render('index', [
            'model' => $model,
            'docsGridDP' => $docsGridDP,
            'project' => $project,
            'FavoriteDP' => $FavoriteDP,
            'logDataProvider' => $logDataProvider,
            'recentDocumentsProvider' => $recentDocumentsProvider,
            'searchesDP' => $searchesDP,
            'authorsArray' => $model->lookupDistinctListOptions('corporate_author', $project_id),
            'topicsArray' => $model->lookupDistinctListOptions('topic', $project_id),
            'typesArray' => $model->lookupDistinctField('type', $project_id),
        ]);
    }

    /**
     * Lists all models.
     */
    public function actionViz($project_id) {
        $this->layout = "//layouts/full_width";
        $project = $this->loadProject($project_id);
        $this->setPageTitle(Yii::app()->name . ' -  ' . $this->Project->title);
        $this->background = '/images/vizbg.jpg';
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => $this->createUrl('document/index', ['project_id' => $this->Project->id])];

        if (!isset($project_id))
            $this->redirect($this->createUrl('project/index'));

        /**
         * Document DataProvider for the grid and timeline
         */
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
#$model->searchFields = ['title', 'corporate_author', 'topic', 'type', 'notes', 'original_date', 'full_text'];

        if (isset($_GET['Document'])) {
            $model->attributes = $_GET['Document'];
            Yii::app()->session['searchAttr'] = $_GET['Document'];
        }
        $model->project_id = $project_id;

        /** Log that we've been viewing this particular project */
        $project->logView();

        /**
         *  Get the logs for this project and any documents
         */
        $logDataProvider = new CActiveDataProvider('Log', [
            'criteria' => [
                'condition' => "super_id = :pid OR super_id in (SELECT id from document where project_id = :pid)",
                'order' => 'log_time DESC',
                'params' => [':pid' => $project_id]
            ],
            'pagination' => $this->userData->paginationParam,
        ]);

        /**
         *  Get most recently viewed documents
         */
        $criteria = new CDbCriteria;

        $sort = 'log.log_time DESC';
        if (isset($_POST['rdpSort']))
            $sort = $_POST['rdpSort'];

        $criteria->order = $sort;
        $criteria->join = 'INNER JOIN log ON t.id = log.super_id';
        $criteria->condition = "log.person_id=:personId AND log.action = 'VIEW' AND t.project_id = :pid";
        $criteria->params = [':personId' => Yii::app()->user->id, ':pid' => $project_id];

        $recentDocumentsProvider = new CActiveDataProvider('Document', [
            'criteria' => $criteria,
            'pagination' => $this->userData->paginationParam,
        ]);
        $recentDocumentsProvider->sort->defaultOrder = 'log.log_time DESC';

        /**
         *  Get favorite documents
         */
        $FavoriteDP = new CActiveDataProvider('document', [
            'criteria' => [
                'condition' => "project_id = :pid AND id in (SELECT super_id from favorite where person_id = :userId)",
                'order' => 'title ASC',
                'params' => [':pid' => $project_id, ':userId' => Yii::app()->user->id]
            ],
            'pagination' => $this->userData->paginationParam,
        ]);

        /**
         *  Get saved searches
         */
        $searchesDP = new CActiveDataProvider('DocumentSearch', [
            'criteria' => [
                'condition' => "project_id = :pid",
                'order' => 'title ASC',
                'params' => [':pid' => $project_id]
            ],
            'pagination' => false,
        ]);
        $p = $this->userData->paginationParam;
        $p['route'] = 'document/getGridView';

        $docsGridDP = new CActiveDataProvider('Document', [
            'criteria' => [
                'condition' => "project_id = :pid",
                'order' => 'id desc',
                'params' => [':pid' => $project_id]
            ],
            'sort' => ['defaultOrder' => 'id desc', 'route' => 'document/getGridView'],
            'pagination' => $p,
        ]);

        $this->render('viz', [
            'model' => $model,
            'docsGridDP' => $docsGridDP,
            'project' => $project,
            'FavoriteDP' => $FavoriteDP,
            'logDataProvider' => $logDataProvider,
            'recentDocumentsProvider' => $recentDocumentsProvider,
            'searchesDP' => $searchesDP,
            'authorsArray' => $model->lookupDistinctListOptions('corporate_author', $project_id),
            'topicsArray' => $model->lookupDistinctListOptions('topic', $project_id),
            'typesArray' => $model->lookupDistinctField('type', $project_id),
        ]);
    }

    /**
     * This is called by AJAX request.  I'm sick of fucking around with this broken
     * ass chinesey shit.  Now the grid will get rendered by the view first then subsequently
     * updated with a partial render instead of updating the entire fucking page
     * like some kind of animal
     */
    public function actionGetGridView($query = '', $project_id, $bates_search = null) {

        /**
         * Document DataProvider for the grid and timeline
         * create data provider and renderPartial CGridView widget
         */
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document']))
            $model->attributes = $_GET['Document'];
        $model->project_id = $project_id;

        $docsGridDP = $model->search($query, $bates_search);

        if ($model->total_found === 0) {
            echo "<h3>Your search didn't return any results.</h3>";
#$this->renderPartial('index/_searchTips');
        } else {
//            if ($this->userData->username == 'snookbot')
//                echo '<pre>' . json_encode($docsGridDP->criteria, JSON_PRETTY_PRINT) . '</pre>';
            $this->renderPartial('index/_docsGridView', ['docsGridDP' => $docsGridDP]);
        }

        Yii::app()->end();
    }

    public function actionGetPieData($fieldName, $project_id, $query = '') {
        $model = new Document('search');
        $model->project_id = $project_id;
        $pieData = $model->PieData($fieldName, $project_id, $query);
        echo json_encode($pieData);
        Yii::app()->end();
    }

    public function actionSearchAndReplacePreview() {
//$model = new Document('search');
        $srForm = new SearchAndReplaceForm;
        if (isset($_GET['SearchAndReplaceForm'])) {
            $srForm->attributes = $_GET['SearchAndReplaceForm'];
        } else {
            Yii::app()->end();
        }

        $srForm->caseSensitive = ($_GET['SearchAndReplaceForm']['caseSensitive'] == "1");
        $comparitor = $srForm->caseSensitive ? 'LIKE' : 'ILIKE';

        $sql = "SELECT id, title, corporate_author, topic, type "
                . "FROM document "
                . "WHERE project_id = :pid AND "
                . "{$srForm->field} $comparitor '%{$srForm->find}%'";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindValue(':pid', $srForm->project_id);
        $docsArray = $cmd->queryAll();
        $docsArray[] = ['sql' => $sql];
        echo json_encode($docsArray);
        Yii::app()->end();
    }

    public function actionGetNetworkGraphData($project_id, $query = '') {
        $model = new Document('search');
        $model->project_id = $project_id;
        echo $model->NetworkGraphJson($project_id, $query);
        Yii::app()->end();
    }

    public function actionGetExcel($query = '', $project_id) {
//Yii::import('application.vendor.parse_model');
        $this->loadProject($project_id);

        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document']))
            $model->attributes = $_GET['Document'];
        $model->project_id = $project_id;

        $docsGridDP = $model->search($query);
        if ($model->total_found === 0) {
            echo "<h3>Your search didn't return any results.</h3>";
            Yii::app()->end();
#$this->renderPartial('index/_searchTips');
        } else {

            $this->renderPartial('index/_docsXPHPExcelExport', [
                'docsGridDP' => $docsGridDP,
                'project_id' => $project_id,
            ]);
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document'])) {
            $model->attributes = $_GET['Document'];
        }

        $this->render('admin', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Document the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Super::model()->findChildByPk($id);

        if ($model === null) {
            throw new CHttpException(404, "The requested page does not exist. $className");
        }
        $this->loadProject($model->project_id);

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Document $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'document-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

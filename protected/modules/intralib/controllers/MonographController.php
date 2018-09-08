<?php

class MonographController extends ILController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'medium';
    public $background = '/images/bookshelf.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['view', 'download', 'index', 'getGridView', 'sphinx'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER, ROLE_CLIENT])',
            ],
            ['allow', // allow users and admins to perform 'create' and 'update' actions
                'actions' => ['update'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'delete', 'create'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
            ['deny'],
        ];
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);

        $this->menu = array(
            ['label' => "List {$this->id}s", 'url' => ['index'], 'context' => 'default'],
            ['label' => "Edit", 'url' => ['update', 'id' => $model->id]],
            ['label' => "New {$this->id}", 'url' => ['create']],
            ['label' => "Delete", 'url' => "javascript:del('{$this->module->id}/{$this->id}',{$model->id})", 'context' => 'danger'],
        );

        $this->NavbarItems[] = ['label' => SnookTools::truncate($model->title, 30), 'icon' => 'book', 'url' => ['view', 'id' => $model->id]];

        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Monograph;

        $this->performAjaxValidation($model);

        if (isset($_POST['Monograph'])) {
            $model->attributes = $_POST['Monograph'];
            if ($this->saveAndUpload($model))
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->menu = [
            ['label' => "All {$this->id}s", 'url' => ['index'], 'context' => 'default'],
        ];
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['Monograph'])) {
            $model->attributes = $_POST['Monograph'];
            if ($this->saveAndUpload($model))
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->NavbarItems[] = ['label' => SnookTools::truncate($model->title, 30), 'icon' => 'book', 'url' => ['view', 'id' => $model->id]];

        $this->menu = array(
            ['label' => "All {$this->id}s", 'url' => ['index'], 'context' => 'default'],
            ['label' => "View this {$this->id}", 'url' => ['view', 'id' => $model->id]],
            ['label' => "New {$this->id}", 'url' => ['create']],
            ['label' => "Delete", 'url' => "javascript:del('{$this->module->id}/{$this->id}',{$model->id})", 'context' => 'danger'],
        );

        $this->render('update', array(
            'model' => $model,
        ));
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
    private function saveAndUpload($model) {

        $bSaved = false;
        if (isset($_POST['Monograph'])) {
            $model->attributes = $_POST['Monograph'];

            /** saves the document to document relationship
             * @todo change to use aradvancedbehavior method
             */
            if (isset($_POST['Monograph']['authors']) && is_array($_POST['Monograph']['authors']))
                $model->authors = array_map('intval', $_POST['Monograph']['authors']);
            if (isset($_POST['Monograph']['corporateAuthors']) && is_array($_POST['Monograph']['corporateAuthors']))
                $model->corporateAuthors = array_map('intval', $_POST['Monograph']['corporateAuthors']);
            if (isset($_POST['Monograph']['subjects']) && is_array($_POST['Monograph']['subjects']))
                $model->subjects = array_map('intval', $_POST['Monograph']['subjects']);

            $bSaved = $model->save();
            if ($bSaved and isset($_FILES['Monograph']) and strlen($_FILES['Monograph']['tmp_name']['temp_file'])) {// The upload
                $model->temp_file = $_FILES['Monograph']['tmp_name']['temp_file'];
                $destination = $_FILES['Monograph']['name']['temp_file'];

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
                    //$model->makeThumbnail();
                } else {
                    throw new CException($model->temp_file . ',' . $destination . ', ' . json_encode($_FILES));
                }
            }
        }
        return $bSaved;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            else {
                echo $this->createUrl('index');
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $model = new Monograph('search');
        $this->menu[] = ['label' => "New {$this->title}", 'url' => ['create'], 'context' => 'info'];
        //$this->menu[] = ['label' => 'Legacy Import', 'type' => 'link', 'context' => 'warning', 'url' => $this->createUrl('import/legacyMonographs')];
        $docsGridDP = new CActiveDataProvider('Monograph', [
            'criteria' => [
                'order' => 'id desc',
            ],
            'sort' => ['defaultOrder' => 'id desc', 'route' => 'monograph/getGridView'],
            'pagination' => $this->userData->paginationParam,
        ]);
        $this->render('index', array(
            'model' => $model,
            'docsGridDP' => $docsGridDP,
        ));
    }

    /**
     * This is called by AJAX request.  I'm sick of fucking around with this broken
     * ass chinesey shit.  Now the grid will get rendered by the view first then subsequently
     * updated with a partial render instead of updating the entire fucking page
     * like some kind of animal
     */
    public function actionGetGridView($query = '') {

        $model = new Monograph('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Monograph']))
            $model->attributes = $_GET['Monograph'];

        $docsGridDP = $model->search($query);
        if ($model->total_found === 0) {
            echo "<h3>Your search didn't return any results.</h3>";
        } else {
            $this->renderPartial('_grid', ['gridSearchDP' => $docsGridDP]);
        }

        Yii::app()->end();
    }

    /**
     * Downloads the associated electronic document.
     *
     * @param integer $id the ID of the model pointing to the electronic document
     */
    public function actionDownload($id, $embed = false) {
        $model = $this->loadModel($id);
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

    public function actionSphinx($query) {

        if (strlen(trim($query))) {
            $query = addslashes($query);
            $s = new SphinxClient();
            if ($s->setServer("127.0.0.1", 9312) == false) {
                $admin = '<a href="mailto:' . Yii::app()->params['adminEmail'] . '">administrator</a>';

                throw new Exception("Unable to connect to the Sphinx searchd service.  Please contact Marjorie.", $code);
                return null;
            }
            $s->SetLimits(0, 1001, 1000);
            $s->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
//$s->SetRankingMode(SPH_RANK_SPH04);
            $s->setMatchMode(SPH_MATCH_EXTENDED);

            $s->SetFieldWeights([
                "title" => 4,
                "corp" => 3,
                "subject" => 4,
                "author" => 3,
                "acc" => 2,
                "call" => 2,
                "notes" => 2,
                "year" => 2,
                "full_text" => 1
            ]);

            $s->setMaxQueryTime(30);
            //$s->SetFilter('project_id', [$project_id + 0]);
            $result = $s->query($query, 'intralib');
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Monograph::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'monograph-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

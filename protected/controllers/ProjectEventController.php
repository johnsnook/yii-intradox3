<?php

class ProjectEventController extends ProjectChildController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/medium';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['index', 'view'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER, ROLE_CLIENT])',
            ],
            ['allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => ['create', 'update', 'createFromDocument'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'delete'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
            ['deny', // deny all users
                'users' => ['*'],
            ],
        ];
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title . ' - View ' . $model->title);
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $this->Project->id]];

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($project_id, $document_id = null) {
        $this->loadProject($project_id);
        $model = new ProjectEvent;
        $model->project_id = $project_id;
        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title . ' - Add Event');
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $this->Project->id]];

        // This also terminates the action with some validation json
        $this->performAjaxValidation($model);

        if (isset($_POST['ProjectEvent'])) {
            $model->attributes = $_POST['ProjectEvent'];

            if ($model->save()) {
                if (isset($_POST['ProjectEvent']['document_id'])) {
                    $arr = [];
                    $arr[] = $_POST['ProjectEvent']['document_id'];
                    $model->attachDocuments($arr);
                }
                $this->redirect(['index', 'project_id' => $model->project_id]);
            }
        }
        if (!is_null($document_id)) {
            $document = Document::model()->findByPk($document_id);
            $model->title = $document->title;
            if (!empty($document->original_date)) {
                // "oringal_date can have partial date info, eg 1940 or 1999-06
                // so we have to convert it
                $arDate = explode('-', $document->original_date);
                switch (count($arDate)) {
                    case 1:
                        $arDate[] = '01';
                        $arDate[] = '01';
                        break;
                    case 2:
                        $arDate[] = '01';
                        break;
                }
                $start = $this->verifyDate(implode('-', $arDate), TRUE);
                if ($start) {
                    $model->start_date = date_format($start, 'Y-m-d');
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'document_id' => $document_id,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['ProjectEvent'])) {
            $model->attributes = $_POST['ProjectEvent'];
            if ($model->save())
                $this->redirect(array('index', 'project_id' => $model->project_id));
        }
        $sql = "SELECT id, title, original_date FROM document WHERE project_id = :pid ORDER BY title";
        $docsArray = Yii::app()->db->createCommand($sql)->bindValue('pid', $model->project_id)->queryAll();

        $this->render('update', array(
            'model' => $model,
            'docsArray' => $docsArray,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $project_id = $model->project_id;
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            if ($model->delete()) {
                if (isset($_REQUEST['sendUrl'])) {
                    echo $this->createUrl('index', ['project_id' => $project_id]);
                    Yii::app()->end();
                } else
                    $this->redirect(['index', ['project_id' => $project_id]]);
            }
        } else
            throw new CHttpException(400, "Invalid request. Please do not repeat this request again.\n  Or I will fight you, and that's no lie.");
    }

    /**
     * Lists all models.
     */
    public function actionIndex($project_id) {
        if (!isset($project_id))
            $this->redirect($this->createUrl('project/index'));
        $dataProvider = new CActiveDataProvider('ProjectEvent');
        $criteria = new CDbCriteria;
        $criteria->order = 'start_date asc';
        $criteria->condition = "project_id = :pid";
        $criteria->params = [':pid' => $project_id];

        $dataProvider = new CActiveDataProvider('ProjectEvent', [
            'criteria' => $criteria,
            'pagination' => false,
        ]);

        $this->layout = "//layouts/full_width";
        $project = $this->loadProject($project_id);
//        $model->project_id = $project_id;
//
        $this->setPageTitle(Yii::app()->name . ' - ' . $this->Project->title);
        $this->background = '/images/document-index.jpg';
        $this->NavbarItems[] = ['label' => $this->Project->title, 'icon' => 'folder-close', 'url' => $this->createUrl('document/index', ['project_id' => $this->Project->id])];


        $this->render('index', array(
            'project' => $project,
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProjectEvent('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProjectEvent']))
            $model->attributes = $_GET['ProjectEvent'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ProjectEvent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($model->tableName() != 'project_event')
            throw new Exception('wtf:' . $model->tableName());

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'project-event-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    static public function verifyDate($date, $strict = true) {
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);
        if ($strict) {
            $errors = DateTime::getLastErrors();
            if (!empty($errors['warning_count'])) {
                return false;
            }
        }
        return $dateTime; // !== false;
    }

}

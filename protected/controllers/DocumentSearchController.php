<?php

class DocumentSearchController extends ProjectChildController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/medium';
    public $background = '/images/home-study.jpg';

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
                'actions' => ['create', 'update'],
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
        $model = $this->loadModel($id);
        $this->redirect($this->createUrl('document/index', [
                    'project_id' => $model->project_id,
                    'query' => $model->query
        ]));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAjaxCreate($title, $project_id, $query) {
        $model = new DocumentSearch;
        header('Content-type: application/json');
        $return = ["success" => false];
        $model->project_id = $project_id;
        $model->query = $query;
        $model->title = $title;
        if ($model->save()) {
            $return = [
                "success" => true,
                "title" => $model->title,
                "id" => $model->id
            ];
        } else {
            $return = [
                "success" => false,
                "model->attributes" => $model->attributes,
            ];
        }
        echo CJSON::encode($return);
        Yii::app()->end();
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['DocumentSearch'])) {
            $model->attributes = $_POST['DocumentSearch'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('DocumentSearch');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new DocumentSearch('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['DocumentSearch']))
            $model->attributes = $_GET['DocumentSearch'];

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
        $model = DocumentSearch::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'document-search-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

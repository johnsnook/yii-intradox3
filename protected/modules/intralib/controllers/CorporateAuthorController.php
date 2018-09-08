<?php

class CorporateAuthorController extends ILController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'small';
    public $background = '/images/bookshelf.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $this->title = 'Corporate Author';
        return [
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['view', 'download', 'index', 'getGridView',],
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
        $this->menu = [
            ['label' => "List {$this->title}s", 'url' => ['index'], 'context' => 'default'],
            ['label' => "Edit", 'url' => ['update', 'id' => $model->id]],
            ['label' => "New {$this->title}", 'url' => ['create']],
            ['label' => "Delete", 'url' => "javascript:del('{$this->module->id}/{$this->id}',{$model->id})", 'context' => 'danger'],
        ];

        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new CorporateAuthor;

        $this->performAjaxValidation($model);

        if (isset($_POST['CorporateAuthor'])) {
            $model->attributes = $_POST['CorporateAuthor'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->menu = [
            ['label' => "List {$this->title}s", 'url' => ['index'], 'context' => 'default'],
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

        if (isset($_POST['CorporateAuthor'])) {
            $model->attributes = $_POST['CorporateAuthor'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->menu = array(
            ['label' => "List {$this->title}s", 'url' => ['index'], 'context' => 'default'],
            ['label' => "View this {$this->title}", 'url' => ['view', 'id' => $model->id]],
            ['label' => "New {$this->title}", 'url' => ['create']],
            ['label' => "Delete", 'url' => "javascript:del('{$this->module->id}/{$this->id}',{$model->id})", 'context' => 'danger'],
        );

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
        $model = new CorporateAuthor('search');
        $this->menu = array(
            array('label' => "New {$this->title}", 'url' => array('create')),
        );
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CorporateAuthor('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CorporateAuthor']))
            $model->attributes = $_GET['CorporateAuthor'];

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
        $model = CorporateAuthor::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'corporate-author-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

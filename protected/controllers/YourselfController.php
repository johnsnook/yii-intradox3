<?php

class YourselfController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/medium';
    public $background = '/images/blurry-lights-29';

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
                'actions' => ['index', 'view', 'setTheme', 'update', 'setFontSize'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER, ROLE_CLIENT])',
            ],
            ['allow', // allow users and admins to perform 'create' and 'update' actions
                'actions' => [],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'test'],
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $model = $this->userData;

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            $model->theme_id = $_POST['Person']['theme_id'];

            if ($this->saveAndUpload($model))
                $this->redirect(array('update', 'id' => $model->id));
            else
                throw new CException("Save and upload failed");
        } //else            throw new CException(json_encode($_REQUEST));


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

    public function actionSetTheme($id) {
        $you = $this->loadModel(Yii::app()->user->id);
        $you->theme_id = $id;
        if ($you->save()) {
            $this->redirect(isset($_GET['returnUrl']) ? $_GET['returnUrl'] : array('site/dashboard'));
        }
        var_dump($you->errors);
        echo $id;
        #
    }

    public function actionSetFontSize($amount) {
        $you = $this->loadModel(Yii::app()->user->id);
        $you->font_size = $amount;

        if ($you->save()) {
            echo json_encode(['status' => 'ok']);
        } else {
            $errs = [];
            foreach ($you->errors as $field => $error) {
                $errs[] = [$field => $error[0]];
            }
            echo json_encode([
                'status' => 'err',
                'errors' => $errs
            ]);
        }
        Yii::app()->end();
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Person');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Person('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Person']))
            $model->attributes = $_GET['Person'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionChangeEmail($id) {
        $model = $this->loadModel($id);
        $options = Yii::app()->params['ldap'];
        $dc_string = "dc=" . implode(",dc=", $options['dc']);

        $connection = ldap_connect($options['host']);

        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

        if ($connection) {
            $bind = @ldap_bind($connection, "uid={$model->username},ou={$options['ou']},{$dc_string}", $model->password);

            #$new["userPassword"] = '{md5}' . base64_encode(pack('H*', md5($newpass_in_plaintext)));
            $new["mail"] = 'jsnook@gmail.com';
            $dn = "uid={$model->username},ou={$options['ou']},{$dc_string}";
            ldap_modify($connection, $dn, $new);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Yourself::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'person-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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
        $p = 'Person';
        $bSaved = false;
        if (isset($_POST[$p])) {


            $bSaved = $model->save();
            if ($bSaved and isset($_FILES[$p]) and strlen($_FILES[$p]['tmp_name']['temp_file'])) {// The upload
                //if ($model->temp_file) {
                //throw new CException(json_encode($_FILES));
                $model->temp_file = $_FILES[$p]['tmp_name']['temp_file'];
                $destination = $_FILES[$p]['name']['temp_file'];

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
                    $model->save();
                } else {
                    throw new CException($model->temp_file . ',' . $destination . ', ' . json_encode($_FILES));
                }
            }
        }
        return $bSaved;
    }

}

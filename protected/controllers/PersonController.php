<?php

class PersonController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';
    public $background = '/images/march.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow all users to perform 'savePassword' actions
                'actions' => ['savePassword'],
                'users' => array('*'),
            ],
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['index', 'view'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'delete', 'create', 'invite', 'update', 'اختبار'],
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
        $this->NavbarItems[] = ['label' => 'People', 'icon' => 'heart', 'url' => ['person/index']];
        $this->NavbarItems[] = ['label' => $model->title, 'icon' => 'user', 'url' => $this->createUrl('person/view', ['id' => $model->id])];

        $this->render('view', array(
            'model' => $model
        ));
    }

    public function actionاختبار() {
        $options = Yii::app()->params['ldap'];
        $dc_string = "dc=" . implode(",dc=", $options['dc']);
        $username = 'jsnook';
        $password = '12Characters';

        $blorp = "uid=$username,ou={$options['ou']},{$dc_string}";
// always returns true so no need to check it
        $connection = ldap_connect($options['host']);
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);


        $bind = @ldap_bind($connection, $blorp, $password);
        if ($bind) {
            //$filter = "(uid=$this->username)";
            //$result = ldap_search($connection, "ou={$options['ou']}, $dc_string", $filter);
            $result = @ldap_search($connection, $blorp, "uid=jsnook", array("jpegphoto")) or die("Error in search query");
            $entry = ldap_first_entry($connection, $result);

            echo $entry["count"] . " posts for this entry.<br />";

            $counter = 1;
            do {

                print "<br><strong>Counter is:" . $counter . "</strong>";
                if (!is_resource($entry)) {
                    break;
                }
                $values = ldap_get_values_len($connection, $entry, 'jpegphoto');
                // this should show you whatever is retrived
                print '<pre>';
                print_r($values);
                print '</pre>';
                // loop to the next entry
                $entry = ldap_next_entry($connection, $entry);

                $counter++;
            } while ($entry !== false);
        } else {
            Yii::app()->end('Could not bind to ' . $blorp);
        }

        @ldap_close($connection);

        Yii::app()->end();
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Person;
        $this->NavbarItems[] = ['label' => 'People', 'icon' => 'heart', 'url' => ['person/index']];
        $this->NavbarItems[] = ['label' => 'Create User', 'icon' => 'user', 'url' => $this->createUrl('person/create')];
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionInvite($project_id) {
        $model = new Person;
        $model->userlevel = ROLE_CLIENT;
        $model->job_title = 'Attorney';

        $project = Project::model()->findByPk($project_id);
        if (!$project) {
            Yii::app()->end('Project not found');
        }
        // Uncomment the following line if AJAX validation is needed

        if (isset($_GET['Person'])) {
            $key = urlencode(md5(CJSON::encode($model)));
            #$model->personProject = $project->id;
            $model->projects = $project_id;
            $model->attributes = $_GET['Person'];
            $model->password = md5(date('l jS \of F Y h:i:s A'));
            $model->pod_id = $this->userData->pod_id;
            $model->invitation_token = $key;
            if ($model->save()) {

                $to = $model->email;
                $subject = "Intradox invitation";
                $message = "Dear {$model->title},\r\n   \r\nYou have been invited to view an Intradox project, {$project->title}!\r\n\r\n";
                $message .= 'Your Intradox username is ' . $model->username . ".\r\n\r\n"
                        . "To get started, click this link: " . $this->createAbsoluteUrl('site/acceptInvitation', ['k' => $key])
                        . ".\r\n\r\n";
                $message .= "You'll be asked to set your password and you can begin viewing documents immediately.\r\n\r\n";
                $admin = Yii::app()->params['adminEmail'];

                $message .= "If you have a problem setting your password or connecting to Intradox, please reply to this message to "
                        . "contact the admin, $admin.\r\n\r\n";

                $message .= "Thanks,\r\nThe Intradox Team";

                $headers = "From: $admin\r\n";

                mail($to, $subject, $message, $headers);
                $this->redirect(['document/index', 'project_id' => $project->id]);
            }
        }

        $this->render('invite', array(
            'model' => $model,
            'project' => $project,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $this->NavbarItems[] = ['label' => 'People', 'icon' => 'heart', 'url' => ['person/index']];
        $this->NavbarItems[] = ['label' => 'Edit ' . $model->title, 'icon' => 'user', 'url' => $this->createUrl('person/update', ['id' => $model->id])];

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            if ($model->save()) {

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionSavePassword($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Person']['password'])) {
            $password = $_POST['Person']['password'];
            $model->password = md5($password);
            $username = $model->username;
            // rewrite their token so the invite no longer works
            $model->invitation_token = crypt(date('l jS \of F Y h:i:s A'));
            if ($model->save()) {
                $Login = new LoginForm;
                $Login->username = $username;
                $Login->password = $password;
                if ($Login->validate() && $Login->login()) {
                    $project_id = $model->projects->project_id;
                    $this->redirect($this->createUrl('project/index'));
                } else {
                    Yii::app()->end("Couldn't log in.");
                }

                #$this->redirect($this->createAbsoluteUrl('site/login', ['username' => $username]));
            } else {
                Yii::app()->end("Couldn't save password");
            }
        }
        Yii::app()->end('wat happen buddy');
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

        $criteria = new CDbCriteria();

        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            //$criteria->compare('title', $q, true, 'OR');
            $criteria->compare('LOWER(title)', strtolower($q), true, 'OR');
            $criteria->compare('username', $q, true, 'OR');
        }

        $dataProvider = new CActiveDataProvider('Person', array(
            // sort by last name
            'sort' => ['defaultOrder' => " regexp_replace(title, '^.* ', '') "],
            'pagination' => array(
                'pageSize' => 12,
            ),
            'criteria' => $criteria,
        ));

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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Person::model()->findByPk($id);
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

}

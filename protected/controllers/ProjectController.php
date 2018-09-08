<?php

class ProjectController extends Controller {

    /**
     * @var string the default background image for this controller.
     */
    public $layout = 'medium';
    public $background = '/images/document-index.jpg';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return [
            ['allow', // allow all users to perform 'index' and 'view'  and 'download' actions
                'actions' => ['view', 'dashboard', 'index', 'getGridView', 'getPie', 'wordCloud'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER, ROLE_CLIENT])',
            ],
            ['allow', // allow users and admins to perform 'create' and 'update' actions
                'actions' => ['update', 'sphinxConf'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN, ROLE_USER])',
            ],
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'delete', 'create', 'addPersonToProject', 'searchAndReplace', 'removePersonFromProject', 'اختبار', 'nuclearOption', 'duplicate'],
                'users' => [Yii::app()->user->name],
                'expression' => 'Yii::app()->controller->allowUser([ROLE_ADMIN])',
            ],
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

    public function actionSphinxConf() {
        $pids = Yii::app()->db->createCommand('SELECT id FROM project WHERE document_count > 5 ORDER BY id')->queryAll();
        echo "<pre>";
        echo "################################# ID3 Generated Config Begin ####################################\n";

        foreach ($pids as $pidRow) {
            $pid = $pidRow['id'];
            echo "source s{$pid} : id3_src
{
        sql_query = SELECT d.id, d.project_id, d.title, \
        d.file_extension as ext, d.corporate_author as author, d.topic, \
        d.type,  d.catalog_number as catno, d.notes, \
        d.original_date as date, d.full_text as text \
        FROM  document d INNER JOIN project p ON (d.project_id = p.id) \
        WHERE p.archived = false AND p.restricted = false \
        AND p.id = {$pid}

}
index i{$pid} : id3
{
        path = /var/lib/sphinxsearch/data/i{$pid}
        source = s{$pid}
            
}
";
        }
        echo "################################# ID3 Generated Config End ####################################\n";
        echo "################################# ID3 Generated Bash Script Begin ####################################\n";
        foreach ($pids as $pidRow) {
            $pid = $pidRow['id'];

            echo "touch /tmp/words/w$pid.txt\n";
            echo "indexer i$pid --buildstops /tmp/words/w$pid.txt 500 --buildfreqs\n";
            echo "rm -f /var/lib/sphinxsearch/data/i$pid* \n\n";
        }
        echo "################################# ID3 Generated Bash Script End ####################################\n";
        echo "</pre>";
        Yii::app()->end();
    }

    public function actionاختبار() {
        echo shell_exec("grep -R 'http://id3' . | grep -v 'HTTP_REFERER'");
        Yii::app()->end();
    }

    public function actionGetPie() {
        $format_func = <<<EOD
js:function (label, series) {
    return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white; background-color:black">' +
    label + ' : ' +
    Math.round(series.percent) +
    '%</div>';
}
EOD;

        $model = new Project('search');
        $pieOptions = [
            'show' => true,
            'startAngle' => '1',
            'stroke' => ['color' => '#000', 'width' => '5px'],
            'radius' => 2000,
            'combine' => [
                'color' => '#999',
                'threshold' => 0.02
            ],
            #'offset' => ['left' => 50, 'top' => 50,],
            'label' => [
                'show' => true,
                'radius' => .8,
                'formatter' => 'labelFormatter',
                'threshold' => '0.02',
                'background' => ['color' => '#000000', 'opacity' => .9],
                'color' => 'black'
            ],
        ];
        $pieData = $model->PieData();

        $this->renderPartial('dashboard/_pieView', [
            'pieData' => $pieData,
            'pieOptions' => $pieOptions,
        ]);
        Yii::app()->end();
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Project;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Project'])) {
            $model->attributes = $_POST['Project'];
            if ($model->save()) {

                $this->redirect(['document/index', 'project_id' => $model->id]);
            }
        }

        $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $this->NavbarItems[] = ['label' => $model->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $model->id]];

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Project'])) {
            $model->attributes = $_POST['Project'];
            if ($model->save())
                $this->redirect(['document/index', 'project_id' => $model->id]);
        }

        $dpProjectEmployees = new CActiveDataProvider('Person', [
            'criteria' => [
                'together' => true,
                'condition' => 'project_id = ' . $id . ' AND t.userlevel = 2',
                'with' => array('projects' => array('joinType' => 'LEFT JOIN')),
                'order' => 't.title',
            ],
            'pagination' => FALSE,
        ]);

        $dpProjectGuests = new CActiveDataProvider('Person', [
            'criteria' => [
                'together' => true,
                'condition' => 'project_id = ' . $id . ' AND t.userlevel = 1',
                'with' => array('projects' => array('joinType' => 'LEFT JOIN')),
                'order' => 't.title',
            ],
            'pagination' => FALSE,
        ]);

        $dpEmployees = new CActiveDataProvider('Person', [
            'criteria' => [
                'condition' => 'userlevel = 2',
                'order' => 'title',
            ],
            'pagination' => FALSE,
        ]);
        $dpGuests = new CActiveDataProvider('Person', [
            'criteria' => [
                'condition' => 'userlevel = 1',
                'order' => 'title',
            ],
            'pagination' => FALSE,
        ]);

        $this->render('update', [
            'model' => $model,
            'dpProjectEmployees' => $dpProjectEmployees,
            'dpProjectGuests' => $dpProjectGuests,
            'dpEmployees' => $dpEmployees,
            'dpGuests' => $dpGuests,
        ]);
    }

    /**
     * 
     * Build a word cloud from the sphinx index
     * @param integer $id the ID of the model to be deleted
     */
    public function actionWordCloud($id, $ignoreStopWords = true) {

        $model = $this->loadModel($id);
        $this->setPageTitle(Yii::app()->name . ' -  ' . $model->title . ' word cloud');
        $this->NavbarItems[] = ['label' => $model->title, 'icon' => 'folder-open', 'url' => $this->createUrl('document/index', ['project_id' => $id])];
        $stopFile = '/var/lib/sphinxsearch/data/stop-words-small.txt';
        $stopWords = file_get_contents($stopFile);

        $file = Yii::app()->params['wc_path'] . 'w' . $id . '.txt';
        if (!file_exists($file))
            throw new CException($model->title . " doesn't have a word count file.");
        $data = [];
        $i = 0;
        $file_handle = fopen($file, "r");
        while (!feof($file_handle)) {
            $i++;
            $line = fgets($file_handle);
            $line = str_replace(chr(3), '', $line);
            $arrLine = explode(' ', $line);
            if (!empty($arrLine[0])) {
                if ($ignoreStopWords) {
                    if (strpos($stopWords, $arrLine[0]) == 0)
                        $data[] = ['text' => $arrLine[0], 'size' => $arrLine[1]];
                } else {
                    $data[] = ['text' => $arrLine[0], 'size' => $arrLine[1]];
                }
            }
            //echo $line;
        }
        fclose($file_handle);

        $this->render('word_cloud', [
            'model' => $model,
            'data' => $data,
            'ignoreStopWords' => $ignoreStopWords
        ]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            // delete the docs first
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['index']);
            else {
                echo $this->createUrl('index');
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again or we will contact the cyber police to backtrace you.');
    }

    public function actionAddPersonToProject($id, $person_id) {
        $pp = new ProjectPerson();
        $pp->project_id = $id;
        $pp->person_id = $person_id;

        if ($pp->save())
            $return = json_encode(['success' => true]);
        else
            $return = json_encode(['success' => false]);

        Yii::app()->end($return);
    }

    public function actionRemovePersonFromProject($id, $person_id) {
        if (ProjectPerson::model()->deleteAllByAttributes([
                    'project_id' => $id,
                    'person_id' => $person_id,
                ]))
            $return = json_encode(['success' => true]);
        else
            $return = json_encode(['success' => false]);

        Yii::app()->end($return);
    }

    /**
     * Displays the Dashboard page
     */
    public function actionDashboard() {
        $this->layout = 'column1';
        $this->background = '/images/office-wallpaper.jpg';
        $newsDP = new CActiveDataProvider('News', ['criteria' =>
            [
                'order' => 'id desc',
                'condition' => 'created_on >= \'' . date('Y-m-d', strtotime('-1 month')) . '\'',
            ],
        ]);
        $newsDP->sort = $this->render('dashboard', [
            'model' => new Project('search'),
            'favoritesDataProvider' => Favorite::model()->GetUserFavorites(Yii::app()->user->id),
            'newsDP' => $newsDP,
        ]);
    }

    /**
     * Displays the Dashboard page
     */
    public function actionIndex() {
        $this->background = '/images/warehousing.jpg';
        Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.js');
        Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.pie.js');
        Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.categories.js');

        $this->render('index', array(
            'logsDataProvider' => Log::model()->GetMyLog()
        ));
    }

    /**
     * This is called by AJAX request.  I'm sick of fucking around with this broken
     * ass chinesey shit.  Now the grid will get rendered by the view first then subsequently
     * updated with a partial render
     */
    public function actionGetGridView() {
        /**
         * Project DataProvider for the grid
         * create data provider and renderPartial CGridView widget
         */
        if (isset($_GET['Project']['search'])) {
            $criteria = new CDbCriteria;
            $query = $_GET['Project']['search'];
            $criteria->addCondition("title ILIKE '%$query%'");
            if ($this->userData->userlevel == ROLE_ADMIN) {
                if (isset($_GET['Project']['restricted'])) {
                    if ($_GET['Project']['restricted'] == '1') {
                        $criteria->addCondition('restricted = true', 'AND');
                    }
                } else {
                    $criteria->addCondition('restricted = false', 'AND');
                }
                if (isset($_GET['Project']['archived'])) {
                    if ($_GET['Project']['archived'] == '1') {
                        $criteria->addCondition('archived = true', 'AND');
                    }
                } else {
                    $criteria->addCondition('archived = false', 'AND');
                }
            } else {
                $criteria->addCondition('restricted = false', 'AND');
                $criteria->addCondition('archived = false', 'AND');
            }

            if ($user->userlevel == ROLE_CLIENT) {
                $criteria->with = array('persons' => array(
                        'on' => 'shit.person_id=' . $this->userData->id,
                        'together' => true,
                        'joinType' => 'INNER JOIN',
                ));
            }

            $searchDP = new CActiveDataProvider('Project', [
                'criteria' => $criteria,
                'pagination' => $this->userData->paginationParam,
            ]);
            $this->renderPartial('index/_projectsGrid', ['gridSearchDP' => $searchDP]);
        }
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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionDuplicate($id) {
        $model = $this->loadModel($id); // record that we want to duplicate
        $this->render('duplicate', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionSearchAndReplace($id) {

        $project = $this->loadModel($id);
        $this->NavbarItems[] = ['label' => $project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $project->id]];

        $srForm = new SearchAndReplaceForm;
        $srForm->project_id = $id;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['SearchAndReplaceForm'])) {
            $srForm->attributes = $_POST['SearchAndReplaceForm'];
            if ($srForm->save()) {
                $this->redirect($this->createUrl('document/index', ['project_id' => $srForm->project_id]));
            }
        }

        $this->render('searchAndReplace', [
            'project' => $project,
            'srForm' => $srForm,
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
            throw new CHttpException(404, 'The requested project does not exist.');
        return $model;
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

    public static function createAppUrl($route, $params = null) {
        if (is_null($params)) {
            return $this->createUrl($route);
        } else {
            return $this->createUrl($route, $params);
        }
    }

}

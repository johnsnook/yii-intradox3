<?php

class ProjectChildController extends Controller {

    /**
     * @var private property containing the associated Project model instance.
     */
    public $Project = null;

    /**
     * @return array action filters
     */
    public function filters() {
        $filters = [
            'accessControl', // perform access control for CRUD operations
            # 'ProjectContext', //check to ensure valid project context
            'postOnly + delete', // we only allow deletion via POST request
        ];
        Yii::app()->params['documentRule'] = SnookTools::getRule($filters);
        return $filters;
    }

    /*
     * In-class defined filter method, configured for use by the filters() method
     * It ensures that is run in the proper parent child context
     */

    public function filterProjectContext($filterChain) {
        $projectId = null;

        /*
         * Get selected project id cookie
         */
        if (isset($_GET['project_id'])) {#isset($_GET['project_id'])
            $projectId = $_GET['project_id'];
            $this->loadProject($projectId);

            //} elseif (isset(Yii::app()->request->cookies['selected_project_id']->value)) {
            //    $projectId = Yii::app()->request->cookies['selected_project_id']->value;
        } elseif (!$this->Project) {
            $this->redirect(array('site/dashboard'));
        }

        $filterChain->run();
    }

    /**
     * Load associated Project model class
     * @param integer $project_id the ID of the project model to be loaded
     * @return Project object, the loaded model
     */
    public function loadProject($project_id) {
        $this->Project = Project::model()->findByPk($project_id);
        if ($this->Project === NULL) {
            throw new CHttpException(404, "Project not found.");
        }
        return $this->Project;
    }

}

?>

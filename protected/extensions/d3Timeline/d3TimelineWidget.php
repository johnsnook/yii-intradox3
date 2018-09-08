<?php

/*
 * This widget displays device sensor samples in a flot chart.
 * It uses two instances of the flot object, the main and an
 * overview for selecting ranges.
 *
 */

class d3TimelineWidget extends CWidget {

    public $parent_id = null;
    public $userData;
    private $scriptUrl;
    private $scriptFile = array(
        'comments.js', // this is where most of the front end logic resides
    );

    public function init() {
        $scriptUrl = $this->viewPath . "/../assets";
        $this->resolvePackagePath();
        $this->registerCoreScripts();


        //foreach ($scripts as $file)
        //Yii::app()->getClientScript()->registerScriptFile($file, CClientScript::POS_END);
    }

    public function run() {
        // this method is called by CController::endWidget()
        $superModel = Super::model()->findByPk($this->parent_id);
        $this->render('view', ['superModel' => $superModel]);
    }

    protected function registerCoreScripts() {
        $fuckingcaching = rand();

        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');

        if (is_array($this->scriptFile)) {
            foreach ($this->scriptFile as $scriptFile)
                $this->registerScriptFile($scriptFile . "?$fuckingcaching");
        }
    }

    protected function registerScriptFile($fileName, $position = CClientScript::POS_HEAD) {
        Yii::app()->getClientScript()->registerScriptFile($this->scriptUrl . '/' . $fileName, $position);
    }

    protected function resolvePackagePath() {
        if ($this->scriptUrl === null || $this->themeUrl === null) {
            $basePath = Yii::getPathOfAlias('application.extensions.comments.assets');
            $baseUrl = Yii::app()->getAssetManager()->publish($basePath);
            if ($this->scriptUrl === null)
                $this->scriptUrl = $baseUrl . '';
        }
    }

}

?>

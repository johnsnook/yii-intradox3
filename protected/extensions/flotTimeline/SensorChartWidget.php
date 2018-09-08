<?php

/*
 * This widget displays device sensor samples in a flot chart.
 * It uses two instances of the flot object, the main and an
 * overview for selecting ranges.
 *
 */

class SensorChartWidget extends CWidget {

	//public $dataProvider;
	private $themeUrl = "";
	private $scriptUrl;
	private $scriptFile = array(
		'flot/excanvas.min.js',
		'flot/jquery.flot.js',
		'flot/jquery.flot.time.js',
		'flot/jquery.flot.selection.js',
		'flot/jquery.flot.resize.js',
		'moment.min.js',
		"sensorChart.js", // this is where most of the front end logic resides
	);
	public $minStamp;
	public $maxStamp;
	public $Device;

	public function init() {
		$scriptUrl = $this->viewPath . "/../assets";
		$this->resolvePackagePath();
		$this->registerCoreScripts();

		$bounds = $this->Device->sampleBounds();
		$this->minStamp = $bounds['min_stamp'];
		$this->maxStamp = $bounds['max_stamp'];

		#$this->maxStamp = time() * 1000;
		#$this->minStamp = $this->maxStamp - (60 * 60 * 24 * 1000);
	}

	public function run() {
		// this method is called by CController::endWidget()
		$this->render('view', array());
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
			$basePath = Yii::getPathOfAlias('application.extensions.SensorChart.assets');
			$baseUrl = Yii::app()->getAssetManager()->publish($basePath);
			if ($this->scriptUrl === null)
				$this->scriptUrl = $baseUrl . '';
		}
	}

}

?>

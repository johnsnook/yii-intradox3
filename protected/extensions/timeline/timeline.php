<?php

/** @property $dataProvider CDataProvider example: '/index.php?document/timelineAjax' */
/** @property $groupField string a field in the dataset by which events can be grouped for example, topic or type */
/** @property $ajaxUrl string example: '/index.php?document/timelineAjax' */
/** @property $years Array */

/**
 * This widget displays records on a scrollable html timeline
 *
 * @author John Snook
 * @date 2015-02-02
 *
 */
class timeline extends CWidget {

    public $ajaxURL;
    public $years = [];
    public $project_id;
    public $dateField;
    public $titleField;
    public $groupField;
    //public $dataProvider;
    public $options = [];

    //private $tlData = [];

    public function init() {
        /*
          $this->dataProvider->setPagination(false);
          $criteria = $this->dataProvider->criteria;
          $criteria->addCondition("$this->dateField is not null");
          $criteria->order = 'original_date ASC, type, title';

          $rows = $this->dataProvider->getData();

          foreach ($rows as $index => $row) {
          $date = explode('-', $row[$this->dateField]);
          if (count($date) > 1)
          $this->tlData[$date[0]][$date[1]][$row[$this->groupField]][] = [$row[$this->dateField], $row[$this->titleField],];
          else
          $this->tlData[$date[0]][0][$row[$this->groupField]][] = [''];
          }
         */


        return parent::init();
    }

    public function run() {
        $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($assets . '/waypoints/jquery.waypoints.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($assets . '/waypoints/shortcuts/infinite.min.js', CClientScript::POS_END);

        $cs->registerCssFile($assets . '/timeline.css');
        $cs->registerScriptFile($assets . '/timeline.js', CClientScript::POS_END);

        $this->render('view', [
            'years' => $this->years,
            'groupField' => $this->groupField,
            'ajaxURL' => $this->ajaxURL,
            'project_id' => $project_id
        ]);
    }

}

?>

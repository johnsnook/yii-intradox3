<?php

/** @property $groupField string a field in the dataset by which events can be grouped for example, topic or type */
/** @property $ajaxUrl string example: '/index.php?document/timelineAjax' */
/** @property $months Array */

/**
 * This widget displays records on a scrollable html timeline
 *
 * @author John Snook
 * @date 2015-02-02
 *
 */
class year extends CWidget {

    public $ajaxURL;
    public $months = [];
    public $project_id;
    public $dateField;
    public $titleField;
    public $groupField;
    //public $dataProvider;
    public $options = [];

    //private $tlData = [];

    public function init() {
        return parent::init();
    }

    public function run() {
        $this->render('year_view', [
            'project_id' => $this->project_id,
            'months' => $this->months,
            'ajaxURL' => $this->ajaxURL,
        ]);
    }

}

?>

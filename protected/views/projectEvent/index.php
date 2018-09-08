<?php
/* @var $this ProjectEventController */
/* @var $model CActiveRecord */
/* @var $project CActiveRecord */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/timeliner/js/timeliner.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/timeliner/css/timeliner.css');
Yii::app()->clientScript->registerLinkTag('stylesheet/less', 'text/css', Yii::app()->baseUrl . '/js/timeliner/css/timeliner.less');
?>

<style>


</style>

<script type="text/javascript">

    $(document).ready(function () {
        $.timeliner({
            timelineContainer: '#timeline', // value: selector of the main element holding the timeline's content, default to #timelineContainer
            startState: 'closed', // value: closed | open, default to closed; determines whether the timeline is initially collapsed or fully expanded
//            startOpen: [], // value: array of IDs of single timelineEvents, default to empty; determines the minor event that you want to display open by default on page load
//            baseSpeed: 200, // value: any integer, default to 200; determines the base speed, some animations are a multiple (4x) of the base speed
//            speed: 4, // value: numeric, defalut to 4; a multiplier applied to the base speed that sets the speed at which an event's conents are displayed and hidden
//            fontOpen: '1.2em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is opened
//            fontClosed: '1em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is closed
//            expandAllText: '+ expand all', // value: string; defaults to '+ expand all'
//            collapseAllText: '- collapse all' // value: string; defaults to '- collapse all'
        });
    });


</script>
<?php
$projectMenu = [];
$projectMenu[] = ['label' => 'Normalcy', 'icon' => 'random', 'context' => 'warning', 'url' => $this->createUrl('document/index', ['project_id' => $project->id])];
switch ($this->userData->userlevel) {
    case ROLE_USER:
        $projectMenu[] = array('label' => 'Add Event', 'context' => 'primary', 'icon' => 'plus-sign', 'url' => $this->createUrl('create', ['project_id' => $project->id]));
        break;
    case ROLE_ADMIN:
        $projectMenu[] = array('label' => 'Add Event', 'context' => 'primary', 'icon' => 'plus-sign', 'url' => $this->createUrl('create', ['project_id' => $project->id]));
        break;
    case ROLE_CLIENT:
    default :
}
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="fa fa-calendar" data-toggle="tooltip" data-placement="right" data-original-title="We shall not cease from exploration, and the end of all our exploring will be to arrive where we started and know the place for the first time. -T. S. Eliot" ></span>&nbsp;Project: <?= $project->title; ?></h1>
    </div>
    <div class="panel-body">
        <div class="row"> 
            <div class="col-md-12"><?php
                $this->widget('booster.widgets.TbButtonGroup', array(
                    'size' => 'small',
                    'buttonType' => 'link',
                    'buttons' => $projectMenu,
                ));
                ?>
            </div>
        </div>
        <div id="timeline" class="timeline-container" style="overflow:hidden">
            <button class="timeline-toggle">+ expand all</button>
            <br class="clear">
            <?php
            $new_decade = 0;
            $current_decade = 0;
            foreach ($dataProvider->getData() as $data) {
                $d = new DateTime($data->start_date);
                $date = $d->format("Y");
                $new_decade = (int) substr($date, 0, 3) * 10;
                //$new_decade = ceil($date / 10) * 10 - 10;
                if ($current_decade != $new_decade) {
                    if ($current_decade > 0)
                        echo '</dl><!-- /.timeline-series --></div><!-- /.timeline-wrapper -->';
                    $current_decade = $new_decade;
                    echo '<div class="timeline-wrapper">';
                    echo '<h2 class="timeline-time">' . $current_decade . 's</h2>';
                    echo '<dl class="timeline-series">';
                }

                echo $this->renderPartial('_view', array('data' => $data), true);
            }
            ?>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>

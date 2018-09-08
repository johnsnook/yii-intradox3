<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */
/* @var $project CActiveRecord */


//Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.js');
//Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.pie.js');
//Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.resize.js');
#Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.categories.js');

Yii::app()->clientScript->registerScriptFile('/js/d3/d3.v3.min.js');
?>
<style>


</style>

<script type="text/javascript">
</script>
<?php
$projectMenu = [];
$projectMenu[] = ['label' => 'Normalcy', 'icon' => 'random', 'context' => 'warning', 'url' => $this->createUrl('document/index', ['project_id' => $project->id])];
switch ($this->userData->userlevel) {
    case ROLE_USER:
        break;
    case ROLE_ADMIN:
        break;
    case ROLE_CLIENT:
    default :
}
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-folder-close" data-toggle="tooltip" data-placement="right" data-original-title="We shall not cease from exploration, and the end of all our exploring will be to arrive where we started and know the place for the first time. -T. S. Eliot" ></span>&nbsp;Project: <?= $project->title; ?></h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-7"><?php
                $this->widget('booster.widgets.TbButtonGroup', array(
                    'size' => 'small',
                    'buttonType' => 'link',
                    'buttons' => $projectMenu,
                ));
                $labels = $project->attributeLabels();
                ?>
            </div>

        </div>
        <div class="row" style="padding-top:30px">
            <div class="col-md-12" >
                <?php
                /** get the list of years and pass it to the timeline
                 * @todo I should not be doing this here, move to controller
                 */
                ?>

            </div>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>


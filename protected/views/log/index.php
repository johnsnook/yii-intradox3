<?php
$this->layout = 'column1';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-tree-conifer"  data-toggle="tooltip" data-placement="right" data-original-title="O you who turn the wheel and look to windward,  Consider Phlebas, who was once handsome and tall as you.	 -T.S. Eliot"></span>
            <span  ><?= $this->route; ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', [
            'buttonType' => 'link',
            'htmlOptions' => ['class' => 'pull-left'],
            'buttons' => $this->menu,
        ]);
        /* @var $this SiteController */
        /* @var $gridSearchDP CActiveDataProvider */


        $this->widget('booster.widgets.TbGridView', [
            'id' => 'log-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
            #'fixedHeader' => true,
            #'headerOffset' => 45,
            #'type' => 'striped',
            'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" style="text-align:right">{pager}</div></div>
<div class="row">{items}</div>
<div class="row"><div class="col-md-6">{summary}</div><div class="col-md-6" style="text-align:right">{pager}</div></div>',
            'columns' => [
                #'id',
                [
                    'name' => 'title',
                    'header' => 'Title',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->title, ["$data->model/view", "id"=> $data->super_id])',
                    'htmlOptions' => ['class' => 'col-md-5',],
                    'headerHtmlOptions' => ['class' => 'col-md-5'],
                #'htmlOptions' => ['class' => 'col-md-9'],
                ],
                [
                    'name' => 'action',
                    'header' => 'Action',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'value' => '$data->action',
                    'filter' => CHtml::listData(Log::model()->findAll(['select' => ['action'], 'distinct' => true, 'order' => 'action']), 'action', 'action'),
                ],
                [
                    'name' => 'model',
                    'header' => 'What',
                    'type' => 'raw',
                    'value' => '$data->model',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'filter' => CHtml::listData(Log::model()->findAll(['select' => ['model'], 'distinct' => true, 'order' => 'model']), 'model', 'model'),
                ],
                [
                    'header' => 'When',
                    'name' => 'log_time',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    #'value' => '$data->log_time',
                    'value' => 'Yii::app()->dateFormatter->format("yyyy-m-dd HH:MM",strtotime($data->log_time))',
                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'log_time',
                        'i18nScriptFile' => 'jquery.ui.datepicker-en.js', //(#2)
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date',
                            'class' => 'form-control',
                        ),
                        'defaultOptions' => array(// (#3)
                            'showOn' => 'focus',
                            'dateFormat' => 'yy/mm/dd',
                            'showOtherMonths' => true,
                            'selectOtherMonths' => true,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'showButtonPanel' => true,
                        )
                            ), true), // (#4)
                ],
                [
                    'header' => 'Who',
                    'name' => 'person_id',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'type' => 'raw',
                    'value' => '$data->person->title',
                    'filter' => CHtml::listData(Person::model()->findAll(['select' => ['id', 'title'], 'distinct' => true, 'order' => 'title']), 'id', 'title'),
                ],
            ],
        ]);
        Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional[''],{'dateFormat':'yy/mm/dd'}));
}
");
        ?>
    </div>
    <div class="panel-footer">

    </div>
</div>
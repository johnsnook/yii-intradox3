<?php
$this->layout = 'column1';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="fa fa-ticket"  data-toggle="tooltip" data-placement="right" data-original-title="APRIL is the cruellest month, breeding
                  Lilacs out of the dead land, mixing
                  Memory and desire, stirring
                  Dull roots with spring rain.	 -T.S. Eliot"></span>
            <span><?= $this->route; ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', [
            'buttonType' => 'link',
            'htmlOptions' => ['class' => 'pull-left'],
            'buttons' => $this->menu,
        ]);

        $this->widget('booster.widgets.TbGridView', [
            'id' => 'ticket-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
            'type' => 'striped',
            'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" style="text-align:right">{pager}</div></div>
<div class="row">{items}</div>
<div class="row"><div class="col-md-6">{summary}</div><div class="col-md-6" style="text-align:right">{pager}</div></div>',
            'columns' => [
                #'id',
                [
                    'name' => 'title',
                    'header' => 'Title',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->title, ["ticket/view", "id"=> $data->id])',
                    'htmlOptions' => ['class' => 'col-md-5',],
                    'headerHtmlOptions' => ['class' => 'col-md-5'],
                ],
                [
                    'name' => 'status',
                    'header' => 'Status',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'value' => '$data->status',
                    'filter' => CHtml::listData(Ticket::model()->findAll(['select' => ['status'], 'distinct' => true, 'order' => 'status']), 'status', 'status'),
                ],
                [
                    'name' => 'comments',
                    'header' => 'Comments',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'value' => 'Post::getTotalItemCount($data->id)',
                    'filter' => false,
                ],
                [
                    'header' => 'Reported',
                    'name' => 'created_stamp',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    #'value' => '$data->log_time',
                    'value' => 'Yii::app()->dateFormatter->format("yyyy-MM-dd",strtotime($data->created_stamp))',
                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'created_stamp',
                        'i18nScriptFile' => 'jquery.ui.datepicker-en.js', //(#2)
                        'htmlOptions' => array(
                            'class' => 'form-control',
                        ),
                        'defaultOptions' => array(// (#3)
                            'showOn' => 'focus',
                            'dateFormat' => 'yy-mm-dd',
                            'showOtherMonths' => true,
                            'selectOtherMonths' => true,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'showButtonPanel' => true,
                        )), true), // (#4)
                ],
                [
                    'header' => 'Changed',
                    'name' => 'modified_stamp',
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'col-md-1',],
                    'headerHtmlOptions' => ['class' => 'col-md-1'],
                    'value' => 'Yii::app()->dateFormatter->format("yyyy-MM-dd",strtotime($data->modified_stamp))',
                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'modified_stamp',
                        'i18nScriptFile' => 'jquery.ui.datepicker-en.js', //(#2)
                        'htmlOptions' => array(
                            'class' => 'form-control',
                        ),
                        'defaultOptions' => array(// (#3)
                            'showOn' => 'focus',
                            'dateFormat' => 'yy-mm-dd',
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
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional[''],{'dateFormat':'yy-mm-dd'}));
}
");
        ?>
    </div>
    <div class="panel-footer">

    </div>
</div>
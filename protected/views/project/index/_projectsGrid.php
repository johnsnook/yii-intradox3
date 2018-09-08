<style>
    .row-archived td{
        background-color: Khaki !important;
    }
    .row-restricted td{
        background-color: LightPink !important;
    }
    .shrinkage{
        font-size: .9em;
    }

</style>
<?php
/* @var $this SiteController */
/* @var $gridSearchDP CActiveDataProvider */

$template = '{favorite} {edit} ';
$this->widget('booster.widgets.TbExtendedGridView', [
    'id' => 'project-grid',
    'dataProvider' => $gridSearchDP,
    'filter' => null, #$project,
    'fixedHeader' => true,
    'headerOffset' => 45,
    #'type' => 'striped',
    'rowCssClassExpression' => '$data->restricted ? "row-restricted" : ($data->archived ? "row-archived" : "")',
    'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" style="text-align:right">{pager}</div></div>
<div class="row">{items}</div>
<div class="row"><div class="col-md-6">{summary}</div><div class="col-md-6" style="text-align:right">{pager}</div></div>',
    'columns' => [
        #'id',
        [
            'name' => 'title',
            'header' => 'Project Title',
            'type' => 'raw',
            'value' => 'CHtml::link($data->title, ["document/index", "project_id"=> $data->id])',
        #'htmlOptions' => ['class' => 'col-md-9'],
        ],
        [
            'name' => 'pod_id',
            'type' => 'raw',
            'value' => '$data->pod->title',
            'htmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:center'],
            'headerHtmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:center'],
        ],
        [
            'name' => 'document_count',
            'htmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
            'headerHtmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
        ],
        [
            //'title' => 'Actions',
            'class' => 'ButtonColumn',
            'template' => $template,
            'htmlOptions' => ['class' => 'col-md-1 shrinkage', 'style' => 'text-align:right'],
            'buttons' => [
                'edit' => [
                    'label' => '"Edit this Project."',
                    'icon' => 'edit',
                    'url' => '"index.php?r=project/update&id=" . $data->id',
                    'options' => [
                    ]
                ],
                'favorite' => [
                    'label' => '"Add or remove this document to your favorites."',
                    'evalicon' => '$data->is_favorite ? "star" : "star-empty"',
                    'buttonType' => 'ajaxSubmit',
                    #'url' => '#',
                    'options' => [
                        'id' => '"favbut-" . $data->id',
                        'onClick' => '"toggleFave(" . $data->id . "," . Yii::app()->user->id . ");return false;"',
                        'evaluateOptions' => ['id', 'onClick'],
                    ],
                ],
            ],
        ],
    ],
]);
?>
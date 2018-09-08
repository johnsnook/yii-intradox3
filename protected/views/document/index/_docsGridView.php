<?php

/* @var $docsGridDP CActiveDataProvider */
$this->widget('booster.widgets.TbExtendedGridView', [
    'id' => 'document-grid',
    'fixedHeader' => true,
    'headerOffset' => 45,
    'ajaxUrl' => 'r=document/getGridView',
    'dataProvider' => $docsGridDP,
    'filter' => null, #$model,
    'rowCssClassExpression' => '"id_" . $data->id',
    'type' => 'striped  condensed',
    'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" style="text-align:right">{pager}</div></div>
<div class="row">{items}</div>
<div class="row"><div class="col-md-6">{summary}</div><div class="col-md-6" style="text-align:right">{pager}</div></div>',
    'columns' => [
        [
            'name' => 'title',
            'header' => 'Document Title',
            'type' => 'raw',
            'value' => 'CHtml::link( $data->title, ["document/view", "id"=> $data->id])',
            'htmlOptions' => ['class' => 'col-md-4'],
            'headerHtmlOptions' => ['class' => 'col-md-4'],
        ],
        [
            'name' => 'corporate_author',
            'header' => 'Author',
            'htmlOptions' => ['class' => 'col-md-2'],
            'headerHtmlOptions' => ['class' => 'col-md-2'],
        ],
        [
            'name' => 'topic',
            'header' => 'Topic',
            'htmlOptions' => ['class' => 'col-md-2'],
            'headerHtmlOptions' => ['class' => 'col-md-2'],
        ],
//        [
//            'name' => 'type',
//            'header' => 'Type',
//            'htmlOptions' => ['class' => 'col-md-2'],
//            'headerHtmlOptions' => ['class' => 'col-md-2'],
//        ],
        [
            'name' => 'catalog_number',
            #'header' => 'Topic',
            'htmlOptions' => ['class' => 'col-md-1'],
        ],
        [
            'name' => 'original_date',
            'htmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
            'headerHtmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
        ],
        [
            'class' => 'ButtonColumn',
            'template' => '{favorite} {download} {edit} {qview}',
            'htmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
            'buttons' => [
                'qview' => [
                    'label' => '"Quickview."',
                    'icon' => 'eye-open',
                    'options' => [
                        'id' => '"quickViewButton-" . $data->id',
                        'onClick' => '"toggleQuickView(" . $data->id . ");return false;"',
                        'evaluateOptions' => ['id', 'onClick'],
                    ]
                ],
                'edit' => [
                    'label' => '"Edit this document."',
                    'icon' => 'edit',
                    'url' => '"index.php?r=document/update&id=" . $data->id',
                    'options' => []
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
                'download' => [
                    'label' => '"Download " . $data->title . "." . $data->file_extension',
                    'evalicon' => '"flaticon flaticon-" . $data->file_extension',
                    'buttonType' => 'ajaxSubmit',
                    'options' => [
                        'url' => 'javascript:return false;',
                        'style' => 'text-decoration: none;',
                        'onClick' => '"$(\'#hiddenDownloader\')[0].src = \'index.php?r=document/download&id=" . $data->id . "\'; return false;"',
                        'evaluateOptions' => ['onClick'],
                    ],
                ],
            ],
        ],
    ],
]);
?>
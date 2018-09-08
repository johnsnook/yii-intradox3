<?php

$this->widget('booster.widgets.TbGridView', [
    'id' => $this->id . '-grid',
    'dataProvider' => $gridSearchDP,
    'filter' => null,
    'type' => 'striped',
    'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" >{pager}</div></div>
<div class="row"><div class="col-md-12">{items}</div></div>
<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" >{pager}</div></div>',
    'columns' => [
        [
            'name' => 'title',
            'header' => 'Title',
            'type' => 'raw',
            'value' => 'CHtml::link($data->title, ["view", "id"=> $data->id])',
            'htmlOptions' => ['class' => 'col-md-5',],
            'headerHtmlOptions' => ['class' => 'col-md-5'],
        ],
        [
            'name' => 'subjects',
            'header' => 'Subjects',
            'type' => 'raw',
            'htmlOptions' => ['class' => 'col-md-3',],
            'headerHtmlOptions' => ['class' => 'col-md-3'],
            'value' => '$data->getSubjectQueryLinks()',
        //'filter' => $data->getSubjectTitles(),
        ],
        [
            'header' => 'Year',
            'name' => 'year',
            'type' => 'raw',
            'htmlOptions' => ['class' => 'col-md-1',],
            'headerHtmlOptions' => ['class' => 'col-md-1'],
            #'value' => '$data->log_time',
            'value' => '$data->year',
        ],
        [
            'class' => 'ButtonColumn',
            'template' => '{download} {edit} ',
            'htmlOptions' => ['class' => 'col-md-1', 'style' => 'text-align:right'],
            'buttons' => [
                'edit' => [
                    'label' => '"Edit this monograph."',
                    'icon' => 'edit',
                    'url' => '"index.php?r=intralib/monograph/update&id=" . $data->id',
                    'options' => []
                ],
                'download' => [
                    'label' => '"Download " . $data->title . "." . $data->file_extension',
                    'evalicon' => '"flaticon-" . $data->file_extension',
                    'buttonType' => 'ajaxSubmit',
                    'options' => [
                        'url' => 'javascript:return false;',
                        'style' => 'text-decoration: none;',
                        'onClick' => '"$(\'#hiddenDownloader\')[0].src = \'index.php?r=intralib/monograph/download&id=" . $data->id . "\'; return false;"',
                        'evaluateOptions' => ['onClick'],
                    ],
                ],
            ],
        ],
    ],
]);

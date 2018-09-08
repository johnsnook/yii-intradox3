<?php

$this->widget('booster.widgets.TbGridView', [
    'id' => $this->id . '-grid',
    'dataProvider' => $gridSearchDP,
    'filter' => null,
    'type' => 'striped',
    'template' => '<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" >{pager}</div></div>
<div class="row"><div class="col-md-12">{items}</div></div>
<div class="row"><div class="col-md-4">{summary}</div><div class="col-md-8" >{pager}</div></div>', 'columns' => [
        [
            'name' => 'title',
            'header' => 'Title',
            'type' => 'raw',
            'value' => 'CHtml::link($data->title, ["view", "id"=> $data->id])',
            'htmlOptions' => ['class' => 'col-md-5',],
            'headerHtmlOptions' => ['class' => 'col-md-5'],
        ],
        [
            'name' => 'monographCount',
            'header' => 'Monographs',
            'type' => 'number',
            'htmlOptions' => ['class' => 'col-md-3', 'style' => 'text-align: right'],
            'headerHtmlOptions' => ['class' => 'col-md-3', 'style' => 'text-align: right'],
            'filter' => '',
        ],
    ],
]);

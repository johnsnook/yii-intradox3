<?php

require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "{$this->title}: {$model->title}",
    'headerIcon' => $model->glyph,
    'context' => 'info',
    'padContent' => true,
]);

$this->widget('booster.widgets.TbButtonGroup', [
    'buttonType' => 'link',
    'size' => 'small',
    'buttons' => $this->menu,
]);

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'editor',
        'notes',
        'monographs' => ['name' => 'monographLinks', 'header' => 'Monographs', 'value' => $model->monographLinks, 'type' => 'raw'],
    ),
));

$this->endWidget();
?>

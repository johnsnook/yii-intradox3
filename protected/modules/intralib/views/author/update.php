<?php

require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "Create new {$this->title}",
    'headerIcon' => $model->glyph,
    'context' => 'info',
    'padContent' => true,
        //'htmlOptions' => array('class' => 'bootstrap-widget-table')
]);

$this->widget('booster.widgets.TbButtonGroup', [
    'buttonType' => 'link',
    'size' => 'small',
    'buttons' => $this->menu,
]);
echo $this->renderPartial('_form', ['model' => $model]);

$this->endWidget();
?>
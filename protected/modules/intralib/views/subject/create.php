<?php

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "Create new {$this->title}",
    'headerIcon' => $model->glyph,
    'context' => 'primary',
    'padContent' => true,
]);

$this->widget('booster.widgets.TbButtonGroup', [
    'buttonType' => 'link',
    'size' => 'small',
    'buttons' => $this->menu,
]);

echo $this->renderPartial('_form', ['model' => $model]);

$this->endWidget();
?>
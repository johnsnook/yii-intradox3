
<?php

require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "Update {$this->title}: {$model->title}",
    'headerIcon' => $model->glyph,
    'context' => 'info',
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
<?php

$this->menu = [];
$this->menu[] = [
    'buttonType' => 'submit',
    'icon' => 'floppy-disk',
    'context' => 'primary',
    'label' => 'Create',
];
$this->menu[] = [
    'buttonType' => 'link',
    'id' => 'btnCancel',
    'icon' => 'triangle-left',
    'url' => $this->createUrl('index', ['project_id' => $this->Project->id]),
    'label' => 'Cancel',
];
echo $this->renderPartial('_form', array(
    'model' => $model,
    'authorsArray' => $authorsArray,
    'topicsArray' => $topicsArray,
    'typesArray' => $typesArray,
));
?>

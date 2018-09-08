<?php

require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = [];
$this->menu[] = [
    'buttonType' => 'submit',
    'icon' => 'floppy-disk',
    'context' => 'primary',
    'label' => 'Save',
];
$this->menu[] = [
    'buttonType' => 'link',
    'id' => 'btnCancel',
    'icon' => 'triangle-left',
    'url' => $this->createUrl('view', ['id' => $model->id]),
    'label' => 'Cancel',
];
#['label' => 'Browse Documents', 'url' => ['project/view', 'id' => $this->Project->id)),
// regular jerks and better can do stuff
if ($this->userData->userlevel > ROLE_CLIENT) {
    $this->menu[] = array('label' => 'New Document', 'icon' => 'plus-sign', 'url' => array('document/create', 'project_id' => $this->Project->id));
    $this->menu[] = [
        'label' => 'Duplicate this document',
        'icon' => 'duplicate',
        'url' => $this->createUrl('duplicate', ['id' => $model->id]),
    ];
    if ($this->userData->userlevel === ROLE_ADMIN OR $model->creator->id == Yii::app()->user->id) {
        $this->menu[] = [
            'label' => "Delete this {$this->id}",
            'url' => "javascript:del('{$this->id}',{$model->id})",
            'context' => 'warning',
            'icon' => 'remove-circle'
        ];
    }
}
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);

echo $this->renderPartial('_form', [
    'model' => $model,
    'authorsArray' => $authorsArray,
    'topicsArray' => $topicsArray,
    'typesArray' => $typesArray,
    'docsArray' => $docsArray,
]);
?>

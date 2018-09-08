<?php

$this->layout = 'column1';
$this->menu = [
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "Add new {$this->id}", 'url' => ['create']],
    ['label' => "View ths {$this->id}", 'url' => ['view', 'id' => $model->id]],
];
?>
<?php echo $this->renderPartial('_form', ['model' => $model]); ?>
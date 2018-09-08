<?php

$this->layout = '//layouts/medium';

$this->menu = array(
    array('label' => 'Browse users', 'url' => array('index')),
    array('label' => 'Add a new user', 'url' => array('create')),
    array('label' => 'Cancel edit', 'url' => array('view', 'id' => $model->id)),
    #array('label'=>'Manage Person','url'=>array('admin')),
);



$this->renderPartial('_form', [
    'model' => $model,
    'form' => $form
]);
?>

<?php
/* @var $this SuperController */
/* @var $model Super */
?>

<?php
$this->breadcrumbs = array(
    'Supers' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Super', 'url' => array('index')),
    array('label' => 'Create Super', 'url' => array('create')),
    array('label' => 'Update Super', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Super', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Super', 'url' => array('admin')),
);
?>

<h1>View Super #<?= $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
    ),
));
?>
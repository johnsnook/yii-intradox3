<?php
/* @var $this SuperController */
/* @var $model Super */
?>

<?php
$this->breadcrumbs=array(
	'Supers'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Super', 'url'=>array('index')),
	array('label'=>'Create Super', 'url'=>array('create')),
	array('label'=>'View Super', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Super', 'url'=>array('admin')),
);
?>

    <h1>Update Super <?= $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
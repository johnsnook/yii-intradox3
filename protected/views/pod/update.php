<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Pod','url'=>array('index')),
	array('label'=>'Create Pod','url'=>array('create')),
	array('label'=>'View Pod','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Pod','url'=>array('admin')),
	);
	?>

	<h1>Update Pod <?= $model->id; ?></h1>

<?= $this->renderPartial('_form',array('model'=>$model)); ?>
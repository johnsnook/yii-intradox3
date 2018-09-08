<?php
$this->breadcrumbs=array(
	'Logs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Log','url'=>array('index')),
	array('label'=>'Create Log','url'=>array('create')),
	array('label'=>'View Log','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Log','url'=>array('admin')),
	);
	?>

	<h1>Update Log <?= $model->id; ?></h1>

<?= $this->renderPartial('_form',array('model'=>$model)); ?>
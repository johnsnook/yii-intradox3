<?php
/* @var $this SuperController */
/* @var $model Super */
?>

<?php
$this->breadcrumbs=array(
	'Supers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Super', 'url'=>array('index')),
	array('label'=>'Manage Super', 'url'=>array('admin')),
);
?>

<h1>Create Super</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
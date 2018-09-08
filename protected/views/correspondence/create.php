<?php
/* @var $this CorrespondenceController */
/* @var $model Correspondence */
?>

<?php
$this->breadcrumbs=array(
	'Correspondences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Correspondence', 'url'=>array('index')),
	array('label'=>'Manage Correspondence', 'url'=>array('admin')),
);
?>

<h1>Create Correspondence</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
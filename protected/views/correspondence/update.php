<?php
/* @var $this CorrespondenceController */
/* @var $model Correspondence */
?>

<?php
$this->breadcrumbs=array(
	'Correspondences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Correspondence', 'url'=>array('index')),
	array('label'=>'Create Correspondence', 'url'=>array('create')),
	array('label'=>'View Correspondence', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Correspondence', 'url'=>array('admin')),
);
?>

    <h1>Update Correspondence <?= $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
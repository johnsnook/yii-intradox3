<?php
/* @var $this CorrespondenceController */
/* @var $model Correspondence */
?>

<?php
$this->breadcrumbs=array(
	'Correspondences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Correspondence', 'url'=>array('index')),
	array('label'=>'Create Correspondence', 'url'=>array('create')),
	array('label'=>'Update Correspondence', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Correspondence', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Correspondence', 'url'=>array('admin')),
);
?>

<h1>View Correspondence #<?= $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'document_id',
		'recipient',
		'personal_author',
	),
)); ?>
<?php
/* @var $this FavoriteController */
/* @var $model Favorite */
?>

<?php
$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Favorite', 'url'=>array('index')),
	array('label'=>'Create Favorite', 'url'=>array('create')),
	array('label'=>'Update Favorite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Favorite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Favorite', 'url'=>array('admin')),
);
?>

<h1>View Favorite #<?= $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'person_id',
		'super_id',
		'when',
	),
)); ?>
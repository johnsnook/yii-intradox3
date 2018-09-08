<?php
/* @var $this SuperController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Supers',
);

$this->menu=array(
	array('label'=>'Create Super','url'=>array('create')),
	array('label'=>'Manage Super','url'=>array('admin')),
);
?>

<h1>Supers</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
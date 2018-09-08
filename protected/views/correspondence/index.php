<?php
/* @var $this CorrespondenceController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Correspondences',
);

$this->menu=array(
	array('label'=>'Create Correspondence','url'=>array('create')),
	array('label'=>'Manage Correspondence','url'=>array('admin')),
);
?>

<h1>Correspondences</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
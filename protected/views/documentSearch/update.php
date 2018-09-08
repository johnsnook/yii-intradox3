<?php
$this->breadcrumbs=array(
	'Document Searches'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DocumentSearch','url'=>array('index')),
	array('label'=>'Create DocumentSearch','url'=>array('create')),
	array('label'=>'View DocumentSearch','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DocumentSearch','url'=>array('admin')),
	);
	?>

	<h1>Update DocumentSearch <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
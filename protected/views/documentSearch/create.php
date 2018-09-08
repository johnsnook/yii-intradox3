<?php
$this->breadcrumbs=array(
	'Document Searches'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DocumentSearch','url'=>array('index')),
array('label'=>'Manage DocumentSearch','url'=>array('admin')),
);
?>

<h1>Create DocumentSearch</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
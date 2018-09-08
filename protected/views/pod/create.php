<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Pod','url'=>array('index')),
array('label'=>'Manage Pod','url'=>array('admin')),
);
?>

<h1>Create Pod</h1>

<?= $this->renderPartial('_form', array('model'=>$model)); ?>
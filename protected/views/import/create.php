<?php
$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Log','url'=>array('index')),
array('label'=>'Manage Log','url'=>array('admin')),
);
?>

<h1>Create Log</h1>

<?= $this->renderPartial('_form', array('model'=>$model)); ?>
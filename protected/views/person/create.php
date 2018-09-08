<?php
$this->breadcrumbs = array(
	'Intradox' => array('site/dashboard'),
	'Users' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'Browse users', 'url' => array('index')),
		#array('label'=>'Manage Person','url'=>array('admin')),
);
?>

<h1>Add a new Intradox user</h1>

<?= $this->renderPartial('_form', array('model' => $model)); ?>
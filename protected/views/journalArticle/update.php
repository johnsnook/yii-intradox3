<?php
/* @var $this JournalArticleController */
/* @var $model JournalArticle */
?>

<?php
$this->breadcrumbs=array(
	'Journal Articles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JournalArticle', 'url'=>array('index')),
	array('label'=>'Create JournalArticle', 'url'=>array('create')),
	array('label'=>'View JournalArticle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JournalArticle', 'url'=>array('admin')),
);
?>

    <h1>Update JournalArticle <?= $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
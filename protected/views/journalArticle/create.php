<?php
/* @var $this JournalArticleController */
/* @var $model JournalArticle */
?>

<?php
$this->breadcrumbs=array(
	'Journal Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JournalArticle', 'url'=>array('index')),
	array('label'=>'Manage JournalArticle', 'url'=>array('admin')),
);
?>

<h1>Create JournalArticle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
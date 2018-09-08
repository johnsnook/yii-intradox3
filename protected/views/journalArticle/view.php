<?php
/* @var $this JournalArticleController */
/* @var $model JournalArticle */
?>

<?php
$this->breadcrumbs=array(
	'Journal Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JournalArticle', 'url'=>array('index')),
	array('label'=>'Create JournalArticle', 'url'=>array('create')),
	array('label'=>'Update JournalArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JournalArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JournalArticle', 'url'=>array('admin')),
);
?>

<h1>View JournalArticle #<?= $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'document_id',
		'personal_authors',
		'journal',
		'volume',
		'page_range',
		'issue',
	),
)); ?>
<?php
/* @var $this JournalArticleController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Journal Articles',
);

$this->menu=array(
	array('label'=>'Create JournalArticle','url'=>array('create')),
	array('label'=>'Manage JournalArticle','url'=>array('admin')),
);
?>

<h1>Journal Articles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
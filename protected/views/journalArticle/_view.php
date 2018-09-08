<?php
/* @var $this JournalArticleController */
/* @var $data JournalArticle */
?>

<div class="view">

    	<b><?= CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?= CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('document_id')); ?>:</b>
	<?= CHtml::encode($data->document_id); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('personal_authors')); ?>:</b>
	<?= CHtml::encode($data->personal_authors); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('journal')); ?>:</b>
	<?= CHtml::encode($data->journal); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?= CHtml::encode($data->volume); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('page_range')); ?>:</b>
	<?= CHtml::encode($data->page_range); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?= CHtml::encode($data->issue); ?>
	<br />


</div>
<?php
/* @var $this CorrespondenceController */
/* @var $data Correspondence */
?>

<div class="view">

    	<b><?= CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?= CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('document_id')); ?>:</b>
	<?= CHtml::encode($data->document_id); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('recipient')); ?>:</b>
	<?= CHtml::encode($data->recipient); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('personal_author')); ?>:</b>
	<?= CHtml::encode($data->personal_author); ?>
	<br />


</div>
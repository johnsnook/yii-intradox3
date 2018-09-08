<?php
/* @var $this FavoriteController */
/* @var $data Favorite */
?>

<div class="view">

    	<b><?= CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?= CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
	<?= CHtml::encode($data->person_id); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('super_id')); ?>:</b>
	<?= CHtml::encode($data->super_id); ?>
	<br />

	<b><?= CHtml::encode($data->getAttributeLabel('when')); ?>:</b>
	<?= CHtml::encode($data->when); ?>
	<br />


</div>
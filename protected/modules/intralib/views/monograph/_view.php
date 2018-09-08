<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accession_number')); ?>:</b>
	<?php echo CHtml::encode($data->accession_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('call_number')); ?>:</b>
	<?php echo CHtml::encode($data->call_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('series_title')); ?>:</b>
	<?php echo CHtml::encode($data->series_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pages')); ?>:</b>
	<?php echo CHtml::encode($data->pages); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('volumn_number')); ?>:</b>
	<?php echo CHtml::encode($data->volumn_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edition_number')); ?>:</b>
	<?php echo CHtml::encode($data->edition_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('binding')); ?>:</b>
	<?php echo CHtml::encode($data->binding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_type')); ?>:</b>
	<?php echo CHtml::encode($data->document_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_number')); ?>:</b>
	<?php echo CHtml::encode($data->agency_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	*/ ?>

</div>
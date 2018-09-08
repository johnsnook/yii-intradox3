<div class="panel panel-default" style="border-top: 0px; padding: 20px">
	<?php
	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
		'action' => Yii::app()->createUrl('project/view'),
		'method' => 'get',
		'htmlOptions' => array('id' => 'filter-form'),
	));
	echo CHtml::textField('searchString', (isset($_GET['searchString'])) ? $_GET['searchString'] : '', array('id' => 'searchString'));
	#echo $form->textFieldGroup($model, 'title', array('class' => 'span5'));
	$this->widget('booster.widgets.TbButton', array(
		'buttonType' => 'submit',
		'icon' => 'search',
		'htmlOptions' => array(
			'name' => '',
		),
		'context' => 'primary',
		'label' => 'Search',
	));

	$this->widget('booster.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '../document/_view',
		'id' => 'ajaxListView',
	));
	?>
	<?php $this->endWidget(); ?>

</div>

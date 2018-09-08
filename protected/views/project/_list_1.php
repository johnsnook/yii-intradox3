<div class="panel panel-default" style="border-top: 0px; padding: 20px">
	<?php
	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
		'htmlOptions' => array('id' => 'filter-form'),
	));

	echo CHtml::textField('searchString', (isset($_GET['searchString'])) ? $_GET['searchString'] : '', array('id' => 'searchString'));
	echo '&nbsp;';

	$this->widget('booster.widgets.TbButton', array(
		'buttonType' => 'submit',
		'icon' => 'filter',
		'size' => 'small',
		'htmlOptions' => array(
			'name' => '',
		),
		'context' => 'primary',
		'label' => 'Filter Projects',
	));

	$this->widget('booster.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '../project/_view',
		'id' => 'ajaxListView',
		'enableSorting' => 1,
		'sortableAttributes' => array(
			'title' => 'Project Title',
			'document_count' => 'Document Count',
		),
		'template' => '<div class="row" style="text-align:left"><div class="col-md-8">{summary}{items}{pager}</div></div>'
	));
	?>
	<?php $this->endWidget(); ?>

</div>

<div class="panel panel-default" style="border-top: 0px; padding: 20px">
	<?php
	$this->widget('booster.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '../log/_view',
		'enablePagination' => true,
		'enableSorting' => true,
		'template' => '<div class="panel panel-default"><div class="panel-heading">History:{summary}</div>
	<div class="panel-body panel-default">{items}{pager}</div>

</div>',
		'sortableAttributes' => array(
			'log_time' => 'When',
		),
	));
	?>

</div>

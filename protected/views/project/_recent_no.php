<div class="panel panel-default" style="border-top: 0px; padding: 20px">
	<?php
	$this->widget('booster.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '_view',
		'enableSorting' => 1,
		'sortableAttributes' => array(
			'title' => 'Project Title',
			'document_count' => 'Document Count',
		),
		'template' => '<div class="row" style="text-align:left"><div class="col-md-8">{summary}{items}{pager}</div></div>'
	));
	?>
</div>

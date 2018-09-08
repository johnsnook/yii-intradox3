<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <h4>Log of project and document activity</h4>
	<?php
	$this->widget('booster.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '../log/_view',
		'enableSorting' => 1,
		'sortableAttributes' => array(
			'title' => 'Description',
			'document_count' => 'Document Count',
		),
		'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}{pager}</div></div>'
	));
	?>
</div>

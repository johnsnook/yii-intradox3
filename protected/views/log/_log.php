<div class="panel panel-default tab-panel">
    <?php
    $this->widget('booster.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '//log/_view',
        'enableSorting' => 1,
        'sortableAttributes' => array(
            'title' => 'Description',
            'document_count' => 'Document Count',
        ),
        'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}<div style="text-align:left">{pager}</div></div></div>'
    ));
    ?>
</div>

<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <h4>Favorite Documents</h4>
    <?php
    $this->widget('booster.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'enableSorting' => 1,
        'sortableAttributes' => array(
            'title' => 'Document Title',
            'document_count' => 'Document Count',
        ),
        'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}<div style="text-align:left">{pager}</div></div></div>'
    ));
    ?>
</div>

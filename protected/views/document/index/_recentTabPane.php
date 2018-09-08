<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <h4>History</h4>
    <span style="display: inline">Sort:
        <?=
        CHtml::dropDownList('rdpSort', '', array(
            'log.log_time DESC' => "Recent",
            'title ASC' => 'Title (A->Z)',
            'title DESC' => 'Title (Z->A)',
            'corporate_author ASC' => 'Author (A->Z)',
            'corporate_author DESC' => 'Author (Z->A)',
            ), array('id' => 'sortDrop'));
        ?></span>
    <?php
    $this->widget('booster.widgets.TbListView', array(
        'id' => 'recentDocs',
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'enableSorting' => 1,
        'sortableAttributes' => array(
            'title' => 'Document Title',
            'document_count' => 'Document Count',
        ),
        'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}{pager}</div></div>'
    ));
    Yii::app()->clientScript->registerScript('specialSort', '
        $("body").on("click","#sortDrop",function(){
            $.fn.yiiListView.update("recentDocs",{data:{rdpSort:$(this).val()},type:"POST"})
        });
');
    ?>

</div>
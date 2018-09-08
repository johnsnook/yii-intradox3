<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <h4>Log of project and document activity</h4>
    <span style="display: inline">Sort:
        <?=
        CHtml::dropDownList('rdpSort', '', array(
            'log_time DESC' => "Newest",
            'log_time ASC' => "Oldest",
            'action ASC' => 'Action (A->Z)',
            'action DESC' => 'Action (Z->A)',
            'person_id ASC' => 'Person (A->Z)',
            'person_id DESC' => 'Person (Z->A)',
                ), array('id' => 'sortDrop2'));
        ?></span>
    <?php
    $this->widget('booster.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'id' => 'projectLog',
        'itemView' => '../log/_view',
        'enableSorting' => 1,
        'sortableAttributes' => array(
            'action' => 'action',
            'log_time' => 'log_time',
        ),
        'template' => '<div class="row" style="text-align:left"><div class="col-md-12">{summary}{items}<div style="text-align:left">{pager}</div></div></div>'
    ));
    Yii::app()->clientScript->registerScript('specialSort2', '
        $("body").on("click","#sortDrop2",function(){
            $.fn.yiiListView.update("projectLog",{data:{rdpSort:$(this).val()},type:"POST"})
        });
');
    ?>

</div>

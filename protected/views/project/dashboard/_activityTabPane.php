<style>
    .flotGraph {
        width: 100%;
        height: 400px;
        font-size: 14px;
        line-height: 1.2em;
        float:left;
        /*width:100%;*/
        height:400px;

    }
    #activityGraph
    {
        /*
        * Contains everything
        */
        position:relative;
        display: block;
        height: 450px;
        width: 100%;

        margin-top: 10px;
        padding: 45px;
        border:5px solid black;
    }
</style>

<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <?php
    $this->widget(
            'booster.widgets.TbTabs', array(
        'type' => 'pills',
        'placement' => 'top',
        'tabs' => [
            [
                'label' => 'Data',
                'id' => 'activityDataTab',
                'active' => true,
                'icon' => 'blackboard',
                'badgeOptions' => ['label' => Log::model()->GetMyLog()->getTotalItemCount() . '+'],
                'content' => $this->renderPartial('dashboard/_recent', [], true),
            #'content' => $this->renderPartial('_projectInfoTabPane', [ 'model' => $model], true)
            ],
            [
                'label' => 'Graph',
                'id' => 'activityDataGraphTab',
                'icon' => 'fire',
                'content' => '<div id="calendar_basic" style="width: 1000px; height: 350px;"></div>'
            ],
        ],
            )
    );
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#activityDataGraphTab').click(function () {
            $("#activityGraph").load('index.php?r=log/getGraph&person_id=<?= Yii::app()->user->id ?>');
        });

        $(window).resize(function () {
            //$("#activityGraph").load('index.php?r=log/getGraph&person_id=<?= Yii::app()->user->id ?>');
        });
    });

</script>
<?php
?>
<script type="text/javascript">

</script>
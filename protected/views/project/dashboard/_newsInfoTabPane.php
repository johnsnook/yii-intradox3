<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <?php
    if ($this->userData->userlevel == ROLE_ADMIN) {

        $this->widget('booster.widgets.TbButton', array(
            'size' => 'small',
            'label' => 'Add News Item',
            'context' => 'success',
            'buttonType' => 'link',
            'url' => $this->createUrl('news/create'),
        ));
    }
    $this->widget('booster.widgets.TbListView', array(
        'dataProvider' => $newsDP,
        'itemView' => '//news/_view',
        'template' => '{items}',
        'emptyText' => "Looks like there hasn't been any news in a while."
    ));
    ?>

    <?php echo CHtml::link('Old news', array('news/index')); ?>


    <script type="text/javascript">
        $(document).ready(function () {
        });

    </script>
</div>
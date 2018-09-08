<?php
$this->layout = "medium";

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "{$this->title} list",
    'headerIcon' => $model->glyph,
    'context' => 'info',
    'padContent' => true,
        //'htmlOptions' => array('class' => 'bootstrap-widget-table')
        ]
);
?>
<div class="row"><div class="col-md-12">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', [
            'buttonType' => 'link',
            'size' => 'small',
            'context' => 'default',
            'htmlOptions' => ['class' => 'pull-left'],
            'buttons' => $this->menu,
        ]);
        ?>
    </div>
</div>
<div class="row" style="margin-top: 20px"><div class="col-md-12">
        <?php
        $this->renderPartial('/_search', ['model' => $model]);
        ?>
    </div>
</div>

<?php
$this->renderPartial('/_grid', ['gridSearchDP' => $model->search()]);
$this->endWidget();
?>

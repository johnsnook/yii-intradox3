<?php
$this->layout = 'column1';
$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
);
?>


<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-search" data-toggle="tooltip" data-placement="right" data-original-title="For last year's words belong to last year's language
                  And next year's words await another voice. -T.S. Eliot"></span>&nbsp;<?= $this->route . ': ' . $model->title; ?>
        </h1>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', [
            'buttonType' => 'link',
            'htmlOptions' => ['class' => 'pull-left'],
            'buttons' => $this->menu,
        ]);
        ?><br/>
        <?php
        $this->widget('booster.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
        ));
        ?>
    </div>
    <div class="panel-footer">

    </div>
</div>

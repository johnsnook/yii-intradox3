<?php
$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "Add new {$this->id}", 'url' => ['create']],);
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-sunglasses"></span>
            <span class="pull-right" ><?= $this->route . ': ' . $model->title; ?></span>
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
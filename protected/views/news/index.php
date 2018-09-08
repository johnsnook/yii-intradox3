<?php
$this->menu = array(
    ['label' => "Add new {$this->id} item", 'url' => ['create']],);
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-<?= News::model()->glyph ?>"></span>
            <span class="pull-right" ><?= $this->route ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <?php
        $this->widget('booster.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'template' => "{items}",
        ));
        ?>
    </div>
    <div class="panel-footer">
        
    </div>
</div>
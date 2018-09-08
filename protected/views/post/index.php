<?php

$this->menu=array(
array('label'=>'Create Post','url'=>array('create')),
array('label'=>'Manage Post','url'=>array('admin')),
);
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-<?= Post::model()->glyph ?>"></span>
            <span class="pull-right" ><?= $this->route ?></span>
        </h1>
    </div>
    <div class="panel-body">

        <?php
        $this->widget('booster.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'template' => "{items}",
        ));
        ?>
    </div>
    
        <div class="panel-footer">
        <div class="row">
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
    </div>
</div>

<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "View ths {$this->id}", 'url' => ['view', 'id' => $model->id]],
    ['label' => "Edit this {$this->id}", 'url' => ['update', 'id' => $model->id]],
    ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",],
);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-sunglasses"></span>
            <span class="pull-right" >Viewing <?= ucfirst($this->id) . ': ' . $model->title; ?></span>
        </h1>
    </div>

    <div class="panel-body theme-<?= $model->id ?>">
        <?php
        $this->widget('booster.widgets.TbDetailView', array(
            'data' => $model,
            'type' => 'condensed',
            'attributes' => array(
                'id',
                'title',
                'bootstrap_file',
                'invert_nav',
            ),
        ));
        ?>
    </div>
    <div class="panel-footer">
        <div class="form-actions" style="display: block; height: 50px;">
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



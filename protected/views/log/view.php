<?php
$this->layout = 'column1';

$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "Add new {$this->id}", 'url' => ['create']],
    ['label' => "View ths {$this->id}", 'url' => ['view', 'id' => $model->id]],
    ['label' => 'Edit this {$this->id}', 'url' => ['update', 'id' => $model->id]],
    ['label' => 'Delete this {$this->id}', 'url' => '#', 'linkOptions' => ['submit' => ['delete', 'id' => $model->id], 'confirm' => 'Are you sure you want to delete this item?']],
);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-tree-conifer"></span>
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

        $this->widget('booster.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'id',
                'title',
                'action',
                'super_id',
                'person_id',
                'field',
                'log_time',
                'old_value',
                'new_value',
            ),
        ));
        ?>
    </div>
    <div class="panel-footer">

    </div>
</div>
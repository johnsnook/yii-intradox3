<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    [
        'label' => 'Edit',
        'icon' => 'edit',
        'context' => 'primary',
        'url' => ['update', 'id' => $model->id]
    ],
    ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",],
);
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);
$lbl = $model->attributeLabels();
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="fa fa-ticket" data-toggle="tooltip" data-placement="right" data-original-title="Phlebas the Phoenician, a fortnight dead,
                  Forgot the cry of gulls, and the deep sea swell
                  And the profit and loss.
                  -T. S. Eliot"></span>
            &nbsp;Viewing <?= ucwords(str_replace('_', ' ', $model->class_name)); ?>: <?= $model->title; ?> </h1>
    </div>
    <div class="panel-body">
        <div class="row" >
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <table class="detail-view table-condensed" id="yw0">
            <tr class="row-fluid">
                <th><?= $lbl['start_date']; ?></th>
                <td><?= $model->start_date; ?></td>
            </tr>
            <?php if ($model->end_date) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['end_date']; ?></th>
                    <td><?= $model->end_date; ?></td>
                </tr>
            <?php endif; ?>
            <tr class="row-fluid">
                <th><?= $lbl['description']; ?></th>
                <td><?= $model->description; ?></td>
            </tr>
            <?php if ($model->type) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['type']; ?></th>
                    <td><?= $model->type; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($model->contaminant) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['contaminant']; ?></th>
                    <td><?= $model->contaminant; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($model->location) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['location']; ?></th>
                    <td><?= $model->location; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($model->company) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['company']; ?></th>
                    <td><?= $model->company; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($model->facility) : ?>
                <tr class="row-fluid">
                    <th><?= $lbl['facility']; ?></th>
                    <td><?= $model->facility; ?></td>
                </tr>
            <?php endif; ?>
            <?php
            $this->widget('ext.comments.CommentsWidget', [
                'parent_id' => $model->id,
                'userData' => $this->userData,
                'isPanel' => true
                    ], true)
            ?>
    </div>
</div>


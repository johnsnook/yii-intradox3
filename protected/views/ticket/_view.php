<?php
$d = new DateTime($data->created_stamp);
$when = $d->format('Y-m-d');
?>
<div class="view col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading ">
            <h5>
                <span class="fa fa-ticket"></span>&nbsp;<?= CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
            </h5>
        </div>
        <div class="panel-body">
            <p>
                <b><?= CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
                <?= CHtml::encode($data->status); ?>
            </p><p>
                <b><?= CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
                <?= CHtml::encode($data->person->title); ?>
            </p><p>
                <b><?= CHtml::encode($data->getAttributeLabel('created_stamp')); ?>:</b>
                <?= CHtml::encode($when); ?>
            </p><p>
                <b><?= CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
                <?= CHtml::link(CHtml::encode($data->url), $data->url); ?>
            </p><p>
                <b><?= CHtml::encode($data->getAttributeLabel('browser')); ?>:</b>
                <?= CHtml::encode($data->browser); ?>
            </p><p>
                <b><?= CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
                <?= CHtml::encode($data->description); ?>
            </p>
        </div>
        <div class = "panel-footer"><strong>Comments: <?= Post::model()->getTotalItemCount($data->id) ?></strong></div>
    </div>
</div>
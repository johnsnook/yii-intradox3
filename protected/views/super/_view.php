<?php
/* @var $this SuperController */
/* @var $data Super */
?>

<div class="panel panel-default panel-mini">
    <div class="panel-heading">
        <h2>
            <span class="glyphicon glyphicon-cloud"></span>
            <?= CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
        </h2>
    </div>
    <div class="panel-body">
        <p>class: <?= $data->class_name; ?></p>
    </div>
    <div class = "panel-footer"></div>

</div>
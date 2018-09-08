<div class="col-lg-3 col-md-4 col-sm-6">
    <?php
    $paneltype = Yii::app()->user->id == $data->id ? "info" : "default";
    ?>

    <div class="panel panel-<?= $paneltype ?> panel-mini">
        <div class="panel-heading ">
            <b>
                <span class="glyphicon glyphicon-user"></span>&nbsp;<?= CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
            </b>
        </div>
        <div class="panel-body" style="">
            <b><?= CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
            <?= CHtml::encode($data->username); ?>
            <br />

            <b><?= CHtml::encode($data->getAttributeLabel('userRole')); ?>:</b>
            <?= CHtml::encode($data->userRole); ?>
            <br />

            <b><?= CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            <?= CHtml::encode($data->email); ?>
            <br />

            <b><?= CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
            <?= CHtml::encode($data->phone); ?>
            <br />

            <b>Current Theme:</b>
            <?= CHtml::encode($data->Theme->title); ?>
            <br />

            <b><?= CHtml::encode($data->getAttributeLabel('podName')); ?>:</b>
            <?= CHtml::encode($data->podName); ?>
            <br />

            <?php if ($data->ldap) { ?>
                <b><?= CHtml::encode($data->getAttributeLabel('ldap')); ?></b>
                <br />
            <?php } ?>

        </div>

        <div class = "panel-footer"></div>

    </div>
</div>
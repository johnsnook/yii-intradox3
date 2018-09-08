<div class="view">

    <b><?= CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?= CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?= CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?= CHtml::encode($data->title); ?>
    <br />


    <b><?= CHtml::encode($data->getAttributeLabel('members')); ?>:</b>
    <?php
    #var_dump($data->memberList);
    ?>
    <pre>
        <?= json_encode($data->memberList, JSON_PRETTY_PRINT) ?>
    </pre>
    <br />



</div>
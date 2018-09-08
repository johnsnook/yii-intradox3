<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl('document/search'),
    'method' => 'get',
        ));
?>

<?= $form->textFieldGroup($model, 'id', array('class' => 'span5')); ?>

<?= $form->textFieldGroup($model, 'title', array('class' => 'span5')); ?>

<?= $form->hiddenFieldGroup($model, 'project_id'); ?>

<?= $form->checkBoxGroup($model, 'archived'); ?>

<?= $form->checkBoxGroup($model, 'restricted'); ?>

<?= $form->textFieldGroup($model, 'jobnumber', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'icon' => 'search',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

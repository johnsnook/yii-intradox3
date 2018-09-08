<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?= $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?= $form->textFieldRow($model, 'title', array('class' => 'span5')); ?>

<?= $form->checkBoxRow($model, 'visible'); ?>


<?= $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 20)); ?>

<?= $form->textFieldRow($model, 'userlevel', array('class' => 'span5')); ?>

<?= $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 128)); ?>

<?= $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 30)); ?>

<?= $form->checkBoxRow($model, 'account_manager'); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

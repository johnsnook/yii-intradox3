<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?= $form->textFieldGroup($model, 'id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>


<?= $form->textFieldGroup($model, 'action', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'super_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'person_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'field', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'log_time', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textAreaGroup($model, 'old_value', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

    <?= $form->textAreaGroup($model, 'new_value', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?= $form->textFieldGroup($model, 'id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>


<?= $form->textFieldGroup($model, 'super_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?= $form->textAreaGroup($model, 'notes', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?= $form->textFieldGroup($model, 'person_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    <?= $form->textFieldGroup($model, 'when', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 0)))); ?>

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

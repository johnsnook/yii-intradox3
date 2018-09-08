<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'subject-form',
    'enableAjaxValidation' => true,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'general_classification', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    $this->widget('booster.widgets.TbButton', [
        'buttonType' => 'link',
        'context' => 'default',
        'label' => 'Cancel',
        'url' => Yii::app()->request->urlReferrer,
    ]);
    ?>
</div>

<?php $this->endWidget(); ?>

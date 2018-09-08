<?php
/* @var $this CorrespondenceController */
/* @var $model Correspondence */
/* @var $form TbActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'correspondence-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->errorSummary($model); ?>
            <?= $form->hiddenField($model, 'document_id', array('span' => 5)); ?>
            <?= $form->textFieldGroup($model, 'recipient', array('span' => 5)); ?>
            <?= $form->textFieldGroup($model, 'personal_author', array('span' => 5)); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->

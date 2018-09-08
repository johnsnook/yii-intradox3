<?php
/* @var $this FavoriteController */
/* @var $model Favorite */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'favorite-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?= $form->errorSummary($model); ?>

            <?= $form->textFieldControlGroup($model,'person_id',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'super_id',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'when',array('span'=>5)); ?>

        <div class="form-actions">
        <?= TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
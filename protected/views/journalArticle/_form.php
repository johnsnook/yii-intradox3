<?php
/* @var $this JournalArticleController */
/* @var $model JournalArticle */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'journal-article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?= $form->errorSummary($model); ?>

            <?= $form->textFieldControlGroup($model,'document_id',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'personal_authors',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'journal',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'volume',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'page_range',array('span'=>5)); ?>

            <?= $form->textFieldControlGroup($model,'issue',array('span'=>5)); ?>

        <div class="form-actions">
        <?= TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this CorrespondenceController */
/* @var $model Correspondence */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?= $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'document_id',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'recipient',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'personal_author',array('span'=>5)); ?>

        <div class="form-actions">
        <?= TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
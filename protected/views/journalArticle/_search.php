<?php
/* @var $this JournalArticleController */
/* @var $model JournalArticle */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?= $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'document_id',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'personal_authors',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'journal',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'volume',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'page_range',array('span'=>5)); ?>

                    <?= $form->textFieldControlGroup($model,'issue',array('span'=>5)); ?>

        <div class="form-actions">
        <?= TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
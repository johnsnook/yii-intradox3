<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>


<?php echo $form->textFieldGroup($model, 'class_name', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'project_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textAreaGroup($model, 'description', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php echo $form->datePickerGroup($model, 'start_date', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->datePickerGroup($model, 'end_date', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->textFieldGroup($model, 'type', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'contaminant', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'location', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'company', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    <?php echo $form->textFieldGroup($model, 'facility', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

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

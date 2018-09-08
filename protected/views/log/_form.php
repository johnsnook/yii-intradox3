<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => $this->id . '-form',
    'enableAjaxValidation' => false));

if ($model->isNewRecord) {
    $title = 'Create new ' . $this->id;
} else {
    $title = "Edit {$this->id}: {$model->title}";
}
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-tree-conifer">&nbsp; <?= $title; ?></span></h1>
    </div>
    <div class="panel-body">
        <div class="row">`
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <?= $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>


        <?= $form->textFieldGroup($model, 'action', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?= $form->textFieldGroup($model, 'super_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?= $form->textFieldGroup($model, 'person_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?= $form->textFieldGroup($model, 'field', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?= $form->textFieldGroup($model, 'log_time', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?= $form->textAreaGroup($model, 'old_value', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

        <?= $form->textAreaGroup($model, 'new_value', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>


        <?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>


    </div>
    <div class="panel-footer">
        <div class="form-actions">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>


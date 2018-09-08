<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => $this->id . '-form',
    'enableAjaxValidation'=>false,
    ));

if ($model->isNewRecord) {
    $title = 'Create new ' . $this->id;
} else {
    $title = "Edit {$this->id}: {$model->title}";
}
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-sunglasses">&nbsp; <?= $title; ?></span></h1>
    </div>
    <div class="panel-body">

        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        <?php echo $form->checkBoxGroup($model, 'invert_nav', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

        <?php
        echo $form->textFieldGroup($model, 'bootstrap_file', array('widgetOptions' => array(
                'htmlOptions' => array('class' => 'span5'),
                'hint' => 'The name of the bootstrap theme file as it exists in /theme/snook/css/'
        )));
        ?>
    </div>
    <div class="panel-footer">
        <div class="form-actions">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'icon' => 'floppy-disk',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'id' => 'btnCancel',
                'icon' => 'triangle-left',
                'url' => $model->isNewRecord ? $_SERVER['HTTP_REFERER'] : $this->createUrl('view', ['id' => $model->id]),
                'label' => 'Cancel',
            ));
            ?>
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
    </div>
</div>
</div>
<?php $this->endWidget(); ?>

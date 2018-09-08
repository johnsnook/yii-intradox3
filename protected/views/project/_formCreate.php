<?php
//'dpProjectEmployees' => $dpProjectEmployees,
//'dpProjectGuests' => $dpProjectGuests,
//'dpEmployees' => $dpEmployees,
//'dpGuests' => $dpGuests,
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => $this->id . '-form',
    'enableAjaxValidation' => false,
        ));

if ($model->isNewRecord) {
    $title = 'Create new ' . $this->id;
} else {
    $title = "Edit {$this->id}: {$model->title}";
}
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-folder-close"  data-toggle="tooltip" data-placement="right" data-original-title="'What are the roots that clutch, what branches grow	 
                  Out of this stony rubbish?.' T.S. Eliot"></span>&nbsp; <?= $title; ?></h1>

    </div>
    <div class="panel-body">
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <p><?= $form->errorSummary($model); ?></p>

        <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-7">
                    <?= $form->textFieldGroup($model, 'title'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->checkBoxGroup($model, 'archived'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->checkBoxGroup($model, 'restricted'); ?>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-md-5">
                    <?php
                    $pods = Pod::model()->findAll(
                            array('order' => 'title'));
                    #$pods = array_unshift($pods, ['id' => 'null', 'title' => 'No pod selected']);
// format models as $key=>$value with listData
                    $options = [
                        'widgetOptions' => [
                            'data' => array('' => 'Please select a pod') + CHtml::listData($pods, 'id', 'title'),
                            'prompt' => 'Please select a pod'
                        ],
                        'options' => [
                            'empty' => 'Please select a pod']
                    ];
                    echo $form->dropDownListGroup($model, 'pod_id', $options);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->textFieldGroup($model, 'jobnumber'); ?>

                </div>
            </div>
        </div>
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
<?php $this->endWidget(); ?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'ticket-form',
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
        <h1><span class="fa fa-ticket"  data-toggle="tooltip" data-placement="right" data-original-title="'Oh keep the Dog far hence, that’s friend to men,	 
                  Or with his nails he’ll dig it up again!' T.S. Eliot"></span>&nbsp; <?= $title; ?></h1>

    </div>
    <div class="panel-body">
        <div class="row">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'icon' => 'floppy-disk',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'url' => $model->isNewRecord ? $this->createUrl('index') : $this->createUrl('view', ['id' => $model->id]),
                'id' => 'btnCancel',
                'icon' => 'triangle-left',
                'label' => 'Cancel',
            ));
            ?>
        </div>

        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        <?= $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                    $disabled = $this->userData->userlevel === ROLE_ADMIN ? null : ['disabled' => 'true'];
                    echo $form->dropDownListGroup($model, 'status', [
                        'widgetOptions' => [
                            'data' => $model->statusOptions,
                            'htmlOptions' => $disabled
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->textFieldGroup($model->person, 'title', ['widgetOptions' => ['htmlOptions' => ['disabled' => 'true']]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->textFieldGroup($model, 'url', ['widgetOptions' => ['htmlOptions' => ['disabled' => 'true']]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->textFieldGroup($model, 'title'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?=
                $form->textAreaGroup(
                        $model, 'description', array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-md-10',
                    ),
                    'widgetOptions' => array(
                        'htmlOptions' => array('rows' => 15),
                    )
                        )
                );
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'icon' => 'floppy-disk',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'url' => $model->isNewRecord ? $this->createUrl('index') : $this->createUrl('view', ['id' => $model->id]),
                'id' => 'btnCancel',
                'icon' => 'triangle-left',
                #'context' => 'primary',
                'label' => 'Cancel',
            ));
            ?>
        </div>

    </div>
</div>
<?php $this->endWidget(); ?>

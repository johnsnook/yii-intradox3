?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'person-form',
    'enableAjaxValidation' => false,
    ));
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-user"></span>
            <span class="pull-right" >Edit user: <?= $model->title; ?></span> </h2>
    </div>
    <?php
    $disabled = 'true';
    if (strlen($model->invitation_token) && ($this->userData->userlevel == ROLE_ADMIN))
        $disabled = null;
    ?>

    <div class="panel-body">

        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        <?= $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $form->textFieldGroup($model, 'title', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->textFieldGroup($model, 'username', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->textFieldGroup($model, 'password', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?= $form->textFieldGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->textFieldGroup($model, 'phone', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->checkBoxGroup($model, 'ldap', ['widgetOptions' => ['htmlOptions' => ['disabled' => 'true']]]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <?php
                if ($this->userData->userlevel !== ROLE_ADMIN) {
                    echo $form->textFieldGroup($model, 'userRole', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]);
                } else {
                    $options = [
                        'widgetOptions' => [
                            'data' => $model->UserLevels,
                        ],
                    ];
                    echo $form->dropDownListGroup($model, 'userlevel', $options);
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?= $form->textFieldGroup($model, 'podName', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
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
                'url' => $this->createUrl('person/view', ['id' => $model->id]),
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
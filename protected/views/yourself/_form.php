<script type="text/javascript" src="/js/jquery.pwstrength.bootstrap-1.2.5/examples/pwstrength.js"></script>
<style>
    div.pass-bar {
        height: 11px;
        margin-top: 2px;
    }
    div.pass-hint {
        font-family: arial;
        font-size: 11px;
    }
</style>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'id' => $this->id . '-form',
    'enableAjaxValidation' => true,
    //'enableClientValidation' => true,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
//    'clientOptions' => [
//        'validateOnSubmit' => true,
//        'validateOnChange' => true,
//    ]
        ]);
if ($model->isNewRecord) {
    $title = 'Create new ' . $this->id;
} else {
    $title = "Edit {$this->id}: {$model->title}";
}
$disabled = $model->ldap == true ? ['disabled' => $disabled] : null;
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right" data-original-title="Whenever I climb I am followed by a dog called 'Ego'. -Friedrich Nietzsche" ></span>&nbsp; <?= $title; ?></h1>

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context' => 'primary',
                    'label' => $model->isNewRecord ? 'Create' : 'Save',
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
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <?php
        echo $form->errorSummary($model);
        ?>
        <div class="col-md-12" style="margin-bottom: 25px">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->textFieldGroup($model, 'title', ['widgetOptions' => ['htmlOptions' => ['disabled' => $disabled]]]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->textFieldGroup($model, 'username', ['widgetOptions' => ['htmlOptions' => ['disabled' => 'true']]]); ?>
                </div>
            </div>
            <div class="row" id="pwd-container">
                <div class="col-md-5">
                    <div class="form-group">
                        <?php
                        echo $form->passwordFieldGroup($model, 'password', [
                            'widgetOptions' => [
                                'htmlOptions' => [
                                    'placeholder' => 'Make it a good one',
                                    'autocomplete' => 'off',
                                    'disabled' => 'true'
                                ],
                            ],
                            'class' => 'span2',
                            'maxlength' => 20
                        ]);
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1" style="padding-top: 30px;">
                    <div class="pwstrength_viewport_progress"></div>
                </div>
            </div>


            <script type="text/javascript">
                jQuery(document).ready(function () {
                    $("#Person_password").focus();
                    "use strict";
                    var options = {};
                    options.ui = {
                        container: "#pwd-container",
                        showVerdictsInsideProgressBar: true,
                        viewports: {
                            progress: ".pwstrength_viewport_progress"
                        }
                    };
                    options.common = {
                        debug: true,
                        onLoad: function () {
                            $('#messages').text('Start typing password');
                        },
                    };
                    $("button#savePass").prop("disabled", true);
                    $(':password').pwstrength(options).keyup(function () {
                        $("button#savePass").prop("disabled", (passwordScore < 20));
                    }).change(function () {
                        $("button#savePass").prop("disabled", (passwordScore < 20));
                    });
                });
            </script>
            <div class="row">
                <div class="col-md-5">
                    <?php
                    echo $form->textFieldGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => $disabled]]);
                    ?>
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
                <div class="col-md-6">
                    <?php
                    $themes = Theme::model()->findAll(
                            array('order' => 'title'));

// format models as $key=>$value with listData
                    $options = [
                        'widgetOptions' => [
                            'data' => CHtml::listData($themes, 'id', 'title'),
                        ],
                        'options' => [
                            'empty' => 'No theme selected']];
                    echo $form->dropDownListGroup($model, 'theme_id', $options);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $avatars = Avatar::model()->findAll(
                            array('order' => 'title'));

// format models as $key=>$value with listData
                    $options = [
                        'widgetOptions' => [
                            'data' => CHtml::listData($avatars, 'id', 'title'),
                        ],
                        'options' => [
                            'empty' => 'No theme selected']];
                    echo $form->dropDownListGroup($model, 'avatar_id', $options);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <image src="<?= $model->avatarUrl ?>" height="80" width="80" />
                    <?php echo $form->fileFieldGroup($model, 'temp_file', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'job_title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->numberFieldGroup($model, 'list_pagination', array('widgetOptions' => array('htmlOptions' => array('class' => 'col-md-1', 'maxlength' => 5)))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->numberFieldGroup($model, 'font_size', array('widgetOptions' => array('htmlOptions' => array('class' => 'col-md-3', 'maxlength' => 5)))); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context' => 'primary',
                    'label' => $model->isNewRecord ? 'Create' : 'Save',
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
<div class="panel panel-info panel-roundy">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl('person/savePassword', ['id' => $model->id]),
        'id' => 'person-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="panel-heading"><h2><span class="glyphicon glyphicon-user"></span>Welcome to Intradox, <?= $model->title ?>!</div>
    <div class="panel-body">
    <h4>  Before we can get started, we'll need you to set a strong password that you'll remember.</h4>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <div class="col-lg-10">
        <?php
        $div = '<div class="row">' . "\n";
        $ediv = "</div>\n";
        echo $form->errorSummary($model);
        $model->password = null;
        ?>

        <div class="row" id="pwd-container">
            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    echo $div . $form->passwordFieldGroup($model, 'password', array('widgetOptions' => [
                            'htmlOptions' => ['placeholder' => 'Make it a good one', 'autocomplete' => 'off'],
                        ], 'class' => 'span2', 'maxlength' => 20)) . $ediv;
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1" style="padding-top: 30px;">
                <div class="pwstrength_viewport_progress"></div>
            </div>
        </div>

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
        <script type="text/javascript" src="/js/jquery.pwstrength.bootstrap-1.2.5/examples/pwstrength.js"></script>
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
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'id' => 'savePass',
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Save',
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
    </div>
</div>
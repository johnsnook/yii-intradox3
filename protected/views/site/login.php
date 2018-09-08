<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->layout = '//layouts/small';
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-log-in" data-toggle="tooltip" data-placement="right" data-original-title="Let us go then, you and I,
                  When the evening is spread out against the sky
                  Like a patient etherized upon a table;
                  Let us go, through certain half-deserted streets,
                  The muttering retreats
                  Of restless nights in one-night cheap hotels
                  And sawdust restaurants with oyster-shells:
                  Streets that follow like a tedious argument
                  Of insidious intent
                  To lead you to an overwhelming question ...
                  Oh, do not ask, “What is it?”
                  Let us go and make our visit.
                  -T.S. Eliot"></span>&nbsp;Login</h2>
    </div>
    <div class="panel-body">
        <p>Please enter your login credentials:</p>

        <?php
        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
        <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->textFieldGroup($model, 'username'); ?>
                    <?= $form->error($model, 'username'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->passwordFieldGroup($model, 'password'); ?>
                    <?= $form->error($model, 'password'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->error($model, 'rememberMe'); ?>
                </div>
            </div>


        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="form-actions col-md-1">

                <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'icon' => 'log-in',
                    'context' => 'primary',
                    'label' => "\tLogin",
                ));
                ?>
            </div>
            <div class="col-md-9 col-md-offset-1">
                <?= $form->checkboxGroup($model, 'rememberMe'); ?>

            </div>
        </div>
    </div>

</div>



<?php $this->endWidget(); ?>

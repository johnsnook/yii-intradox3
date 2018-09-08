<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
$this->layout = '//layouts/column1';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading"><h1>Contact Us</h1></div>
    <div class="panel-body">

        <div class="form">
            <?php if (Yii::app()->user->hasFlash('contact')): ?>

                <div class="flash-success">
                    <?= Yii::app()->user->getFlash('contact'); ?>
                </div>

            <?php else: ?>

                <p>
                    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                </p>


                <?php
                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?= $form->errorSummary($model); ?>
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-5">
                            <?= $form->textFieldGroup($model, 'name'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <?= $form->textFieldGroup($model, 'email'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <?= $form->textFieldGroup($model, 'subject'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <?=
                            $form->html5EditorGroup(
                                    $model, 'body', array(
                                'widgetOptions' => array(
                                    'editorOptions' => array(
                                        'class' => 'span4',
                                        'rows' => 5,
                                        'height' => '200',
                                        'options' => array('color' => true)
                                    ),
                                )
                                    )
                            );
                            ?>
                        </div>
                    </div>


                    <?php if (CCaptcha::checkRequirements()): ?>
                        <div class="row">
                            <div class="col-md-5">

                                <?= $form->labelEx($model, 'verifyCode'); ?>:
                                <?= $form->textField($model, 'verifyCode'); ?>
                                <?php $this->widget('CCaptcha'); ?>
                                <div class="hint">Please enter the letters as they are shown in the image above.
                                    <br/>Letters are not case-sensitive.</div>
                                <?= $form->error($model, 'verifyCode'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <div class="row buttons">
                        <?php
                        $this->widget('booster.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'icon' => 'send',
                            'context' => 'primary',
                            'label' => 'Contact us',
                        ));
                        ?>

                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->

            <?php endif; ?>
        </div>
    </div>
</div>



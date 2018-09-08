<?php
/* @var $this PersonController */
/* @var $model CActiveRecord */
/* @var $project CActiveRecord */
?>
<?php
$this->layout = '//layouts/small';
$this->setPageTitle(Yii::app()->name . ' -  ' . $project->title);
$this->background = 'images/document-index.jpg';
$this->NavbarItems[] = ['label' => $project->title, 'icon' => 'folder-close', 'url' => ['document/index', 'project_id' => $project->id]];
?>
<div class="panel panel-info panel-roundy">
    <div class="panel-heading"><h2><span class="glyphicon glyphicon-user"></span> Create a client invitation to view the <?= $project->title ?> documents.</h2></div>
    <div class="panel-body"><p>They will receive an email with a link which will allow them to set their password and they will only be allowed to view <?= $project->title ?> documents.</p>
        <?php
        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'person-form',
            'enableAjaxValidation' => false,
            'method' => 'get'
        ));
        echo $form->hiddenField($model, 'userlevel');
        ?>
        <input type="hidden" id="project_id" name="project_id" value="<?= $project->id ?>" />
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <div class="col-md-12" style="margin-bottom: 25px">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'username', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>

                    <!--?php echo $form->passwordFieldGroup($model, 'password', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'email', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 128)))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'phone', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 30)))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->textFieldGroup($model, 'job_title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                    <div class="form-actions">


                    </div>
                </div>
            </div>
        </div></div>
    <div class="panel-footer">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'send',
            'context' => 'primary',
            'label' => 'Invite',
        ));
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'link',
            'id' => 'btnCancel',
            'icon' => 'arrow-left',
            'url' => $this->createUrl('document/index', ['project_id' => $project->id]),
            'label' => 'Cancel',
        ));
        ?>
    </div>
</div>

<script type="text/javascript">
    $().ready(function () {
        $('#Person_title').keyup(function () {
            var text = this.value;
            var words = text.split(' ');
            //console.log(text);
            if (words.length > 1) {
                username = words[0].substring(0, 1).toLowerCase() + words[words.length - 1].toLowerCase();
                $('#Person_username').val(username);
                $('#Person_email').val(username + '@');
            }

            $('#Person_title').val(toTitleCase($('#Person_title').val()));

        })
    });
    function toTitleCase(str)
    {
        return str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }
</script>
<?php $this->endWidget(); ?>

<div class="media" id="formPost">
    <?php
    /* @var $super_id integer */
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'post-form',
        'enableAjaxValidation' => false,
    ));
    $model = new Post('insert');
    ?>
    <div class="media-body">
        <?php
        echo $form->errorSummary($model);
        #echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));
        echo $form->hiddenField($model, 'super_id', array('value' => $super_id));
        echo "Super: $super_id";
        echo $form->hiddenField($model, 'person_id', array('value' => Yii::app()->user->id));
        echo $form->textAreaGroup($model, 'notes', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8'))));
        ?>
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'link',
            'url' => 'javascript:postCreate()',
            'icon' => 'floppy-disk',
            #'context' => 'primary',
            'label' => 'Save',
        ));
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'link',
            'url' => 'javascript:$("#comments #formPost").remove();',
            'icon' => 'triangle-left',
            'label' => 'Cancel',
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>

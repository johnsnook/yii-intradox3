<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$formid = $this->id . '-form';
$menu = [
    [
        'buttonType' => 'submit',
        'url' => 'javascript:$("form#' . $formid . '").submit()',
        'icon' => 'floppy-disk',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ],
    [
        'icon' => 'triangle-left',
        'url' => $model->isNewRecord ? $_SERVER['HTTP_REFERER'] : $this->createUrl('index', ['project_id' => $model->project_id]),
        'label' => 'Cancel',
    ],
    [
        'label' => "Delete",
        'url' => "javascript:del('{$this->id}',{$model->id})",
    ],
];
?>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'id' => $formid,
    'enableAjaxValidation' => true,
        ]);

if ($model->isNewRecord) {
    $title = 'Create new timeline event';
} else {
    $title = "Edit {$this->id}: {$model->title}";
}

$cs = Yii::app()->getClientScript();
$cs->registerPackage('jquery.ui');
?>
<script src="/js/jquery.combobox.js"></script>
<script language="javascript" type="text/javascript">
    $(function () {

        // logic for show/hide of unselected related docs
        $('#btnToggle').change(function () {
            if (!$(this).hasClass('active')) {
                $("#unselectedDocuments").show(500);
                $("#glyphToggle").removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-top');
            } else {
                $("#unselectedDocuments").hide(500);
                $("#glyphToggle").removeClass('glyphicon-triangle-top').addClass('glyphicon-triangle-bottom');
            }
        });

        //move the selected related docs above the fold
        $("#unselectedDocuments input:checked").each(function (i, item) {
            $(item).parents('div.checkbox').appendTo("#selectedDocuments");
        });

        // logic for related document lookup
        $('input#queryRelatedDocs').keyup(function () {
            setTimeout(function () {
                query = $('input#queryRelatedDocs').val();
                if (query.length > 0) {
                    $('#unselectedDocuments div.checkbox').hide();
                    $('#unselectedDocuments div.checkbox label:contains(' + query + ')')
                            .parents('div.checkbox').show();
                } else {
                    $('#unselectedDocuments div.checkbox').show();
                }

            }, 500);

        });
    });
</script>
<style>
    .ui-combobox {
        position: relative;
        display: inline-block;
    }
    .ui-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
        /* support: IE7 */
        *height: 1.7em;
        *top: 0.1em;
    }
    .ui-combobox-input {
        margin: 0;
        padding: 0.3em;
    }

    .custom-combobox {
        position: relative;
        /*display: inline-block;*/
    }
    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }
    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }
</style>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h3><span class="fa fa-bolt" data-toggle="tooltip" data-placement="right" data-original-title="I will show you fear in a handful of dust. -T. S. Eliot"></span>&nbsp;<?= $title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $this->widget(
                'booster.widgets.TbNavbar', [
            'brand' => 'Timeline',
            'brandUrl' => $this->createUrl('index', ['project_id' => $model->project_id]),
            'fixed' => false,
            //'fluid' => true,
            'items' => [
                [
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => $menu
                ]
            ]
                ]
        );
        ?>
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
        <div class="col-md-12">
            <div class="row">
                <?php
                echo $form->textFieldGroup($model, 'title');
                echo $form->hiddenField($model, 'project_id', ['value' => $this->Project->id]);
                if (!is_null($document_id)) {
                    echo $form->hiddenField($model, 'document_id', ['value' => $document_id]);
                }
                ?>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <?php
//                echo $form->textFieldGroup($model, 'start_date', ['widgetOptions' => [
//                        'htmlOptions' => ['placeholder' => 'YYYY-MM-DD', 'maxLength' => 10]]]);
                ?>
                <?php
                echo $form->datePickerGroup($model, 'start_date', array('widgetOptions' => array(
                        'options' => array('format' => 'yyyy-mm-dd', 'viewformat' => 'yyyy-mm-dd'), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.'));
                ?>
            </div>
            <div class="row">
                <?php
                echo $form->datePickerGroup($model, 'end_date', array('widgetOptions' => array(
                        'options' => ['format' => 'yyyy-mm-dd', 'viewformat' => 'yyyy-mm-dd'], 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.'));
                ?>
                <?php
//                echo $form->textFieldGroup($model, 'end_date', ['widgetOptions' => [
//                        'htmlOptions' => ['placeholder' => 'YYYY-MM-DD', 'maxLength' => 10]]]);
                ?>
            </div>
            <div class="row">
                <?= $form->textAreaGroup($model, 'description', ['widgetOptions' => ['htmlOptions' => ['rows' => 6, 'cols' => 50, 'class' => 'col-md-6']]]); ?>
            </div>
            <div class="row">
                <?php echo $form->textFieldGroup($model, 'type', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

            </div>
            <div class="row">
                <?php echo $form->textFieldGroup($model, 'contaminant', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

            </div>
            <div class="row">
                <?php echo $form->textFieldGroup($model, 'company', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

            </div>
            <div class="row">
                <?php echo $form->textFieldGroup($model, 'facility', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

            </div>
            <div class="row">
                <?php //echo $form->textFieldGroup($model, 'location', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

            </div>
        </div>
        <?php if (!$model->isNewRecord) : ?>
            <div class="row">
                <div class="col-md-12">
                    <label>Related Documents<div class="btn-group" data-toggle="buttons"><label class="btn btn-xs btn-default" id="btnToggle"><input type="checkbox" id="btnToggle"><span id="glyphToggle" class="glyphicon glyphicon-triangle-bottom"></span> Show all</label></div>
                    </label>
                    <!--option value="1725">silly dada wut</option-->
                    <div id="selectedDocuments"></div>
                    <br/>
                    <div class="col-lg-8" style="overflow-y: scroll;overflow-x: hidden; direction: rtl; margin-left: -40px; padding-left: 22px">
                        <div id="unselectedDocuments" style="display: none; height: 500px;direction: ltr;">
                            <div class="form-group">
                                <!--label class="control-label" for="queryRelatedDocs">Filter documents by</label-->
                                <input class="form-control" id="queryRelatedDocs" type="text" placeholder="Type any case sensitive part of the title." hint="This filter is case sensitive.">
                            </div>
                            <?php
                            //throw new Exception($model->id);
                            $relatedDocs = $model->getRelatedDocumentIds();
                            //$relatedDocs = SnookTools::array_column($relatedDocs, 'doc');
                            //throw new CDbException(json_encode($docsArray));
                            foreach ($docsArray as $doc) {
                                $selected = (in_array($doc['id'], $relatedDocs) ? 'checked' : '');
                                ?>
                                <div class="checkbox">
                                    <label class="checkbox">
                                        <input type="checkbox" name="<?= $className ?>[documents][]" id="<?= $className ?>_documents"
                                               value="<?= $doc['id'] ?>" <?= $selected ?>/><?= $doc['original_date'] . ' - ' . $doc['title'] ?>
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="panel-footer">

    </div>
</div>
</div>
<?php $this->endWidget(); ?>
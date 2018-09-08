<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'id' => 'monograph-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
    'clientOptions' => [
        'validateOnSubmit' => true,
        'validateOnChange' => true,
    ]]
);
$cs = Yii::app()->getClientScript();
$cs->registerPackage('jquery.ui');
$className = get_class($model);
?>
<script src="/js/jquery.combobox.js"></script>

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
        support: IE7 
            *height: 1.7em;
        *top: 0.1em;
    }
    .ui-combobox-input {
        margin: 0;
        padding: 0.3em;
    }


</style>
<script type="text/javascript" src="/js/jquery.serialize-object.min.js"></script>
<script type="text/javascript">
    var iErrorCount = 0;
    var isNewRecord = <?= $model->isNewRecord ? 'true' : 'false' ?>;
    var className = 'Monograph';
    // code from document/_form.php
    // limits the file size to 80MB so users dont have to wait for the round trip
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

        /* setup the combobox items */
        cbSelect = $('#locationSelect').combobox();
        $('input', cbSelect.parent())
                .attr({id: 'Monograph_location', name: 'Monograph[location]', placeholder: 'Location'})
                .val('<?= addslashes($model->location) ?>')
                .addClass('form-control');
        cbSelect = $('#typeSelect').combobox();
        doctypeInput = $('input', cbSelect.parent())
                .attr({id: 'Monograph_document_type', name: 'Monograph[document_type]', placeholder: 'Document Type'})
                .val('<?= addslashes($model->document_type) ?>')
                .addClass('form-control');
        if ($(doctypeInput).val() === '')
            $('input:first').focus();
        /* When the user selects a file for upload, validate the file size */
        $('input#' + 'Monograph_temp_file').change(function () {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                file = $('input#Monograph_temp_file')[0].files[0];
                $('span#filesize').text(humanFileSize(file.size));
                $('span#ext').text(file.name.substring(file.name.lastIndexOf('.') + 1).toUpperCase());
                if (file.size > 80000000) {
                    alert('Intradox file sizes are limited to an 80MB maximum.');
                    $('input#Monograph_temp_file').val(null);
                }
                if ($('input#Monograph_temp_file').val != null) {
                    $("#Monograph_document_type").val('Electronic Document');
                    $("#Monograph_document_type").prop('disabled', true);
                    $("#Monograph_document_type").parent().find('a').hide()
                }
            }
        });

    });
    function humanFileSize(bytes, si) {
        var thresh = si ? 1000 : 1024;
        if (bytes < thresh)
            return bytes + ' B';
        var units = si ? ['kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'] : ['KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
        var u = -1;
        do {
            bytes /= thresh;
            ++u;
        } while (bytes >= thresh);
        return bytes.toFixed(1) + ' ' + units[u];
    }
    ;
</script>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $form->textFieldGroup($model, 'title'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'accession_number'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'call_number'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->checkBoxListGroup($model, 'subjects'); ?>
            </div>
        </div>
        `        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'series_title'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'year'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'pages'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'volumn_number'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'edition_number'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'binding'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group ui-widget" >
                    <label class="control-label" for="Monograph_document_type"><?= $model->attributeLabels()['document_type'] ?></label>
                    <select class="form-control" id="typeSelect" style="position: relative; vertical-align: top; background-color: transparent;">
                        <option value=""></option>
                        <?php
                        $typesArray = $model->lookupDistinctField('document_type');

                        foreach ($typesArray as $option) {
                            echo "\t\t<option>$option</option>\n";
                        }
                        ?>
                    </select>
                    <div class="help-block error" id="Monograph_location_em_" style="display:none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textFieldGroup($model, 'agency_number'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ui-widget" >
                    <label class="control-label" for="Monograph_location">Location</label>
                    <select class="form-control" id="locationSelect" style="position: relative; vertical-align: top; background-color: transparent;">
                        <option value=""></option>
                        <?php
                        $locationsArray = $model->lookupDistinctListOptions('location');
                        $typesArray = $model->lookupDistinctField('document_type');

                        foreach ($locationsArray as $option) {
                            echo "\t\t<option>$option</option>\n";
                        }
                        ?>
                    </select>
                    <div class="help-block error" id="Monograph_location_em_" style="display:none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->textAreaGroup($model, 'notes'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-md-offset-1">
        <div class="row" id="fileUploader">
            <iframe id="hiddenDownloader" style="display:none;visibility: hidden"></iframe>
            <?php
            echo $form->labelEx($model, 'file_extension');
            echo '&nbsp;';

            $fileicon = 'flaticon-' . $model->file_extension;
            $this->widget('booster.widgets.TbButton', [
                'icon' => $fileicon,
                'size' => 'extra_small',
                'context' => 'link',
                'htmlOptions' => [
                    'onClick' => '$(\'#hiddenDownloader\')[0].src = "index.php?r=document/download&id=' . $model->id . '; return false;"',
                    #'href' => 'index.php?r=document/download&id=' . $model->id,
                    'target' => '_blank'],
            ]);
            echo 'Size: <span id="filesize">' . $model->fileSize . '</span>, Type: <span id="ext">' . strtoupper($model->file_extension) . '</span>';
            echo $form->fileField($model, 'temp_file');
            echo $form->error($model, 'temp_file');
            echo '<br/>';
            ?>
            <div class="row">
                <?php
                if ($model->file_extension === 'pdf') {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center"><?= $model->title . '.' . $model->file_extension ?></div>
                        <div class="panel-body " style="text-align: center; background-color: #000 ; padding:4px">
                            <iframe
                                src="/js/pdfjs/web/viewer.html?file=<?= urlencode($this->createAbsoluteUrl('download', ['id' => $model->id, 'embed' => true])); ?>#page-fit"
                                width="100%" height="450"
                                style="border:0px"
                                >
                            </iframe>
                        </div>
                        <div class="panel-footer" style="text-align: center">Size: <?= $model->fileSize ?>, Type: <?= strtoupper($model->file_extension) ?></div>
                    </div>
                    <?php
                } else {
                    $this->renderPartial('_filePreview', ['model' => $model]);
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $form->select2Group($model, 'authors', [
                    'widgetOptions' => [
                        'asDropDownList' => true,
                        'htmlOptions' => ['multiple' => 'multiple'],
                        'data' => CHtml::listData(Author::model()->findAll(['order' => 'title']), 'id', 'title')
                    ]
                ]);
                ?>            
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $form->select2Group($model, 'corporateAuthors', [
                    'widgetOptions' => [
                        'asDropDownList' => true,
                        'htmlOptions' => ['multiple' => 'multiple'],
                        'data' => CHtml::listData(CorporateAuthor::model()->findAll(['order' => 'title']), 'id', 'title')
                    ]
                ]);
                ?>            
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $form->select2Group($model, 'subjects', [
                    'widgetOptions' => [
                        'asDropDownList' => true,
                        'htmlOptions' => ['multiple' => 'multiple'],
                        'data' => CHtml::listData(Subject::model()->findAll(['order' => 'title']), 'id', 'title')
                    ]
                ]);
                ?>            
            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    $this->widget('booster.widgets.TbButton', [
        'buttonType' => 'link',
        'context' => 'default',
        'label' => 'Cancel',
        'url' => Yii::app()->request->urlReferrer,
    ]);
    ?>
</div>

<?php $this->endWidget(); ?>

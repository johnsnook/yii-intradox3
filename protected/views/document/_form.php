<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */
/* @var $authorsArray Array */
/* @var $topicsArray Array */
/* @var $typesArray Array */
$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'id' => 'document-form',
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
//    'clientOptions' => [
//        'validateOnSubmit' => true,
//        'validateOnChange' => true,
//        ]
        ]);

// Custom buttons
if ($model->isNewRecord) {
    $title = "Create new {$this->Project->title} {$this->id}";
} else {
    $title = "Edit " . ucwords(str_replace('_', ' ', $model->class_name)) . ": {$model->title}";
}

// we use class name since we're using inherited models
$modelName = get_class($model);
$className = $model->class_name;
$cs = Yii::app()->getClientScript();
$cs->registerPackage('jquery.ui');
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
    var className = '<?= $className ?>';
    var modelName = '<?= $modelName ?>';
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
        cbSelect = $('#authorSelect').combobox();
        $('input', cbSelect.parent())
                .attr({id: modelName + '_corporate_author', name: modelName + '[corporate_author]', placeholder: 'Author'})
                .val('<?= addslashes($model->corporate_author) ?>')
                .addClass('form-control');
        cbSelect = $('#topicSelect').combobox();
        $('input', cbSelect.parent())
                .attr({id: modelName + '_topic', name: modelName + '[topic]', placeholder: 'Topic'})
                .val('<?= addslashes($model->topic) ?>')
                .addClass('form-control');
        cbSelect = $('#typeSelect').combobox();
        doctypeInput = $('input', cbSelect.parent())
                .attr({id: modelName + '_type', name: modelName + '[type]', placeholder: 'Type'})
                .val('<?= addslashes($model->type) ?>')
                .addClass('form-control');
        if ($(doctypeInput).val() === '')
            $('input:first').focus();
        /* When the user selects a file for upload, validate the file size */
        $('input#' + modelName + '_temp_file').change(function () {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                file = $('input#<?= $modelName ?>_temp_file')[0].files[0];
                $('span#filesize').text(humanFileSize(file.size));
                $('span#ext').text(file.name.substring(file.name.lastIndexOf('.') + 1).toUpperCase());
                if (file.size > 80000000) {
                    alert('Intradox file sizes are limited to an 80MB maximum.');
                    $('input#<?= $modelName ?>_temp_file').val(null);
                }
            }
        });

        /*
         * setup the document type logic.  Once set to either 'article' or
         * 'correspondence' it can't be changed becuase the underlying object is
         * different
         **/
        $(doctypeInput).blur(function () {
            var sVal = $(doctypeInput).val();
            switch (sVal.toLowerCase()) {
                case 'correspondence':
                    changeClassName('document_correspondence');
                    break;
                case 'article':
                    changeClassName('document_article');
                    break;
                default:
                    if (modelName == "DocumentArticle" || modelName == "DocumentCorrespondence") {

                    }
                    $('#supplement').remove();

                    break;
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

    function loadSuppliment(class_name) {
        var sUrl = 'index.php?r=document/createSupplementaryForm&class_name=' + class_name;
        if (sUrl.length > 0) {
            $.ajax({
                url: sUrl,
                data: {id: <?= $model->id ? $model->id : 0 ?>},
                dataType: "html",
                success: function (result) {
                    $('#supplement').remove();
                    $('<div>')
                            .attr("id", "supplement")
                            .attr("class", "row")
                            .append($('<div>')
                                    .attr("class", "col-md-12")
                                    .append(result))
                            .insertAfter('#fileUploader');
                    $('#' + className + '_personal_authors').focus();
                    $('#' + className + '_recipient').focus();
                    //$('#correspondence').append(result).show();
                },
            });
        }
    }

    function changeClassName(newClassName) {
        if (newClassName == className)
            return;

        switch (newClassName) {
            case 'document_article':
                loadSuppliment(newClassName);
                newModelName = 'DocumentArticle';
                break;
            case 'document_correspondence':
                loadSuppliment(newClassName);
                newModelName = 'DocumentCorrespondence';
                break;
            case 'document':
            default:
                newModelName = 'Document';
                $('#supplement').remove();
                $('#model_name').val('Document');
        }
        $('#model_name').val(modelName);

        $("[id^='" + modelName + "']").each(function (a, b) {
            var n = $(b).attr('name');
            if (n)
                $(b).attr('name', n.replace(modelName, newModelName));
            var n = $(b).attr('id');
            $(b).attr('id', n.replace(modelName, newModelName));
        });

        modelName = newModelName;
        className = newClassName;
        $('#model_name').val(modelName);


    }
</script>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-file" data-toggle="tooltip" data-placement="right" data-original-title="Do I dare
                  Disturb the universe?
                  In a minute there is time
                  For decisions and revisions which a minute will reverse.
                  -T. S. Eliot"></span>&nbsp;<?= $title; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12" >
                <?php
                $this->widget('booster.widgets.TbButtonGroup', [
                    'buttonType' => 'link',
                    'size' => 'small',
                    'buttons' => $this->menu,
                ]);
                ?>
            </div>
        </div>
        <!--div class="info"><pre></pre></div-->
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo $form->textFieldGroup($model, 'title');
                    echo $form->hiddenField($model, 'project_id', ['value' => $this->Project->id]);
                    ?>
                    <input value="<?= $modelName ?>" name="ModelName" id="model_name"  type="hidden" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group ui-widget" >
                        <label class="control-label" for="Document_corporate_author">Corporate author</label>
                        <select class="form-control" id="authorSelect">
                            <option value=""></option>
                            <?php
                            foreach ($authorsArray as $option) {
                                echo "\t\t<option>$option</option>\n";
                            }
                            ?>
                        </select>
                        <div class="help-block error" id="Document_topic_em_" style="display:none"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group ui-widget" >
                        <label class="control-label" for="Document_topic">Topic</label>
                        <select class="form-control" id="topicSelect" style="position: relative; vertical-align: top; background-color: transparent;">
                            <option value=""></option>
                            <?php
                            foreach ($topicsArray as $option) {
                                echo "\t\t<option>$option</option>\n";
                            }
                            ?>
                        </select>
                        <div class="help-block error" id="Document_topic_em_" style="display:none"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-12">
                    <div class="form-group ui-widget" >
                        <label class="control-label" for="Document_type">Type</label>
                        <?php if ($modelName != 'DocumentArticle' && $modelName != 'DocumentCorrespondence'): ?>
                            <select class="form-control" id="typeSelect" style="position: relative; vertical-align: top; background-color: transparent;">
                                <option value=""></option>
                                <?php
                                foreach ($typesArray as $option) {
                                    echo "\t\t<option>$option</option>\n";
                                }
                                ?>
                            </select>
                            <div class="help-block error" id="Document_type_em_" style="display:none"></div>
                        <?php else: ?>
                            <div class="form-control"><?= $model->type ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            if ($this->userData->userlevel === ROLE_ADMIN) {
                ?>
                <div class="row">
                    <div  class="col-md-12">
                        <div class="form-group ui-widget" >
                            <label class="control-label" for="Document_restricted">Restricted:&nbsp;</label>
                            <?= $form->checkBox($model, 'restricted'); ?>
                            <div class="help-block error" id="Document_restricted_em_" style="display:none"></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            //if (!$model->isNewRecord) {
            //}
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->textFieldGroup($model, 'catalog_number'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->textFieldGroup($model, 'page_count'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?=
                    $form->numberFieldGroup($model, 'original_date_y', ['widgetOptions' => [
                            'htmlOptions' => [
                                'placeholder' => 'YYYY',
                                'maxLength' => 4,
                                'width' => '100px'
                            ]
                    ]]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?=
                    $form->numberFieldGroup($model, 'original_date_m', ['widgetOptions' => [
                            'htmlOptions' => [
                                'placeholder' => 'MM',
                                'maxLength' => 2,
                                'size' => 2
                            ]
                    ]]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?=
                    $form->numberFieldGroup($model, 'original_date_d', ['widgetOptions' => [
                            'htmlOptions' => [
                                'placeholder' => 'DD',
                                'maxLength' => 2,
                                'size' => 2,
                            ]
                    ]]);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->textFieldGroup($model, 'bates_start'); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->textFieldGroup($model, 'bates_end'); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="row" id="fileUploader">
                <iframe id="hiddenDownloader" style="display:none;visibility: hidden"></iframe>
                <?php
                echo $form->labelEx($model, 'file_extension');
                echo '&nbsp;';

                $fileicon = 'fa-2x flaticon-' . $model->file_extension;
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

            <?php
            switch ($modelName) {
                case 'DocumentArticle':
                    #$this->renderPartial('_articleForm', ['model' => $model]);
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'personal_authors'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'journal'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'volume'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'page_range'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'issue'); ?>
                        </div>
                    </div>
                    <?php
                    break;
                case 'DocumentCorrespondence':
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'personal_author'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->textFieldGroup($model, 'recipient'); ?>
                        </div>
                    </div>
                    <?php
                    break;
                default:
                //echo "modelName = $modelName";
            }
            ?>

        </div>

        <div class="col-md-10" style="clear:both;">
            <?= $form->textAreaGroup($model, 'notes', ['widgetOptions' => ['htmlOptions' => ['rows' => 6, 'cols' => 50, 'class' => 'col-md-6']]]); ?>
            <?php if (!$model->isNewRecord) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <label>Related Documents                         <div class="btn-group" data-toggle="buttons"><label class="btn btn-xs btn-default" id="btnToggle"><input type="checkbox" id="btnToggle"><span id="glyphToggle" class="glyphicon glyphicon-triangle-bottom"></span> Show all</label></div>
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
                                //throw new CDbException(json_encode($relatedDocs));
                                foreach ($docsArray as $doc) {
                                    $selected = (in_array($doc['id'], $relatedDocs) ? 'checked' : '');
                                    ?>
                                    <div class="checkbox">
                                        <label class="checkbox">
                                            <input type="checkbox" name="<?= $modelName ?>[documents][]" id="<?= $modelName ?>_documents"
                                                   value="<?= $doc['id'] ?>" <?= $selected ?>/><?= $doc['title'] ?>
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
            <div class="row" style="margin-top:30px">
                <div class="col-md-12">
                    <?php
                    $this->widget('booster.widgets.TbButtonGroup', [
                        'buttonType' => 'link',
                        'size' => 'small',
                        'buttons' => $this->menu,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>



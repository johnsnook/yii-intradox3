<?php
/* @var $this ProjectController */
/* @var $project CActiveRecord */
/* @var $srForm CFormModel */
?>

<style>
    .boy{
        padding-bottom: 7px;
    }
    #preview{
        margin-bottom: 17px;
    }
</style>
<?php
$title = "{$project->title} - search and replace";
$this->setPageTitle(Yii::app()->name . " - $title");

$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'method' => 'post',
    'action' => null,
///    'enableAjaxValidation' => 'false',
    'htmlOptions' => ['id' => 'srForm'],
        ]);
echo $form->hiddenField($srForm, 'project_id');
?>
<script type="text/javascript">
    var fields = {
        'title': 'Title',
        'corporate_author': 'Corporate Author',
        'topic': 'Topic',
        'type': 'Type',
    };

    function previewTable(data) {
        var find = $('#SearchAndReplaceForm_find').val();
        var replacement = '<span style="color:green">' + $('#SearchAndReplaceForm_replace').val() + '</span>';
        var field = $('#SearchAndReplaceForm_field').val();
        var sensitive = $("#SearchAndReplaceForm_caseSensitive").prop("checked");
        var fixed = "";
        $('#preview').empty();
        $('#preview').append('<div class="row"></div>').append('<div class="col-md-4"><h1>Title</h1></div><div class="col-md-4"><h1>' + fields[field] + '</h1></div><div class="col-md-4"><h1>Replaced</h1></div>');
        var regEx = new RegExp(find, "ig");

        $.each(data, function (i, obj) {
            var haystack = eval('obj.' + field) + '';

            if (sensitive) {
                fixed = haystack.replace(find, replacement);
            } else {
                fixed = haystack.replace(regEx, replacement);
            }
            if (typeof obj.title != 'undefined')
                $('#preview').append('<div class="row boy"></div>').append('<div class="col-md-4">' + obj.title + '</div><div class="col-md-4">' + haystack + '</div><div class="col-md-4">' + fixed + '</div>');

        });
    }

    function preview() {
        $.ajax({
            url: 'index.php?r=document/searchAndReplacePreview',
            data: $('#srForm').serialize(),
            dataType: "json",
            success: function (result) {
                $("#btnSubmit").removeAttr("disabled");
                previewTable(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
                alert(thrownError);
            }

        });
    }

    function Submit() {
        $("form#srForm").attr('action', "/index.php?r=project/searchAndReplace&id=<?= $srForm->project_id; ?>").submit();

    }

    $(document).ready(function () {
        $("#btnSubmit").attr("disabled", "disabled");

        $("body").on('change', '.form-control', function () {
            $("#btnSubmit").attr("disabled", "disabled");
            $('#preview').empty();
        });
        $("input").on('keypress', function () {
            $("#btnSubmit").attr("disabled", "disabled");
            $('#preview').empty();
        });

    });
</script>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-pawn"  data-toggle="tooltip" data-placement="right" data-original-title="'I said to my soul, be still and wait without hope, for hope would be hope for the wrong thing; wait without love, for love would be love of the wrong thing; there is yet faith, but the faith and the love are all in the waiting. Wait without thought, for you are not ready for thought: So the darkness shall be the light, and the stillness the dancing.' T.S. Eliot"></span>
            &nbsp; <?= $title; ?></h1>

    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-3">
                <?php
                $fields = [
                    'title' => 'Title',
                    'corporate_author' => 'Corporate Author',
                    'topic' => 'Topic',
                    'type' => 'Type',
                ];
                $options = [
                    'widgetOptions' => [
                        'data' => $fields,
                        'prompt' => 'Please select a field'
                    ],
                    'htmlOptions' => ['id' => 'cboFields'],
                    'options' => [
                        'empty' => 'Please select a field']
                ];
                echo $form->dropDownListGroup($srForm, 'field', $options);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->hiddenField($srForm, 'project_id'); ?>
                <?= $form->textFieldGroup($srForm, 'find'); ?>
            </div>
            <div class="col-md-4">
                <?= $form->checkBoxGroup($srForm, 'caseSensitive'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->textFieldGroup($srForm, 'replace'); ?>
            </div>
        </div>
        <div class="form-actions">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'icon' => 'fa fa-adjust',
                'label' => 'Preview',
                'url' => 'javascript:preview();',
                'htmlOptions' => [
                    'id' => 'btnPreview',
                    'href' => '#'
                ]
            ));
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'id' => 'btnCancel',
                'icon' => 'triangle-left',
                'url' => $_SERVER[HTTP_REFERER], #$this->createUrl('view', ['id' => $model->id]),
                'label' => 'Cancel',
            ));
            ?>
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <div class="row col-md-12" >
            <code id="json"></code>
            <div id="preview"></div>
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'id' => 'btnSubmit',
                'context' => 'success',
                'icon' => 'glyphicon glyphicon-floppy-disk',
                'url' => 'javascript:Submit();',
                'label' => 'Submit Change',
            ));
            ?>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>

<?php $this->endWidget(); ?>

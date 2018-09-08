<?php
/* @var $this CorrespondenceController */
/* @var $model DocumentCorrespondence */
/* @var $form TbActiveForm */
$form = $this->beginWidget('booster.widgets.TbActiveForm', [
    'id' => 'temp-form',
    'enableAjaxValidation' => true,
        ]);
$this->endWidget();
?>
<div class="row">
    <div class="col-md-12">
        <?php
        #echo json_encode($model->attributes, JSON_PRETTY_PRINT);
        makeForm($form, 'recipient', $model);
        makeForm($form, 'personal_author', $model);
        ?>
    </div>
</div>
<?php

function makeForm($form, $field, $model) {
    echo $form->textFieldGroup($model, $field);
}
?>
<script>
    jQuery('#document-form').yiiactiveform({
        'errorCssClass': 'has-error',
        'successCssClass': 'has-success',
        'inputContainer': 'div.form-group',
        'attributes': [{
                'id': 'DocumentCorrespondence_title',
                'inputID': 'DocumentCorrespondence_title',
                'errorID': 'DocumentCorrespondence_title_em_',
                'model': 'DocumentCorrespondence',
                'name': 'title',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_catalog_number',
                'inputID': 'DocumentCorrespondence_catalog_number',
                'errorID': 'DocumentCorrespondence_catalog_number_em_',
                'model': 'DocumentCorrespondence',
                'name': 'catalog_number',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_page_count',
                'inputID': 'DocumentCorrespondence_page_count',
                'errorID': 'DocumentCorrespondence_page_count_em_',
                'model': 'DocumentCorrespondence',
                'name': 'page_count',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_original_date',
                'inputID': 'DocumentCorrespondence_original_date',
                'errorID': 'DocumentCorrespondence_original_date_em_',
                'model': 'DocumentCorrespondence',
                'name': 'original_date',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_bates_start',
                'inputID': 'DocumentCorrespondence_bates_start',
                'errorID': 'DocumentCorrespondence_bates_start_em_',
                'model': 'DocumentCorrespondence',
                'name': 'bates_start',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_bates_end',
                'inputID': 'DocumentCorrespondence_bates_end',
                'errorID': 'DocumentCorrespondence_bates_end_em_',
                'model': 'DocumentCorrespondence',
                'name': 'bates_end',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_temp_file',
                'inputID': 'DocumentCorrespondence_temp_file',
                'errorID': 'DocumentCorrespondence_temp_file_em_',
                'model': 'DocumentCorrespondence',
                'name': 'temp_file',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_notes',
                'inputID': 'DocumentCorrespondence_notes',
                'errorID': 'DocumentCorrespondence_notes_em_',
                'model': 'DocumentCorrespondence',
                'name': 'notes',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_recipient',
                'inputID': 'DocumentCorrespondence_recipient',
                'errorID': 'DocumentCorrespondence_recipient_em_',
                'model': 'DocumentCorrespondence',
                'name': 'recipient',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentCorrespondence_personal_author',
                'inputID': 'DocumentCorrespondence_personal_author',
                'errorID': 'DocumentCorrespondence_personal_author_em_',
                'model': 'DocumentCorrespondence',
                'name': 'personal_author',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'summary': true
            }, {
                'summary': true
            }, {
                'summary': true
            }, {
                'summary': true
            }, {
                'summary': true
            }, {
                'summary': true
            }],
        'summaryID': 'document-form_es_',
        'errorCss': 'error'
    });

    $("#temp-form").remove();

</script>


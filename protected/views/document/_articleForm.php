<?php
/* @var $this DocumentController */
/* @var $model DocumentArticle */
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
        makeForm($form, 'personal_authors', $model);
        makeForm($form, 'journal', $model);
        makeForm($form, 'volume', $model);
        makeForm($form, 'page_range', $model);
        makeForm($form, 'issue', $model);
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
                'id': 'DocumentArticle_title',
                'inputID': 'DocumentArticle_title',
                'errorID': 'DocumentArticle_title_em_',
                'model': 'DocumentArticle',
                'name': 'title',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_catalog_number',
                'inputID': 'DocumentArticle_catalog_number',
                'errorID': 'DocumentArticle_catalog_number_em_',
                'model': 'DocumentArticle',
                'name': 'catalog_number',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_page_count',
                'inputID': 'DocumentArticle_page_count',
                'errorID': 'DocumentArticle_page_count_em_',
                'model': 'DocumentArticle',
                'name': 'page_count',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_original_date',
                'inputID': 'DocumentArticle_original_date',
                'errorID': 'DocumentArticle_original_date_em_',
                'model': 'DocumentArticle',
                'name': 'original_date',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_bates_start',
                'inputID': 'DocumentArticle_bates_start',
                'errorID': 'DocumentArticle_bates_start_em_',
                'model': 'DocumentArticle',
                'name': 'bates_start',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_bates_end',
                'inputID': 'DocumentArticle_bates_end',
                'errorID': 'DocumentArticle_bates_end_em_',
                'model': 'DocumentArticle',
                'name': 'bates_end',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_temp_file',
                'inputID': 'DocumentArticle_temp_file',
                'errorID': 'DocumentArticle_temp_file_em_',
                'model': 'DocumentArticle',
                'name': 'temp_file',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_notes',
                'inputID': 'DocumentArticle_notes',
                'errorID': 'DocumentArticle_notes_em_',
                'model': 'DocumentArticle',
                'name': 'notes',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'summary': true
            }, {
                'id': 'DocumentArticle_personal_authors',
                'inputID': 'DocumentArticle_personal_authors',
                'errorID': 'DocumentArticle_personal_authors_em_',
                'model': 'DocumentArticle',
                'name': 'personal_authors',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_journal',
                'inputID': 'DocumentArticle_journal',
                'errorID': 'DocumentArticle_journal_em_',
                'model': 'DocumentArticle',
                'name': 'journal',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_volume',
                'inputID': 'DocumentArticle_volume',
                'errorID': 'DocumentArticle_volume_em_',
                'model': 'DocumentArticle',
                'name': 'volume',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_page_range',
                'inputID': 'DocumentArticle_page_range',
                'errorID': 'DocumentArticle_page_range_em_',
                'model': 'DocumentArticle',
                'name': 'page_range',
                'enableAjaxValidation': true,
                'summary': true
            }, {
                'id': 'DocumentArticle_issue',
                'inputID': 'DocumentArticle_issue',
                'errorID': 'DocumentArticle_issue_em_',
                'model': 'DocumentArticle',
                'name': 'issue',
                'enableAjaxValidation': true,
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
<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl("{$this->module->id}/{$this->id}/getGridView"),
    'method' => 'get',
    'htmlOptions' => ['id' => 'searchForm']
        ));
$class = get_class($model);
?>

<div class="row">
    <div class="col-md-8">
        <label class="control-label required" for="query">Filter <?= $this->title ?>s by </label>
        <input class="form-control" placeholder="type any part of the name" name="query" id="query" type="text">
        <p class="help-block">Search fields: @title, @year, @call, @acc, @notes, @location, @text, @author, @corp and @subject</p>
    </div>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    /**
     * Handles submitting seach query to a controller and returning the result
     *
     */
    var ajaxUpdateTimeout;

    $().ready(function () {
        $('input#query').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13 || code == 46) {
                e.preventDefault();
                e.stopPropagation();
                search();
            }
        }).keyup(function (e) {
            clearTimeout(ajaxUpdateTimeout);
            ajaxUpdateTimeout = setTimeout(function () {
                search();
            }, 20);
        }).on('change', function () {
            search();
        }).focus();
    });
    oldQuery = $.cookie('query_intralib');
    if (oldQuery) {
        $('input#query').val(oldQuery);
        search();
    }
    function search() {
        query = $('input#query').val()
        $.cookie('query_intralib', query);

        $.get('index.php', $('#searchForm').serialize(),
                function (gridHtml) {
                    $('#<?= $this->id ?>-grid').html(gridHtml);
                });
    }
    function AddToQuery(title) {
        $('input#query').val($('input#query').val() + ' @subject "' + title + '"');
        search();
    }

</script>
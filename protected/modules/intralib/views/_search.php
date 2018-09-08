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
        <label class="control-label required" for="<?= $class ?>_search">Filter <?= $this->title ?>s by </label>
        <input class="form-control" placeholder="type any part of the name" name="<?= $class ?>[search]" id="<?= $class ?>_search" type="text">
    </div>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    /**
     * Handles submitting seach query to a controller and returning the result
     *
     */
    var ajaxUpdateTimeout;
    var className = '<?= $class ?>';
    $().ready(function () {
        $('input#' + className + '_search').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault();
                e.stopPropagation();
                search();
            }
        }).keyup(function () {
            clearTimeout(ajaxUpdateTimeout);
            ajaxUpdateTimeout = setTimeout(function () {
                search();
            }, 20);
        }).focus();
    });

    function search() {
        $.get('index.php', $('#searchForm').serialize(),
                function (gridHtml) {
                    $('#<?= $this->id ?>-grid').html(gridHtml);
                });
    }


</script>
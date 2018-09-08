<?php
/* @var $this SiteController */
/* @var $project CModel */
?>
<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <div id="search-form" class="form-group">
        <?php
        $this->renderPartial('index/_simpleSearch');
        ?>
    </div>
    <?php
    $this->renderPartial('index/_projectsGrid', ['gridSearchDP' => $project->search()])
    ?>
</div>
<script type="text/javascript">
    /**
     * This javascript code is located in site/_projectsGridTabPane.php
     *
     */
    var ajaxUpdateTimeout;

    $().ready(function () {

        $('#searchButton').click(function () {
            simpleSearch();
        });
        $('input#Project_search').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault();
                e.stopPropagation();
                simpleSearch();
            }
        }).keyup(function () {
            clearTimeout(ajaxUpdateTimeout);
            ajaxUpdateTimeout = setTimeout(function () {
                simpleSearch();
            }, 20);
        }).focus();

        $('#Project_archived, #Project_restricted').on('change', function () {
            simpleSearch();
        });

    });

    function simpleSearch() {
        $.get('index.php', $('#simpleSearchForm').serialize(),
                function (gridHtml) {
                    $('#project-grid').html(gridHtml);
                });
    }


</script>
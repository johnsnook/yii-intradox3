<?php
/* @var $model CActiveRecord */
/* @var $searchesDP CActiveDataProvider */
/* @var $authorsArray Array */
/* @var $topicsArray Array */
/* @var $typesArray Array */
?>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.loadJSON.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.cookie.js');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('document-grid', {
data: $(this).serialize()
});
return false;
});
");
?><style>
    .bootbox.modal  {
        z-index: 1200 !important;
    }

</style>
<script type="text/javascript">
    /**
     * This javascript code is located in _documentsGridTabPane.php
     *
     */
    var ajaxUpdateTimeout;
    var project_id = <?= $this->Project->id ?>;

    $().ready(function () {
        // we have to move our modal to the body or it won't work right
        $('body').append($('#bagge > #myModal'));
        $('#bagge').detach('#myModal');
        $('#searchButton').click(function () {
            simpleSearch();
        });

        $('input#query').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault();
                e.stopPropagation();
                //simpleSearch();
            }
        }).keyup(function () {
            clearTimeout(ajaxUpdateTimeout);
            ajaxUpdateTimeout = setTimeout(function () {
                simpleSearch();
            }, 300);
        }).focus();
        oldQuery = $.cookie('query_' + project_id);
        if (oldQuery) {
            $('input#query').val(oldQuery);
            simpleSearch();
        }
        $('form#frmAdvancedSearch input').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault();
                e.stopPropagation();
                buildAdvancedQuery();
            }
        });

        $('#toggleAdvanced').parent().click(toggleAdvanced);
        $('#aToggleAdvanced').click(toggleAdvanced);


        $('#toggleTips').parent().click(toggleTips);
        $('#aToggleTips').click(toggleTips);

        $('div#searchFields label input').change(function (item) {
            //  console.log($(item.target).parent().attr('id'));
        })
    });

    function toggleQuickView(id) {
        if ($('tr#quickView_' + id).length) {
            // close the old one and reset the button
            $('tr#quickView_' + id).remove();
            $('a#quickViewButton-' + id)
                    .find('i.glyphicon')
                    .removeClass('glyphicon-eye-close')
                    .addClass('glyphicon-eye-open');
        } else
        {
            $('a#quickViewButton-' + id)
                    .find('i.glyphicon')
                    .removeClass('glyphicon-eye-open')
                    .addClass('glyphicon-eye-close');
            $.get('index.php?r=document/quickView&id=' + id, function (response) {

                $('<tr>')
                        .attr('id', 'quickView_' + id)
                        .append(
                                $('<td>')
                                .attr('colspan', 6)
                                .html(response)
                                )
                        .hide()
                        .insertAfter('tr.id_' + id)
                        .show(800);

            });
        }
    }

    function simpleSearch() {
        var bates_search = $('input#bates_search').val();
        query = $('input#query').val()
        $.cookie('query_' + project_id, query);

        $.get('index.php?r=document/getGridView', {
            query: query,
            project_id: project_id,
            bates_search: bates_search == '' ? null : bates_search,
        }, function (gridHtml)
        {
            $('#document-grid').html(gridHtml);
            FreshenPies();
        });

    }

    // called by a button click in _searchForm.php
    function ExportXLSX() {
        query = $('input#query').val() + '';
        url = '<?= $this->createUrl('document/getExcel') ?>&query=' + query + '&project_id=' + project_id;
        $('#hiddenDownloader').attr('src', encodeURI(url));
    }


    function saveSearchModal() {
        $('#myModal').modal('show').css("z-index", "1200");
        $('#myModal').on('shown.bs.modal', function () {
            $('input#title').focus();
        });
    }

    function saveSearch() {
        bootbox.prompt("Give your search query a good name.", function (title) {
            if (title !== null) {
                $.get("index.php?", {
                    'r': 'documentSearch/ajaxCreate',
                    'title': title,
                    'project_id': <?= $this->Project->id ?>,
                    'query': $('input#query').val(),
                },
                        function (data) {
                            $(".result").html(data);
                            if (data.success)
                                $('#gridButt ul#yw1').append('<li><a tabindex="-1" href="javascript:loadSearch(' + data.id + ');">' + data.title + '</a></li>');
                            else
                                console.log(data);
                        });
                return false;
            }
        });


    }

    function loadSearch(search) {
        console.log(search);
        $('input#query').val(search.query);
        simpleSearch();
    }

    function buildAdvancedQuery() {
        query = '';
        $('form#frmAdvancedSearch input').each(function () {
            if ($(this).val().trim().length && $(this).attr('id') != 'bates_search')
                query += '@' + $(this).attr('id') + ' "' + $(this).val() + '" ';
        });
        $('input#query').val(query);
        //searchMenu('search');
        toggleAdvanced();
        simpleSearch();
    }

    function toggleAdvanced() {
        if ($('#search-tips:visible').length)
            toggleTips();

        $('#advancedSearch').fadeToggle(500, function () {
            if ($('#advancedSearch:visible').length) {
                $('#toggleAdvanced').removeClass('glyphicon-collapse-down').addClass('glyphicon-collapse-up');
            } else {
                $('#toggleAdvanced').removeClass('glyphicon-collapse-up').addClass('glyphicon-collapse-down');
            }

        });
    }
    function toggleTips() {
        if ($('#advancedSearch:visible').length)
            toggleAdvanced();

        $('#search-tips').fadeToggle(500, function () {
            if ($('#search-tips:visible').length) {
                $('#toggleTips').removeClass('glyphicon-question-sign').addClass('glyphicon-info-sign');
            } else {
                $('#toggleTips').removeClass('glyphicon-info-sign').addClass('glyphicon-question-sign');
            }

        });
    }
    function resetSearch() {
        $('input#query').val('');
        $('#bates_search').val('');
        simpleSearch();
    }

</script>
<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <div id="search-form" class="form-group" style="margin-bottom: 40px">
        <?php
        $this->renderPartial('index/_searchForm', array(
            'model' => $model,
            'searchesDP' => $searchesDP,
            'authorsArray' => $authorsArray,
            'topicsArray' => $topicsArray,
            'typesArray' => $typesArray,
        ));
        ?>
    </div>
    <?php
    $this->widget(
            'ext.yiibooster.widgets.TbTabs', array(
        'type' => 'pills', // 'tabs' or 'pills'
        'placement' => 'top',
        'tabs' => [
            [
                'label' => 'Table',
                'icon' => 'th-list',
                'id' => 'tableTab',
                'content' => $this->renderPartial('index/_docsGridView', ['docsGridDP' => $docsGridDP], true),
                'active' => true
            ],
            [
                'label' => 'Graphs',
                'id' => 'graphTab',
                'icon' => 'blackboard',
                'content' => $this->renderPartial('index/_docsPieView', ['model' => $model], true)
            ],
        ],
            )
    );
    ?>
    <iframe id="hiddenDownloader" style="display:none;visibility: hidden"></iframe>
</div>



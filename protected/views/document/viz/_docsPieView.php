<?php
/* @var $dataProvider CDataProvider example: '/index.php?document/timelineAjax' */
$format_func = <<<EOD
js:function (label, series) {
    return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white; background-color:black">' +
    label + ' : ' +
    Math.round(series.percent) +
    '%</div>';
}
EOD;
?>

<div id="_graphsTabPane" >
    <div class="panel-body">
        <div class="col-lg-6">
            <div class="panel panel-default panel-roundy ">
                <div class="panel-heading">Authors</div>
                <div class="panel-body" style="padding-bottom: 50px; alignment-baseline: central">
                    <div id="pie_corporate_author" style="text-align:center;width:100%;height:400px;border:5px solid black"></div>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default panel-roundy ">
                <div class="panel-heading">Topics</div>
                <div class="panel-body" style="padding-bottom: 50px">
                    <div id="pie_topic" style="text-align:center;width:100%;height:400px;border:5px solid black"></div>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="panel panel-default panel-roundy">
                <div class="panel-heading">Types</div>
                <div class="panel-body" style="padding-bottom: 50px;">
                    <div id="pie_type" style="text-align:center;width:100%;height:400px;border:5px solid black"></div>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default panel-roundy">
                <div class="panel-heading">File Types</div>
                <div class="panel-body" style="padding-bottom: 50px;text-align:center">
                    <div id="pie_file_extension" style="text-align:center;width:100%;height:400px;border:5px solid black"></div>
                </div>
                <div class="panel-footer"></div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    /**
     *
     * This javascript lives in views/document/index/_graphsTabPane.php
     */
    var pieJaxUrl = '<?= $this->createUrl('document/getPieData', ['project_id' => $this->Project->id]) ?>';
    var pieOptions = {
        series: {
            pie: {
                "show": true,
                "startAngle": "1",
                "stroke": {
                    "color": "#000",
                    "width": "5px"
                },
                "radius": 2000,
                "combine": {
                    "color": "#999",
                    "threshold": 0.015
                },
                "label": {
                    "show": true,
                    "radius": 0.8,
                    "formatter": labelFormatter,
                    "threshold": "0.02",
                    "background": {
                        "color": "#000000",
                        "opacity": 0.9
                    },
                    "color": "black"
                }
            },
        },
        legend: {show: false},
        grid: {
            hoverable: true,
            clickable: true
        }
    };
    var Pies = [{
            id: 'corporate_author',
            first: true,
            sphinxAlias: 'author',
            data: <?= json_encode($model->pieData('corporate_author', $this->Project->id)); ?>
        }, {
            id: 'topic',
            first: true,
            sphinxAlias: 'topic',
            data: <?= json_encode($model->pieData('topic', $this->Project->id)); ?>
        }, {
            id: 'type',
            first: true,
            sphinxAlias: 'type',
            data: <?= json_encode($model->pieData('type', $this->Project->id)); ?>
        }, {
            id: 'file_extension',
            first: true,
            sphinxAlias: 'ext',
            data: <?= json_encode($model->pieData('file_extension', $this->Project->id)); ?>
        }];
    /**
     * The main and only onload our graphs will ever need
     */
    $(document).ready(function () {
        $('a[href="#graphTab"]').click(function () {
            // wait a bit to make sure the places we're drawing are at their full width
            //setTimeout(function () {
            BakePies();
            //}, 250);
        });
        //$(projects_pie).load('/index.php?r=project/getPie');
        $(window).resize(function () {
            $('.pieChartDiv').each(function (index, value) {
                query = $('input#query').val();
                $(value).load('/index.php?r=document/getPie&fieldName=' + $(value).attr('id') + '&project_id=<?= $this->Project->id ?>&query=' + query);
            });
//            $(projects_pie).load('/index.php?r=project/getPie');
        });
    });
    /**
     * Loop through pie array and bake each one
     *
     * @returns null
     */
    function BakePies() {
        $(Pies).each(function (index, value) {
            BakePie(value);
        });
    }

    /**
     * plot an individual pie chart using a element from the pie array
     *
     * @param object pie
     * @returns null
     */
    function BakePie(pie) {
        //pieOptions.label.formatter = labelFormatter;
        pieDivName = '#pie_' + pie.id;
        $.plot(pieDivName, pie.data, pieOptions);
        if (pie.first) {
            $(pieDivName).bind("plothover", function (event, pos, obj) {
                if (!obj) {
                    return;
                }
                var percent = parseFloat(obj.series.percent).toFixed(2);
                $("#hover").html("<span style='font-weight:bold; color:" + obj.series.color + "'>" + obj.series.label + " (" + percent + "%)</span>");
            });
            //debugger;
            $(pieDivName).bind("plotclick", function (event, pos, obj) {
                if (!obj) {
                    return;
                }
                if (obj.series.label !== 'Other') {
                    //debugger
                    $(Pies).each(function (i, pie) {
                        if (pie.id === event.currentTarget.id.substring(4))
                            $('input#query').val(' @' + pie.sphinxAlias + ' "' + obj.series.label + '"');
                    });
                    simpleSearch();
                }
            });
        }
        pie.first = false;
    }

    function FreshenPies() {
        $(Pies).each(function (index, pie) {
            query = $('input#query').val();
            pieDivName = '#pie_' + pie.id;
            //$(pieDivName).html('<img src="/images/galaga.gif" height="100%" width="100%" alt="butts"/>');
            $.getJSON(pieJaxUrl + '&fieldName=' + $(pie).attr('id') + '&query=' + query, function (data) {
                Pies[index].data = data;
                if ($('#graphTab').hasClass('active'))
                    BakePie(Pies[index]);
            });
        });
    }

    function labelFormatter(label, series) {
        return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white; background-color:black">' +
          label + ' : ' +
          Math.round(series.percent) +
          '%</div>';
    }

</script>
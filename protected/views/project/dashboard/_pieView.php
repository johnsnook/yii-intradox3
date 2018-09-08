<script type="text/javascript">
    var pieOptions = <?= json_encode($pieOptions, 128) ?>;
    var pieData = <?= json_encode($pieData) ?>;

    pieOptions.label.formatter = labelFormatter;
    $.plot('#pieView', pieData, {
        series: {
            pie: pieOptions,
        },
        legend: {show: false},
        grid: {
            hoverable: false,
            clickable: true
        }
    });

    $('#pieView').bind("plothover", function (event, pos, obj) {
        if (!obj) {
            return;
        }
        var percent = parseFloat(obj.series.percent).toFixed(2);
        $("#hover").html("<span style='font-weight:bold; color:" + obj.series.color + "'>" + obj.series.label + " (" + percent + "%)</span>");
    });

    $('#pieView').bind("plotclick", function (event, pos, obj) {
        if (!obj) {
            return;
        }
        if (obj.series.label !== 'Other') {
            url = '<?= $this->createUrl('document/index') ?>&project_id=';
            url += $.grep(pieData, function (e) {
                return e.label == obj.series.label;
            })[0].id;
        } else {
            url = '<?= $this->createUrl('project/index') ?>';
        }

        window.location.href = url;
    });

</script>
<div id="pieView" style="text-align:center;width:100%;height:400px;border:5px solid black"></div>


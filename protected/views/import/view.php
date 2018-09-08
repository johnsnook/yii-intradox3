<?php ?>
<style>
    .stripey{
        border-bottom: 2px solid;
    }
</style>
<script language="javascript" type="text/javascript">
    var data = <?= $json ?>;
    var colDef;
    $(document).ready(function () {
        $("#btnQuery").click(function () {
            var q = $("textarea#query").val();
            window.location = '<?= $this->createUrl('queryArtemis') ?>&query=' + q;
        });
        if (data) {
            $.each(data, function (index, record) {
                //var first = true;
                var row = $('<div class="row stripey" />');
                $('#table').append(row);

                if (index == 0) {
                    var colCnt = Object.keys(record).length;
                    colWidth = Math.floor(12 / colCnt);
                    if (colWidth == 0)
                        colWidth = 1;
                    colDef = '<div class="col-sm-' + colWidth + '"/>';
                    Object.keys(record).forEach(function (key, index) {
                        var col = $(colDef);
                        row.append(col);
                        col.html('<b>' + key + '</b>')
                    });
                    first = false;
                    row = $('<div class="row  stripey" />');
                    $('#table').append(row);
                }
                for (var property in record) {
                    if (record.hasOwnProperty(property)) {
                        var col = $(colDef);
                        row.append(col);
                        col.html(record[property])
                    }
                }



            })
        }


    })
</script>
<div class="panel panel-roundy">
    <div class="panel-heading"><h2>Intradox 2 Sql back door</h2></div>
    <div class="panel-body">
        <textarea id='query' rows="12" cols="80"><?= $query ?></textarea>
        <button id="btnQuery">Query</button>
        <div id='table'></div>
        <pre><code>
                <?php //echo json_encode(json_decode($json), JSON_PRETTY_PRINT)  ?>
        </code></pre>
    </div>
</div>
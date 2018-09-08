
<script language="javascript" type="text/javascript">
    $().ready(function () {
        // we have to move our modal to the body or it won't work right

        $('input#txtFilter').on("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault();
                e.stopPropagation();
                //simpleSearch();
            }
        }).keyup(function () {
            if ($('input#txtFilter').val().trim() == '') {
                $("#main div.panel").show();
            } else {
                $("#main div.panel").each(function (index, value) {
                    var id = value.getAttribute("id");
                    var filter = $('input#txtFilter').val().trim();
                    if (id.includes(filter)) {
                        $(value).show()
                    } else
                    {
                        $(value).hide()
                    }
                })
            }
        }).focus();
    });
</script>
<style>
    .dbPK{
        font-weight: bolder;

    }
    .dbFK{
        font-style: italic;

    }
</style>
<?php
$psql = new CPgsqlSchema(Yii::app()->db);
$tables = $psql->getTables('public');
?>

<div  class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="fa fa-ticket" data-toggle="tooltip" data-placement="right" data-original-title="Phlebas the Phoenician, a fortnight dead,
                  Forgot the cry of gulls, and the deep sea swell
                  And the profit and loss.
                  -T. S. Eliot"></span> Schema tool </h1>
        <input id="txtFilter" type="text" maxlength="50" />

    </div>
    <div id="main" class="panel-body">

        <?php
        foreach ($tables as $table) {
            ?>
            <div id="<?= $table->name; ?>" class="panel panel-info col-sm-6" style="">
                <div class="panel-heading">
                    <?= $table->name; ?>
                </div>
                <div class="panel-body">

                    <?php
                    foreach ($table->columns as $column) {
                        $isPK = ($column->isPrimaryKey ? 'dbPK' : '');
                        $isFK = ($column->isForeignKey ? 'dbFK' : '');
                        ?>
                        <div class="row col-sm-7 dbtable-column <?= $isPK; ?> <?= $isFK; ?>">
                            <?= $column->name; ?>
                        </div>
                        <div class="row col-sm-5 dbtable-type <?= $isPK; ?>">
                            <?= $column->type; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
        <?php ?>
    </div>
    <div class="panel-footer" ><pre>
            <?php
            //echo json_encode($tables, JSON_PRETTY_PRINT);
            ?>
        </pre></div>
</div>



<?php ?>

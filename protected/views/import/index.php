<?php
/* @var $this ImportController */
/* @var $docsJson string */
/* @var $docs Array */
/* @var $project CActiveRecord */
?>
<?php
$this->setPageTitle(Yii::app()->name . " - {$project->title} Legacy Import");
?>
<script language="javascript" type="text/javascript">
    var docs = <?= $docsJson; ?>;
    var docs2 = <?= $docsJson; ?>;
    var docChain = $.Deferred(); // Create the root of the main document chain.
    var docPromise; // Placeholder for the document promise
    var relationChain = $.Deferred(); // Create the root of the document_document chain.
    var relationPromise; // Placeholder for the document_document promise

    $(function () {
        docChain.resolveWith(docs); // Execute the first chain
    });
     
    // Build the chains
    for (var i = 0; i < docs.length; i++) {
        if (i == 0) {
            docPromise = docChain;
            relationPromise = relationChain;
        }

        // Pipe the response to the "next" document import ajax function
        docPromise = docPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 
            var root = "";
            if (response) {
                id = $(response, '#response_id').html();
                $('#doc_' + id).html($($(response, 'div')[1]).html());
                $('#doc_' + id).parent().addClass('panel-success');
                try {
                    if ($('#doc_' + id).length) {
                        $('html, body').animate({
                            scrollTop: $('#doc_' + id).parent().offset().top - 200
                        }, 0);
                    }
                } catch (e) {
                    console.log("Error Message: " + e.message);
                } 
            }

            // MUST call return here.
            return $.ajax({
                type: "GET",
                url: "index.php?r=import/legacyDocument&legacy_document_id=" + doc.id,
                context: this      
            });
        });
        // Pipe the response to the "next" document import ajax function
        relationPromise = relationPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 
            var root = "";
            if (response) {
                id = $(response, '#response_id').html();
                $('#doc_' + id).append($($(response, 'div')[1]).html());
                try {
                    if ($('#doc_' + id).length) {
                        $('html, body').animate({
                            scrollTop: $('#doc_' + id).parent().offset().top - 200
                        }, 0);
                    }
                } catch (e) {
                    console.log("Error Message: " + e.message);
                }

            }

// MUST call return here.
            return $.ajax({
                type: "GET",
                url: "index.php?r=import/legacyDocumentRelation&legacy_document_id=" + doc.id,
                context: this      
            });
        });
    }
     
    docPromise.done(function (response) {
        if (response) {
            id = $(response, '#response_id').html();
            $('#doc_' + id).html($($(response, 'div')[1]).html());
            $('#doc_' + id).parent().addClass('panel-success');
        }
        //alert('Now we import the relationships');
        relationChain.resolveWith(docs2); // Execute the second chain

    });
    relationPromise.done(function (response) {
        if (response) {
            id = $(response, '#response_id').html();
            $('#doc_' + id).append($($(response, 'div')[1]).html());
        }
        finallyDone();
    });
    function finallyDone() {

        $.get("index.php", {
            r: "import/legacyImportComplete",
            legacy_project_id: <?= $project->legacy_id ?>,
        }, function (response) {
            alert('project.imported = ' + $.parseJSON(response).success);
        });
    }
</script>
<div class="row">
    <div class = "col-md-6" > <h1 > Project: <?= $project->title; ?> </h1>
        <?php
        $labels = $project->attributeLabels();

        if (!empty($project->jobnumber))
            echo '<p><b>' . $labels['jobnumber'] . ':</b> ' . $project->jobnumber . '</p>';

        echo "<p><b>Created:</b> $project->created_info</p>";

        $mo = $project->modified_info;
        if ($mo)
            echo "<p><b>Modified:</b> $project->modified_info</p>";

        $dc = $project->document_count;
        if ($dc > 0)
            echo '<p><b>' . $labels['document_count'] . ':</b> ' . $dc . '</p>';
        ?>
    </div>
    <div class = "col-md-6" >
        <?php
        $this->widget('booster.widgets.TbMenu', array(
            'type' => 'pills',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => $this->menu,
        ));
        ?>
    </div>
</div>

<div class = "row" >
    <div class = "col-md-12" >
        <?php
        foreach ($docs as $doc) {
            ?>
            <div class = "panel" > <div class = "panel-heading" ><?= $doc['title'] ?> </div>
                <div class = "panel-body" id = "doc_<?= $doc['id'] ?>" > </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>



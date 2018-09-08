<?php
/* @var $this ImportController */
/* @var $docsJson string */
?>
<?php
$this->setPageTitle(Yii::app()->name . " - IntraLib Legacy Import");
?>
<script language="javascript" type="text/javascript">
    var docs = <?= $docsJson; ?>;
    // I have to convert to and from json string to make deep clones of the 
    // objects in the array.  
    var docs1 = JSON.parse(JSON.stringify(docs));
    var docs2 = JSON.parse(JSON.stringify(docs));
    var docs3 = JSON.parse(JSON.stringify(docs));
    var docs4 = JSON.parse(JSON.stringify(docs));

    var docChain = $.Deferred(); // Create the root of the main document chain.
    var docPromise; // Placeholder for the document promise
    var authorRelationChain = $.Deferred(); // Create the root of the chain.
    var authorRelationPromise; // Placeholder for the promise
    var corpAuthorRelationChain = $.Deferred(); // Create the root of the chain.
    var corpAuthorRelationPromise; // Placeholder for the promise
    var subjectRelationChain = $.Deferred(); // Create the root of the chain.
    var subjectRelationPromise; // Placeholder for the promise

    $(function () {
        docChain.resolveWith(docs1); // Execute the first chain
    });

    // Build the chains
    for (var i = 0; i < docs.length; i++) {
        if (i == 0) {
            docPromise = docChain;
            authorRelationPromise = authorRelationChain;
            corpAuthorRelationPromise = corpAuthorRelationChain;
            subjectRelationPromise = subjectRelationChain;
        }

        // Pipe the response to the "next" document import ajax function
        docPromise = docPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 

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
            return $.ajax
                    ({
                        type: "GET",
                        url: "index.php?r=intralib/import/legacyMonograph&legacy_document_id=" + doc.id,
                        context: this      
                    });
        });

        // Pipe the response to the "next" document import ajax function
        authorRelationPromise = authorRelationPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 
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

            return $.ajax // MUST call return here.
                    ({
                        type: "GET",
                        url: "index.php?r=intralib/import/legacyAuthorRelations&legacy_document_id=" + doc.id,
                        context: this      
                    });
        });
        corpAuthorRelationPromise = corpAuthorRelationPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 
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

            return $.ajax // MUST call return here.
                    ({
                        type: "GET",
                        url: "index.php?r=intralib/import/legacyCorpAuthorRelations&legacy_document_id=" + doc.id,
                        context: this      
                    });
        });
        subjectRelationPromise = subjectRelationPromise.pipe(function (response) {
            var doc = this.shift(); // Get the current part 
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

            return $.ajax // MUST call return here.
                    ({
                        type: "GET",
                        url: "index.php?r=intralib/import/legacySubjectRelations&legacy_document_id=" + doc.id,
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
        authorRelationChain.resolveWith(docs2); // Execute the second chain

    });
    authorRelationPromise.done(function (response) {
        if (response) {
            id = $(response, '#response_id').html();
            $('#doc_' + id).append($($(response, 'div')[1]).html());
        }
        corpAuthorRelationChain.resolveWith(docs3); // Execute the second chain
    });
    corpAuthorRelationPromise.done(function (response) {
        if (response) {
            id = $(response, '#response_id').html();
            $('#doc_' + id).append($($(response, 'div')[1]).html());
        }
        subjectRelationChain.resolveWith(docs4); // Execute the second chain
    });
    subjectRelationPromise.done(function (response) {
        if (response) {
            id = $(response, '#response_id').html();
            $('#doc_' + id).append($($(response, 'div')[1]).html());
        }

        alert('we should be done');
    });
</script>
<div class="row">
    <div class = "col-md-6" > <h1 > Project: <?= $this->module->id; ?> </h1>
        <?php
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
        $docsArr = CJSON::decode($docsJson);

        foreach ($docsArr as $doc) {
            ?>
            <div class = "panel" > <div class = "panel-heading" ><?= $doc['title'] ?> </div>
                <div class = "panel-body" id = "doc_<?= $doc['id'] ?>" > </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<div class = "row" > <div class = "col-md-6" > </div>
</div><!--  Cool background thing -->
<style>
<?php
if (isset($this->background)) {
    ?>
        body
        {
            background - image: url(<?= $this->background ?>);
        }
    <?php
}
?> </style>


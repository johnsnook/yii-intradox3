<?php
$d = new DateTime($data->start_date);
$when = $d->format('Y-m-d');
$when = $d->format("F jS, Y");
?>
<span class="tick tick-before"></span>
<dt class="timeline-event" id="<?= $data->id; ?>"><a><?= $when . ' - ' . $data->title; ?></a></dt>
<span class="tick tick-after"></span>
<dd class="timeline-event-content" id="<?= $data->id; ?>EX">
    <div class="col-md-6">
        <?php
        echo CHtml::link('Edit', array('update', 'id' => $data->id)) . '<br/>';
        echo '<b>';

        if (!is_null($data->end_date)) {
            $d = new DateTime($data->end_date);
            $when = $d->format('Y-m-d');
            echo ' - ' . CHtml::encode($when);
        }
        echo "</b><br/>\n";
        if ($data->description) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('description')) . '</b>: ';
            echo CHtml::encode($data->description);
            echo "<br/>\n";
        }
        if ($data->type) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('type')) . '</b>: ';
            echo CHtml::encode($data->type);
            echo "<br/>\n";
        }

        if ($data->contaminant) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('contaminant')) . '</b>: ';
            echo CHtml::encode($data->contaminant);
            echo "<br/>\n";
        }

        if ($data->location) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('location')) . '</b>: ';
            echo CHtml::encode($data->location);
            echo "<br/>\n";
        }

        if ($data->company) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('company')) . '</b>: ';
            echo CHtml::encode($data->company);
            echo "<br/>\n";
        }

        if ($data->facility) {
            echo '<b>' . CHtml::encode($data->getAttributeLabel('facility')) . '/<b>: ';
            echo CHtml::encode($data->facility);
            echo "<br/>\n";
        }
        ?>
    </div>
    <div class="col-md-6">
        <h4>Related Documents</h4><br class="clear"/>
        <div>
            <?php
            $relatedDocs = $data->getRelatedDocumentStubs();
            foreach ($relatedDocs as $doc) {
                if ($doc['id'] !== $model->id) {// we don't need to add this document
                    echo CHtml::link($doc['title'], $this->createUrl('document/view', ['id' => $doc['id']])) . '<br/>';
                }
            }
            ?>
        </div>
    </div><!-- /.media -->

    <br class="clear">
</dd><!-- /.timeline-event-content -->



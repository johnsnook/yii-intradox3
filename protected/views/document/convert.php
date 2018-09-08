<?php
#$this->layout = 'column1';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo "<h1>Converting correspondence documents</h1>";
                $docs = Document::model()->findAllBySql("select * from only document where project_id = :pid and type ilike 'correspondence' and class_name = 'document'", ['pid' => $project_id]);
                foreach ($docs as $doc) {
                    $sql = "select id from public.intradox_document_to_correspondence(:id)";
                    $r = Yii::app()->db->createCommand($sql)->bindValue('id', $doc->id)->queryRow();
                    echo "<div class=\"success\">$doc->title converted</div>";
                    #echo CHtml::link('Convert to Correspondence Document', array('document/d2c', 'id' => $project_id), array('class' => 'btn btn-success'));

                    ob_flush();
                }
                echo "<h1>Converting article documents</h1>";

                $docs = Document::model()->findAllBySql("select * from only document where project_id = :pid and type ilike 'article%' and class_name = 'document'", ['pid' => $project_id]);

                foreach ($docs as $doc) {
                    $sql = "select id from public.intradox_document_to_article(:id)";
                    $r = Yii::app()->db->createCommand($sql)->bindValue('id', $doc->id)->queryRow();
                    echo "<div class=\"success\">$doc->title converted</div>";
                    ob_flush();
                }

                echo "<h1>complete</h1>";
                ?>
            </div>
        </div>
    </div>
</div>

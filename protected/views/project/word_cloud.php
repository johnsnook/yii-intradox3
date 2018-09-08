<?php
Yii::app()->clientScript->registerScriptFile('/js/d3/d3.min.js');
Yii::app()->clientScript->registerScriptFile('/js/d3/d3.layout.cloud.js');
Yii::app()->clientScript->registerScriptFile('/js/d3/d3.wordcloud.js');
?>
<script lang="javascript">
    var data = <?= json_encode($data) ?>;
    var d3wc;
    $(document).ready(function () {
        d3wc = d3.wordcloud()
        d3wc.size([$("#wordcloud").parent().width(), 600]);
        d3wc.selector('#wordcloud');
        d3wc.words(data); //[{text: 'word', size: 5}, {text: 'cloud', size: 15}]
        d3wc.start();

//        $(window).resize(function () {
//            var w = $("#wordcloud").parent().width();
//            $('svg').width(w)
//            $('svg').height(w / 2)
//            //var w = $("#wordcloud").parent().width();
//            d3wc.size([w, w / 2])
//        })

    });

</script>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <div style="float:right; margin-top: 15px"><?php
            $this->widget('booster.widgets.TbButton', [
                'buttonType' => 'link',
                'label' => $ignoreStopWords ? 'Include stop words' : 'Ignore stop words',
                'context' => 'info',
                'url' => $this->createUrl('wordCloud', ['id' => $model->id, 'ignoreStopWords' => !$ignoreStopWords])
            ]);
            ?>
        </div>
        <h3><span class="fa fa-cloud" data-toggle="tooltip" data-placement="right" data-original-title="Do I dare
                  Disturb the universe?
                  In a minute there is time
                  For decisions and revisions which a minute will reverse.
                  -T. S. Eliot"></span>&nbsp;<?= $model->title; ?> word cloud</h3>
    </div>
    <div class="panel-body" style="text-align:center;overflow: hidden">
        <div id='wordcloud' style="margin:auto"></div>
    </div>
</div>

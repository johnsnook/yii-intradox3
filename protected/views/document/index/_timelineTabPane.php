<?php
/** @var $dataProvider CDataProvider example: '/index.php?document/timelineAjax' */
echo CHtml::button('Refresh', ['onclick' => 'refreshTimeline();']);
?>
<script type="text/javascript">
    function refreshTimeline() {
        $('#_timelineTabPane').load('<?= $this->createUrl('timelineAjax', ['year' => null, 'month' => null, 'group' => null]) ?>', loadMonths);
    }
</script>
<div id="_timelineTabPane" class="panel panel-default" style="border-top: 0px; padding: 20px">
    <?php
    $this->widget('ext.timeline.timeline', [
        'years' => $years,
        'ajaxURL' => $this->createUrl('document/timelineAjax'),
        'titleField' => 'title',
        'dateField' => 'original_date',
        'groupField' => 'type'
    ]);
    ?>
</div>

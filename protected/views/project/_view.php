<div class="row">
    <div class="col-md-9"><?= CHtml::link(CHtml::encode($data->title), array('document/index', 'project_id' => $data->id)); ?><b>&nbsp;(<?= $data->document_count; ?>)</b></div>
</div>
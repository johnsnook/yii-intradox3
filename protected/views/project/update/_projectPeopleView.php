<div id="person" class="list-info" data-id="<?=$data->id; ?>">
    <?= CHtml::link(CHtml::encode($data->title), array('person/view', 'id' => $data->id)); ?> - <?=$data->userlevel; ?> - 
    <i onclick="removePersonFromProject(<?=$data->id; ?>)" class="glyphicon glyphicon-minus-sign" data-toggle="tooltip" data-placement="top" data-original-title="Remove this person from this project"></i>
</div>
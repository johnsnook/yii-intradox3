<div id="person" class="col-md-3" data-id="<?=$data->id;?>" data-userlevel="<?=$data->userlevel?>">
    <?= CHtml::link(CHtml::encode($data->title), array('person/view', 'id' => $data->id)); ?> 
    <i id="addButton" onclick="addPersonToProject(<?=$data->id; ?>,'<?=$data->title; ?>')" class="glyphicon glyphicon-plus-sign" data-toggle="tooltip" data-placement="top" data-original-title="Add this person to this project"></i>
    <i id="removeButton" onclick="removePersonFromProject(<?=$data->id; ?>)" class="glyphicon glyphicon-minus-sign" data-toggle="tooltip" data-placement="top" data-original-title="Remove this person from this project"></i>
</div>

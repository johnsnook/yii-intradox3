<?php
/* @var $this DocumentController */

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->id . '/getGridView'),
    'method' => 'get',
    'htmlOptions' => ['id' => 'simpleSearchForm']
        ));
?>

<div class="row">
    <div class="col-md-8">
        <label class="control-label required" for="Project_search">Filter projects by </label>
        <input class="form-control" placeholder="type any part of the project name" name="Project[search]" id="Project_search" type="text">
    </div>
    <?php if ($this->userData->userlevel == ROLE_ADMIN): ?>
        <div class="col-md-4"><br/>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" for="Project_archived"><input name="Project[archived]" id="Project_archived" value="1" type="checkbox" class="form-control" autocomplete="off"> Archived</label>
                <label class="btn btn-default" for="Project_restricted"><input name="Project[restricted]" id="Project_restricted" value="1" type="checkbox" class="form-control" autocomplete="off"> Restricted</label>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $this->endWidget(); ?>

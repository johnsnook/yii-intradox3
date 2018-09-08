<?php
$this->layout = '//layouts/column1';
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = [
    ['label' => 'Browse saved searches', 'url' => array('index')],
];
if ($this->userData->userlevel === ROLE_ADMIN) {
    $this->menu[] = ['label' => 'Edit ' . $model->title, 'url' => array('update', 'id' => $model->id)];
}

if ($this->userData->userlevel == ROLE_ADMIN) {
    $this->menu[] = ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",];
}
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-user"></span>&nbsp;Viewing <?= ucfirst($this->id) . ': ' . $model->title; ?> </h2>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', array(
            'size' => 'small',
            'buttonType' => 'link',
            'buttons' => $this->menu,
        ));
        ?>
        <?php
        $this->widget('booster.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'title',
                'query',
                'project_id',
            ),
        ));
        ?>

    </div>
    <div class="panel-footer">

    </div>

</div>



<?php
$this->breadcrumbs = array(
    'Posts' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Pod', 'url' => array('index')),
    array('label' => 'Create Pod', 'url' => array('create')),
    array('label' => 'Update Pod', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Pod', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Pod', 'url' => array('admin')),
);
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);
?>

<h1>View Pod #<?= $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'super_id',
        'notes',
        'person_id',
        'when',
    ),
));
?>

<?php
$this->breadcrumbs = array(
    'Pods',
);

$this->menu = array(
    array('label' => 'Create Pod', 'url' => array('create')),
    array('label' => 'Manage Pod', 'url' => array('admin')),
);
?>

<h1>Posts</h1>

<?php
$this->widget('booster.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>

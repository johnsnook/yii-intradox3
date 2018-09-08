<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' Administration';
$this->menu = array(
    array('label' => 'Manage People', 'url' => array('person/admin')),
    array('label' => 'Manage Projects', 'url' => array('project/admin')),
    array('label' => 'Manage Documents', 'url' => array('document/admin')),
    array('label' => 'Manage Logs', 'url' => array('activeRecordLog/admin')),
    array('label' => 'Manage Super Records', 'url' => array('super/admin')),
);
?>

<h1>Welcome to <i><?= CHtml::encode(Yii::app()->name); ?></i></h1>

<p>This is the admin page.  Please use the contact form to enquire about our premium project document management services.  </p>



<?php

/* @var $this DocumentController */
/* @var $docsGridDP CActiveDataProvider */
$filename = 'id3-' . SnookTools::sanitize($this->Project->title) . '.xls';
#/*
$this->widget('EExcelWriter', array(
    'dataProvider' => $docsGridDP,
    'title' => (string) $this->Project->title,
    'stream' => TRUE,
    'fileName' => $filename,
    'columns' => array(
        'id',
        'title',
        'original_date',
        'corporate_author',
        'topic',
        'type',
        'catalog_number',
        'file_extension',
        'bates_start',
        'bates_end',
        'notes'
    ),
));


Yii::app()->end();
?>


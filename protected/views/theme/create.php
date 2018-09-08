<?php

$this->menu = array(
    array('label' => "All {$this->id}s", 'url' => array('index')),
);
echo $this->renderPartial('_form', array('model' => $model));
?>
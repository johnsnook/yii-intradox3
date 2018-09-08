<?php

$this->menu = array(
    array('label' => 'Cancel edit', 'icon' => 'user', 'url' => array('view', 'id' => $model->id)),
);
?>
<?php

echo $this->renderPartial('_form', array(
    'model' => $model,
));
?>
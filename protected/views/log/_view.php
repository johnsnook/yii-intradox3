<?php
$who = Person::model()->findByPk($data->person_id);
$what = Super::findChildByPk($data->super_id);
$d = new DateTime($data->log_time);
$when = $d->format('M jS, Y h:i');
?>

<div class="row">
    <div id="who" class="col-md-2"><?= CHtml::link($who->title, array('person/view', 'id' => $data->person_id)) ?></div>
    <div id="action" class="col-md-1"><?= $data->action ?></div>
    <div id="what" class="col-md-4">
        <span class="<?= $what->glyph ?>"></span>&nbsp;
        <?php
        if ($this->action !== 'DELETE') {
            echo CHtml::link($what->title, [$what->route . '/view', 'id' => $data->super_id]);
        } else {
            echo $data->old_value;
        }
        ?>

    </div>
    <div id="when" class="col-md-2">
        <?= $when ?>
    </div>
    <div id="detail" class="col-md-3">
        <?php
        if ($data->action === 'CHANGE') {
            echo "$data->field from '$data->old_value' to '$data->new_value'";
        }
        ?>
    </div>
    <?php
    #echo $data->description;
    ?>
</div>
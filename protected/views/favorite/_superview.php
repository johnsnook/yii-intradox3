<?php
$url = $this->createUrl($data->route . '/view', ['id' => $data->id]);
?>
<a href="<?= $url ?>" class="btn btn-sq ">
    <i class="<?= $data->glyph ?>" style="font-size: 5em"></i><br/>
    <?= SnookTools::truncate($data->title, 30) ?>
</a>

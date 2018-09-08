<?php
if (file_exists($model->filePath)) {
    if (file_exists($model->thumbnailPath)) {
        ?>
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center"><?= $model->title . '.' . $model->file_extension ?></div>
            <div class="panel-body " style="text-align: center; background-color: #000; padding:4px ">
                <a href="javascript: return false;" onclick="$('#hiddenDownloader')[0].src = 'index.php?r=document/download&id=<?= $model->id ?>';">
                    <img src="<?= $model->thumbnailUrl; ?>" style="width:100%; height: 100%" />
                </a>
            </div>
            <div class="panel-footer" style="text-align: center">Size: <?= $model->fileSize ?>, Type: <?= strtoupper($model->file_extension) ?></div>
        </div>
        <?php
    }
}

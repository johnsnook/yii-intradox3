<?php
/* @var $years Array */
/* @var $groupField string */
?>
<?php
foreach ($years as $year) {
    ?>
    <div class="year row" id="year-<?= $year['year'] ?>">
        <div class="col-lg-1 year-label"><?= $year['year'] ?></div>
        <div class="col-lg-11 year-body">
            <a href="<?= $ajaxURL ?>&project_id=<?= $project_id ?>&year=<?= $year['year'] ?>&month=&group=<?= $groupField ?>"></a>
        </div>
    </div>
    <?php
}
?>

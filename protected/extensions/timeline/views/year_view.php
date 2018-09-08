<?php
/** @var $months array */
$monthNames = [
    null => '',
    '' => '',
    '01' => 'January',
    '02' => 'Feburary',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
];

foreach ($months as $month => $monthdata) {
    ?>
    <div class="month row ">
        <div class="col-lg-1 month-label"><?= $monthNames[$month] ?></div>
        <div class="col-lg-11 month-body ">
            <?php
            foreach ($monthdata as $group => $groupdata) {
                if (count($groupdata) > 1) {
                    ?>
                    <a href="<?= Yii::app()->controller->createUrl('document/index', ['project_id' => $project_id, 'query' => $group]) ?>"><?= $group ?> <span class="badge"><?= count($groupdata) ?></span></a>
                        <?php
                    } else {
                        #echo json_encode($groupdata);
                        ?>
                        <?= $group ?>: <a href="<?= Yii::app()->controller->createUrl('document/view', ['id' => $groupdata[0][2]]) ?>"><?= $groupdata[0][1] ?></span></a>
                        <?php
                    }
                }
                ?>
        </div>
    </div>
    <?php
}
?>

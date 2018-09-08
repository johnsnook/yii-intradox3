<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->beginWidget('booster.widgets.Id3Panel', [
    'title' => "Viewing: {$model->title}",
    'headerIcon' => 'book',
    'context' => 'info',
    'padContent' => true,
]);

$this->widget('booster.widgets.TbButtonGroup', [
    'buttonType' => 'link',
    'size' => 'small',
    'buttons' => $this->menu,
]);
?>
<div class="row">
    <div class="col-md-12"><?php
        $this->widget('booster.widgets.TbDetailView', [
            'data' => $model,
            'attributes' => [
                'title',
            ],
        ]);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6"><?php
        $this->widget('booster.widgets.TbDetailView', [
            'data' => $model,
            'attributes' => [
                [
                    'field' => 'accession_number',
                    'visible' => $model->accession_number != null,
                ],
                [
                    'field' => 'call_number',
                    'visible' => $model->call_number != null,
                ],
                [
                    'field' => 'series_title',
                    'visible' => $model->series_title != null,
                ],
                'year',
                'pages',
                [
                    'field' => 'volumn_number',
                    'visible' => !empty($model->volumn_number),
                ],
                [
                    'field' => 'edition_number',
                    'visible' => !empty($model->edition_number),
                ],
                [
                    'field' => 'binding',
                    'visible' => !empty($model->binding),
                ],
                [
                    'field' => 'document_type',
                    'visible' => !empty($model->document_type),
                ],
                [
                    'field' => 'agency_number',
                    'visible' => !empty($model->agency_number),
                ],
                [
                    'field' => 'location',
                #'visible' => !empty($model->location),
                ],
                'subjects' => [
                    'name' => 'subjectLinks',
                    'header' => 'Subjects',
                    'value' => $model->subjectLinks,
                    'visible' => !empty($model->subjectLinks),
                    'type' => 'raw'
                ],
                'authors' => [
                    'name' => 'authorLinks',
                    'header' => 'Authors',
                    'value' => $model->authorLinks,
                    'visible' => !empty($model->authorLinks),
                    'type' => 'raw'
                ],
                'corpAuthors' => [
                    'name' => 'corpAuthorLinks',
                    'header' => 'Corporate Authors',
                    'value' => $model->corporateAuthorLinks,
                    'visible' => !empty($model->corporateAuthorLinks),
                    'type' => 'raw'
                ],
                'file_extension' => ['name' => 'Electronic Document', 'header' => 'Electronic Document', 'type' => 'raw',
                    'value' => $model->file_extension ? $this->widget('booster.widgets.TbButton', [
                                //'icon' => 'flaticon-' . $model->file_extension,
                                'label' => ltrim($model->fileSize) . ' ' . strtoupper($model->file_extension) . ' file',
                                'size' => 'extra_small',
                                'context' => 'link',
                                'htmlOptions' => [
                                    'onClick' => '$(\'#hiddenDownloader\')[0].src = "index.php?r=monograph/download&id=' . $model->id . '; return false;"',
                                    'target' => '_blank'],
                                    ], true) : ''
                ],
                [
                    'field' => 'notes',
                    'visible' => !empty($model->notes),
                ],
            ],
        ]);
        ?>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="row" id="fileUploader">
            <iframe id="hiddenDownloader" style="display:none;visibility: hidden"></iframe>
            <div class="row">
                <?php
                if ($model->file_extension === 'pdf') {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center"><?= $model->title . '.' . $model->file_extension ?></div>
                        <div class="panel-body " style="text-align: center; background-color: #000 ; padding:4px">
                            <iframe
                                src="/js/pdfjs/web/viewer.html?file=<?= urlencode($this->createAbsoluteUrl('download', ['id' => $model->id, 'embed' => true])); ?>#page-fit"
                                height="450"
                                style="border:0px; width: 100%"
                                >
                            </iframe>
                        </div>
                        <div class="panel-footer" style="text-align: center">Size: <?= $model->fileSize ?>, Type: <?= strtoupper($model->file_extension) ?></div>
                    </div>
                    <?php
                } else {
                    $this->renderPartial('_filePreview', ['model' => $model]);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--<div class="row">
    <div class="col-md-12">
<?php
//        $this->widget('booster.widgets.TbDetailView', [
//            'data' => $model,
//            'attributes' => [
//                'notes',
//            ],
//        ]);
?>
    </div>
</div>-->





<?php
$this->endWidget();
?>



<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */
?>
<script type="text/javascript" src="/js/pdfobject.js"></script>

<?php
$labels = $model->attributeLabels();


$co = $model->created_info;
$mo = $model->modified_info;
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-7">
            <h3 style="margin-top: 0px"></h3>
            <table class="detail-view table-condensed" id="yw0">
                <?php if ($co) : ?>
                    <tr class="row-fluid">
                        <th><?= $labels['created_info']; ?></th>
                        <td><?= $co; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($mo) : ?>
                    <tr class="row-fluid">
                        <th><?= $labels['modified_info']; ?></th>
                        <td><?= $mo; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->page_count): ?>
                    <tr class="even">
                        <th><?= $labels['type']; ?></th>
                        <td><?= $model->type; ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if ($model->class_name === 'document_article') {
                    ?>
                    <tr class="row-fluid">
                        <td colspan="2">
                            <table class="detail-view table-condensed" id="document_article_data">
                                <tr class="row-fluid">
                                    <th><?= $labels['personal_authors']; ?></th>
                                    <td><?= $model->personal_authors; ?></td>
                                </tr>
                                <tr class="row-fluid">
                                    <th><?= $labels['journal']; ?></th>
                                    <td><?= $model->journal; ?></td>
                                </tr>
                                <?php if ($model->volume): ?>

                                    <tr class="row-fluid">
                                        <th><?= $labels['volume']; ?></th>
                                        <td><?= $model->volume; ?></td>
                                    </tr>
                                <?php endif; ?>

                                <tr class="row-fluid">
                                    <th><?= $labels['page_range']; ?></th>
                                    <td><?= $model->page_range; ?></td>
                                </tr>
                                <tr class="row-fluid">
                                    <th><?= $labels['issue']; ?></th>
                                    <td><?= $model->issue; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                } else if ($model->class_name === 'document_correspondence') {
                    ?>
                    <tr class="row-fluid">
                        <td colspan="2">
                            <table class="detail-view table-condensed" id="document_correspondence_data">
                                <tr class="row-fluid">
                                    <th><?= $labels['recipient']; ?></th>
                                    <td><?= $model->recipient; ?></td>
                                </tr>
                                <tr class="row-fluid">
                                    <th><?= $labels['personal_author']; ?></th>
                                    <td><?= $model->personal_author; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <?php if ($model->page_count): ?>
                    <tr class="even">
                        <th><?= $labels['page_count']; ?></th>
                        <td><?= $model->page_count; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->page_count): ?>
                    <tr class="odd">
                        <th><?= $labels['notes']; ?></th>
                        <td><?= $model->notes; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->page_count): ?>
                    <tr class="even">
                        <th>Bates Range</th>
                        <td><?= $model->bates_start . ' ' . $model->bates_end; ?></td>
                    </tr>
                <?php endif; ?>
                <tr class="odd">
                    <th>Full text</th>
                    <td><?= SnookTools::human_filesize(strlen($model->full_text)) ?></td>
                </tr>

                <tr class="even">
                    <th>Related Documents</th>
                    <td><?php
                        $docs = $model->documents;
                        $doneAlready = []; // we don't need duplicates
                        foreach ($docs as $doc) {
                            if ($doc->id !== $model->id & !in_array($doc->id, $doneAlready)) {// we don't need to add this document
                                echo CHtml::link($doc->title, $this->createUrl('view', ['id' => $doc->id])) . '<br/>';
                                $doneAlready[] = $doc->id;
                            }
                        }
                        ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">

            <?php
            if ($model->file_extension == 'pdf') {
                ?>
                <iframe
                    src="/js/pdfjs/web/viewer.html?file=<?= urlencode($this->createAbsoluteUrl('download', ['id' => $model->id, 'embed' => true])); ?>#page-fit"
                    width="100%" height="400" style="border:0px">
                </iframe>
                <?php
            } else {
                $this->renderPartial('_filePreview', ['model' => $model]);
            }
            ?>
        </div>
    </div>
</div>



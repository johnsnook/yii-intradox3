<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */
/* @var $logDataProvider CActivedDataProvider */
require_once Yii::app()->basePath . '/vendor/deleteCode.php';
?>
<script type="text/javascript" src="/js/pdfobject.js"></script>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="<?= $model->glyph ?>" data-toggle="tooltip" data-placement="right" data-original-title="Knowledge is invariably a matter of degree: you cannot put your finger upon even the simplest datum and say this we know. -T. S. Eliot"></span>
            &nbsp;<?php
            $w = explode('_', $model->class_name);
            echo ucwords($w[count($w) - 1]);
            ?>: <?= $model->title; ?> </h1>
    </div>
    <div class="panel-body">
        <?php
        $labels = $model->attributeLabels();
        // Set up the menu for this action
        switch ($this->userData->userlevel) {
            case ROLE_ADMIN:
                if ($model->class_name == 'document' && strtolower($model->type) == 'correspondence') {
                    #echo CHtml::link('Convert to Correspondence Document', array('document/d2c', 'id' => $model->id), array('class' => 'btn btn-success'));
                    $this->menu[] = [
                        'label' => "Convert to Correspondence Document",
                        'url' => array('document/d2c', 'id' => $model->id),
                        'context' => 'success',
                        'icon' => 'random'
                    ];
                }
                if ($model->class_name == 'document' && strtolower($model->type) == 'article') {
                    $this->menu[] = [
                        'label' => "Convert to Article Document",
                        'url' => array('document/d2a', 'id' => $model->id),
                        'context' => 'success',
                        'icon' => 'random'
                    ];
                    #echo CHtml::link('Convert to Correspondence Document', array('document/d2c', 'id' => $model->id), array('class' => 'btn btn-success'));
                }

            case ROLE_USER:
                $this->menu[0] = [
                    'label' => 'Edit',
                    'icon' => 'edit',
                    'context' => 'primary',
                    'url' => ['update', 'id' => $model->id]
                ];
                $this->menu[1] = [
                    'label' => 'Duplicate this document',
                    'icon' => 'duplicate',
                    'url' => $this->createUrl('duplicate', ['id' => $model->id]),
                ];
                $this->menu[2] = array('label' => 'New Document', 'icon' => 'plus-sign', 'url' => array('document/create', 'project_id' => $this->Project->id));

                $this->menu[] = Favorite::GetMyFavoriteButton($model->id);
            default:
        }
        if ($this->userData->userlevel === ROLE_ADMIN OR $model->creator->id == Yii::app()->user->id) {
            $this->menu[] = [
                'label' => "Delete this {$this->id}",
                'url' => "javascript:del('{$this->id}',{$model->id})",
                'context' => 'warning',
                'icon' => 'remove-circle'
            ];
        }
        if (strpos(Yii::app()->user->name, 'snook') !== false) {
            $this->menu[] = [
                'label' => "Convert to Timeline Event",
                'url' => $this->createUrl('projectEvent/create', ['project_id' => $model->project_id, 'document_id' => $model->id]),
                'context' => 'success',
                'icon' => 'ice-lolly'
            ];
        }
        $co = $model->created_info;
        $mo = $model->modified_info;
        ?>
        <div class="row">
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => array('class' => 'pull-left'),
                'size' => 'small',
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <div class="row">            
            <iframe id="hiddenDownloader" style="display:none;visibility: hidden"></iframe>
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
                            <?php if (!empty($model->file_extension)): ?>
                                <tr class="row-fluid">
                                    <th><?= $labels['file_extension']; ?></th>
                                    <td><?php
                                        $fileicon = 'flaticon flaticon-' . $model->file_extension;
                                        $this->widget('booster.widgets.TbButton', array(
                                            'icon' => $fileicon,
                                            'size' => 'extra_small',
                                            'context' => 'link',
                                            'htmlOptions' => [
                                                'onClick' => '$(\'#hiddenDownloader\')[0].src = "index.php?r=document/download&id=' . $model->id . '"; return false;',
                                                'target' => '_blank',
                                                'font-size' => '24px',
                                            ],
                                        ));
                                        ?> Size: <?= $model->fileSize ?>, Type: <?= strtoupper($model->file_extension) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if (!empty($model->corporate_author)) : ?>
                                <tr class="row-fluid">
                                    <th><?= $labels['corporate_author']; ?></th>
                                    <td><?= $model->corporate_author; ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr class="row-fluid">
                                <th><?= $labels['topic']; ?></th>
                                <td><?= $model->topic; ?></td>
                            </tr>
                            <tr class="even">
                                <th><?= $labels['type']; ?></th>
                                <td><?= $model->type; ?></td>
                            </tr>
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
                                            <tr class="row-fluid">
                                                <th><?= $labels['volume']; ?></th>
                                                <td><?= $model->volume; ?></td>
                                            </tr>
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
                            <tr class="odd">
                                <th><?= $labels['catalog_number']; ?></th>
                                <td><?= $model->catalog_number; ?></td>
                            </tr>
                            <tr class="even">
                                <th><?= $labels['page_count']; ?></th>
                                <td><?= $model->page_count; ?></td>
                            </tr>
                            <tr class="even">
                                <th>Original Date</th>
                                <td><?= $model->original_date; ?></td>
                            </tr>
                            <tr class="odd">
                                <th><?= $labels['notes']; ?></th>
                                <td><?= $model->notes; ?></td>
                            </tr>
                            <tr class="even">
                                <th>Bates Range</th>
                                <?php
                                $sep = $model->bates_start !== null ? ' - ' : '';
                                ?>
                                <td><?= $model->bates_start . $sep . $model->bates_end; ?></td>
                            </tr>
                            <tr class="odd">
                                <th>Full text</th>
                                <td><?= SnookTools::human_filesize(strlen($model->full_text)) ?></td>
                            </tr>

                            <tr class="even">
                                <th>Related Documents</th>
                                <td><?php
                                    $relatedDocs = $model->getRelatedDocumentStubs();
                                    foreach ($relatedDocs as $doc) {
                                        if ($doc['id'] !== $model->id) {// we don't need to add this document
                                            echo CHtml::link($doc['title'], $this->createUrl('view', ['id' => $doc['id']])) . '<br/>';
                                        }
                                    }
                                    ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">

                        <?php
                        if ($model->file_extension === 'pdf') {
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="text-align: center"><?= $model->title . '.' . $model->file_extension ?></div>
                                <div class="panel-body " style="text-align: center; background-color: #000 ; padding:4px">
                                    <iframe
                                        src="/js/pdfjs/web/viewer.html?file=<?= urlencode($this->createAbsoluteUrl('download', ['id' => $model->id, 'embed' => true])); ?>#page-fit"
                                        width="100%" height="450"
                                        style="border:0px"
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
            <!--div class="row"><pre><?php /* $model->full_text  */ ?></pre></div-->
            <div class="row" style="margin-top:40px">
                <div class="col-md-12">
                    <?php
                    $this->widget(
                            'ext.yiibooster.widgets.TbTabs', [
                        'type' => 'tabs', // 'tabs' or 'pills'
                        //'reload' => true, // Reload the tab content each time a tab is clicked. Delete this line to load it only once.
                        'tabs' => [
                            [
                                'label' => 'History',
                                'icon' => 'time',
                                'badgeOptions' => ['label' => $logDataProvider->getTotalItemCount()],
                                'content' => $this->renderPartial('_documentLog', ['dataProvider' => $logDataProvider,], true),
                            ],
                            [
                                'label' => 'Comments',
                                'active' => true,
                                'icon' => 'comment',
                                'badgeOptions' => ['label' => Post::getTotalItemCount($model->id)],
                                'content' => $this->widget('ext.comments.CommentsWidget', [
                                    'parent_id' => $model->id,
                                    'userData' => $this->userData,
                                    'isPanel' => true
                                        ], true),
                            ],
                        ],
                            ]
                    );
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div class="panel-footer">
    </div>
</div>

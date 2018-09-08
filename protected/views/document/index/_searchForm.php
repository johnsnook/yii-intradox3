<div class="row" style="margin-bottom: -30px">
    <?php
    /* @var $this DocumentController */
    /* @var $model Document */
    /* @var $authorsArray Array */
    /* @var $topicsArray Array */
    /* @var $typesArray Array */
    ?>
    <input value="<?= $this->Project->id ?>" name="project_id" id="project_id" type="hidden">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="Document_search">Filter documents by</label>
            <div class="input-group ">
                <input class="form-control" name="query" id="query" type="text" placeholder="type anything to search titles, full document text if available, notes, authors, topics and types, date and catno." >
                <a onclick="simpleSearch();" class="btn btn-primary input-group-addon" id="yw6"><span class="glyphicon glyphicon-search"></span></a>
                <span class="input-group-addon" ><i id="toggleAdvanced" class="glyphicon glyphicon-collapse-down" data-toggle="tooltip" data-placement="top" data-original-title="Advanced search options"></i></span>
                <span class="input-group-addon" ><i id="toggleTips" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" data-original-title="Sphinx search tips"></i></span>
                <a onclick="resetSearch()" class="btn btn-default input-group-addon" id="yw6">Reset</a>
            </div>
        </div>
        <div class="form-actions">
            <a id="aToggleAdvanced" href="#">Advanced search options</a> - <a id="aToggleTips" href="#">Search tips</a> - <a id="exportxls" href="#" onclick="ExportXLSX()">Export to XLSX</a>
        </div>
        <div id="search-tips" style="display: none">
            <?php
            $this->renderPartial('index/_searchTips');
            ?>
        </div>
        <div id="advancedSearch" style="display: none">
            <?php
            $search = new SphinxHelper('search');
            $form = $this->beginWidget('booster.widgets.TbActiveForm', [
                'action' => 'null',
                'method' => 'get',
                'htmlOptions' => ['id' => 'frmAdvancedSearch'],
            ]);
            ?>
            <div class="row" style="">
                <div class="form-actions" >
                    <?php
                    //$searchesDP
                    $buttons = [
                        [
                            'label' => 'Save this search',
                            'icon' => 'floppy-disk',
                            'htmlOptions' => ['onclick' => 'saveSearch();']
                        ],
                        [
                            'label' => 'Export to XLSX',
                            'icon' => 'export',
                            'htmlOptions' => ['onclick' => 'ExportXLSX();']
                        ],
                    ];

                    if ($searchesDP->totalItemCount > 0) {
                        //$buttons[0]['items'][] = '---';
                        $searchesButt = [];
                        foreach ($searchesDP->getData() as $savedSearch) {
                            $searchesButt[] = [
                                'label' => $savedSearch->title,
                                'url' => "javascript:loadSearch(" . CJSON::encode($savedSearch) . ");",
                            ];
                        }
                        $buttons[] = ['label' => 'Saved Searches', 'icon' => 'search', 'items' => $searchesButt];
                    }

                    $this->widget('booster.widgets.TbButtonGroup', [
                        'buttonType' => TbButton::BUTTON_LINK,
                        'context' => 'default',
                        'size' => 'small',
                        'htmlOptions' => ['id' => 'gridButt',],
                        'buttons' => $buttons,
                            ]
                    );
                    ?>
                </div>
                <div class="col-md-6">
                    <?=
                    $form->textFieldGroup($search, 'title', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'title']],
                        'hint' => 'Boolean searches work here, so "fact sheet" | agreement returns documents whose titles contain either "fact sheet" or agreement.'
                    ]);
                    $typeaheadOpts = [
                        'hint' => true,
                        'highlight' => true,
                        'minLength' => 1
                    ];
                    echo $form->typeAheadGroup(
                            $search, 'corporate_author', [
                        'widgetOptions' => [
                            'options' => $typeaheadOpts,
                            'datasets' => ['source' => $authorsArray],
                            'htmlOptions' => ['id' => 'author']
                        ]]
                    );
                    echo $form->typeAheadGroup(
                            $search, 'topic', [
                        'widgetOptions' => [
                            'options' => $typeaheadOpts,
                            'datasets' => ['source' => $topicsArray],
                            'htmlOptions' => ['id' => 'topic']
                        ]]
                    );
                    echo $form->typeAheadGroup(
                            $search, 'type', [
                        'widgetOptions' => [
                            'options' => $typeaheadOpts,
                            'datasets' => ['source' => $typesArray],
                            'htmlOptions' => ['id' => 'type'],
                        ]]
                    );
                    ?>
                </div>
                <div class="col-md-6">
                    <?=
                    $form->textFieldGroup($search, 'original_date', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'date']],
                        'hint' => 'Only year search is currently working.  Watch this space!'
                    ]);
                    ?>
                    <?=
                    $form->textFieldGroup($search, 'notes', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'notes']],
                        'hint' => 'Remember that quotes indicate an exact phrase search, eg, "the lazy brown fox"'
                    ]);
                    ?>
                    <?=
                    $form->textFieldGroup($search, 'full_text', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'text']]]);
                    ?>
                    <?=
                    $form->textFieldGroup($search, 'catalog_number', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'catno']]]);
                    ?>
                    <?=
                    $form->textFieldGroup($search, 'bates_search', [
                        'widgetOptions' => ['htmlOptions' => ['id' => 'bates_search']]]);
                    ?>
                </div>
            </div>

            <div class="form-actions">
                <?php
                $this->widget('booster.widgets.TbButton', [
                    'buttonType' => 'link',
                    'htmlOptions' => ['id' => 'dickbutt'],
                    'context' => 'primary',
                    'label' => 'Build and Submit Query',
                    'url' => 'javascript:buildAdvancedQuery();'
                ]);
                ?>
            </div>

            <?php $this->endWidget(); ?>

        </div>
        <!--input class="form-control" placeholder="type anything to search titles, full document text if available, notes, authors, topics and types" name="Document[search]" id="Document_search" type="text"-->
    </div>
</div>

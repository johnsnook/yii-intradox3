<?php
/* @var $this SiteController */
/* @var $favoritesDataProvider CDataProvider */
/* @var $logsDataProvider CDataProvider */

$you = Yourself::model()->findByPk(Yii::app()->user->id);
$this->pageTitle = Yii::app()->name . " - Projects";

$this->menu = [
    ['label' => 'Add new project', 'icon' => 'plus-sign', 'url' => ['project/create']],
];

$tabs = [
    [
        'label' => 'Projects',
        'icon' => 'briefcase',
        #'content' => $this->renderPartial('_list', ['dataProvider' => $projectsProvider,), true),
        'content' => $this->renderPartial('index/_projectsGridTabPane', ['project' => Project::model(),], true),
        'active' => true,
    ],
    [
        'label' => 'Recent',
        'icon' => 'time',
        'badgeOptions' => ['label' => Log::model()->GetMyLog()->getTotalItemCount() . '+'],
        'content' => $this->renderPartial('index/_recent', [], true),
    ],
    [
        'label' => 'Intradox Project Info',
        'id' => 'projectInfoTab',
        'icon' => 'info-sign',
        'content' => $this->renderPartial('index/_projectInfoTabPane', ['model' => $model], true)
    ],
];

if ($this->userData->userlevel == ROLE_ADMIN) {
//    $tabs[] = ['label' => 'Usage', 'content' => 'Put some usage data here maybe?'];
//    $tabs[] = ['label' => 'Admin', 'content' => $this->renderPartial('index/_adminTabPane', [], true)];
}
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-briefcase" data-toggle="tooltip" data-placement="right" data-original-title="Shall I part my hair behind?   Do I dare to eat a peach?
                  I shall wear white flannel trousers, and walk upon the beach.
                  I have heard the mermaids singing, each to each.
                  -T.S. Eliot"></span>
            &nbsp;Intradox Projects
        </h1>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-8">
                <p>This is the Intradox projects page.  Here your can search and
                    select or edit a project, see your recently viewed projects
                    and manage your favorite projects.</p>
            </div>
            <div class="col-md-4">
                <?php
                $this->widget('booster.widgets.TbButtonGroup', [
                    'buttonType' => 'link',
                    'htmlOptions' => ['class' => 'pull-right'],
                    'buttons' => $this->menu,
                ]);
                ?>
            </div>
        </div>
        <div class="row" style="margin-top:40px">
            <div class="col-md-12">
                <?php
                $this->widget(
                        'ext.yiibooster.widgets.TbTabs', [
                    'type' => 'tabs', // 'tabs' or 'pills'
                    #'reload' => true, // Reload the tab content each time a tab is clicked. Delete this line to load it only once.
                    'tabs' => $tabs,
                        ]
                );
                ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>

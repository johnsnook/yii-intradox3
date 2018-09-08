<?php
/* @var $this DocumentController */
/* @var $model CActiveRecord */
/* @var $project CActiveRecord */
/* @var $logDataProvider CActiveDataProvider */
/* @var $recentDocumentsProvider CActiveDataProvider */
/* @var $searchesDP CActiveDataProvider */
/* @var $authorsArray Array */
/* @var $topicsArray Array */
/* @var $typesArray Array */

Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.js');
Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.pie.js');
Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.resize.js');
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

#Yii::app()->clientScript->registerScriptFile('/js/flot/jquery.flot.categories.js');
$projectMenu = [];
$extraMenu = [];
$adminMenu = [];
$file = Yii::app()->params['wc_path'] . 'w' . $project->id . '.txt';


switch ($this->userData->userlevel) {
    case ROLE_USER:
        $projectMenu[] = array('label' => 'New Document', 'context' => 'primary', 'icon' => 'plus-sign', 'url' => $this->createUrl('document/create', ['project_id' => $project->id]));
        break;
    case ROLE_ADMIN:
        $projectMenu[] = array('label' => 'New Document', 'context' => 'primary', 'icon' => 'plus-sign', 'url' => $this->createUrl('document/create', ['project_id' => $project->id]));
        $projectMenu[] = array('label' => 'Edit this project', 'icon' => 'pencil', 'url' => $this->createUrl('project/update', array('id' => $project->id)));
        $adminMenu[] = array('label' => 'Search and replace', 'icon' => 'pawn', 'context' => 'warning', 'url' => $this->createUrl('project/searchAndReplace', array('id' => $project->id)));
        $adminMenu[] = array('label' => 'Invite project guest', 'icon' => 'user', 'context' => 'warning', 'url' => $this->createUrl('person/invite', array('project_id' => $project->id)));
        $adminMenu[] = ['label' => 'Delete this project', 'icon' => 'remove', 'context' => 'danger', 'url' => "javascript:del('project',{$project->id})", 'htmlOptions' => ['id' => 'deleteButton']];
        if (strpos(Yii::app()->user->name, 'snook') !== false) {
            $adminMenu[] = ['label' => 'Batch Convert Doc types', 'icon' => 'random', 'context' => 'warning', 'url' => $this->createUrl('fixTypes', ['project_id' => $project->id])];
            //$adminMenu[] = ['label' => 'Mad Experiments', 'icon' => 'road', 'context' => 'success', 'url' => $this->createUrl('document/viz', ['project_id' => $project->id])];
            //$adminMenu[] = ['label' => 'Duplicate this Project', 'icon' => 'copy', 'context' => 'success', 'url' => $this->createUrl('project/duplicate', ['id' => $project->id])];
        }

        break;
    case ROLE_CLIENT:
    default :
}
if (file_exists($file))
    $extraMenu[] = ['label' => 'Word cloud', 'icon' => 'fa fa-cloud', 'context' => 'default', 'url' => $this->createUrl('project/wordCloud', ['id' => $project->id])];

$extraMenu[] = ['label' => 'Timeline', 'icon' => 'fa fa-calendar', 'context' => 'success', 'url' => $this->createUrl('projectEvent/index', ['project_id' => $project->id])];
$projectMenu[] = Favorite::GetMyFavoriteButton($project->id);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-folder-close" data-toggle="tooltip" data-placement="right" data-original-title="We shall not cease from exploration, and the end of all our exploring will be to arrive where we started and know the place for the first time. -T. S. Eliot" ></span>&nbsp;Project: <?= $project->title; ?></h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8"><?php
                $this->widget('booster.widgets.TbButtonGroup', array(
                    'size' => 'small',
                    'buttonType' => 'link',
                    'context' => 'default',
                    'buttons' => $projectMenu,
                ));
                $this->widget('booster.widgets.TbButtonGroup', array(
                    'size' => 'small',
                    'buttons' => [['label' => 'Extras', 'icon' => 'glyphicon glyphicon-fire', 'context' => 'success', 'items' => $extraMenu]],
                ));
                if ($this->userData->userlevel == ROLE_ADMIN) {
                    $this->widget('booster.widgets.TbButtonGroup', array(
                        'size' => 'small',
                        //'buttonType' => 'link',
                        'context' => 'danger',
                        'buttons' => [['label' => 'Admin', 'icon' => 'cloud-download', 'context' => 'danger', 'items' => $adminMenu]],
                    ));
                }

                $labels = $project->attributeLabels();
                ?>
            </div>
            <div class="col-md-4" style="text-align: right" >
                <?php
                if (!empty($project->jobnumber))
                    echo '<p><b>' . $labels['jobnumber'] . ':</b> ' . $project->jobnumber . '</p>';
                if (!empty($project->pod_id))
                    echo '<p><b>' . $labels['pod_id'] . ':</b> ' . $project->pod->title . '</p>';

                echo "<p><b>Created:</b> $project->created_info</p>";

                $mo = $project->modified_info;
                if ($mo)
                    echo "<p><b>Modified:</b> $project->modified_info</p>";
                ?>
            </div>
        </div>
        <div class="row" style="padding-top:30px">
            <div class="col-md-12">
                <?php
                /** get the list of years and pass it to the timeline
                 * @todo I should not be doing this here, move to controller
                 */
                $this->widget(
                        'ext.yiibooster.widgets.TbTabs', array(
                    'type' => 'tabs', // 'tabs' or 'pills'
                    'placement' => 'top',
                    'tabs' => [
                        [
                            'label' => 'Documents',
                            'icon' => 'file',
                            'id' => 'documentsTab',
                            'badgeOptions' => ['label' => $project->document_count],
                            'content' => $this->renderPartial('index/_documentsTabPane', array(
                                'model' => $model,
                                'docsGridDP' => $docsGridDP,
                                'searchesDP' => $searchesDP,
                                'authorsArray' => $authorsArray,
                                'topicsArray' => $topicsArray,
                                'typesArray' => $typesArray,
                                    ), true),
                            'active' => true
                        ],
                        [
                            'label' => 'Recent',
                            'icon' => 'time',
                            'badgeOptions' => ['label' => $recentDocumentsProvider->getTotalItemCount()],
                            'content' => $this->renderPartial('index/_recentTabPane', array('dataProvider' => $recentDocumentsProvider,
                                    ), true),
                        ],
                        [
                            'label' => 'Favorites',
                            'icon' => 'star',
                            'badgeOptions' => ['label' => $FavoriteDP->totalItemCount],
                            'content' => $this->renderPartial('index/_favorite', array('dataProvider' => $FavoriteDP,
                                    ), true),
                        ],
                        [
                            'label' => 'History',
                            'icon' => 'calendar',
                            'badgeOptions' => ['label' => $logDataProvider->getTotalItemCount()],
                            'content' => $this->renderPartial('index/_projectLog', array('dataProvider' => $logDataProvider,), true),
                        ],
                        [
                            'label' => 'Comments',
                            'icon' => 'comment',
                            'badgeOptions' => ['label' => Post::getTotalItemCount($project->id)],
                            'content' => $this->widget('ext.comments.CommentsWidget', [
                                'parent_id' => $project->id,
                                'userData' => $this->userData,
                                'isPanel' => true
                                    ], true),
                        ],
                    ],
                        )
                );
                ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>


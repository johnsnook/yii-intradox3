<?php
/** @var $this SiteController */
/** @var $favoritesDataProvider CDataProvider */
/** @var $logsDataProvider CDataProvider */
$you = Yourself::model()->findByPk(Yii::app()->user->id);

$this->pageTitle = Yii::app()->name . " - " . $you->title . "'s Dashboard";

$this->menu = [
        #['label' => 'Add new project', 'icon' => 'plus-sign', 'url' => ['project/create']],
];
?>
<style>

    a:hover{
        z-index: 999;
    }

</style>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-dashboard" data-toggle="tooltip" data-placement="right" data-original-title="For I have known them all already, known them all:
                  Have known the evenings, mornings, afternoons,
                  I have measured out my life with coffee spoons;

                  -T. S. Eliot"></span>&nbsp;<?= $you->title; ?>'s dashboard </h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <p>This is your Dashboard page.</p>

                <?php
                $this->renderPartial('dashboard/_readyForRetesting', ['person_id' => Yii::app()->user->id]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                switch ($this->userData->userlevel) {
                    case ROLE_ADMIN:
                        if ($you->username == 'snookbot') {
                            $this->menu[] = ['label' => 'Legacy Query', 'context' => 'warning', 'type' => 'link', 'url' => $this->createUrl('import/queryArtemis')];
                        }
                    case ROLE_USER:
                        $this->menu[] = ['label' => 'IntraLib', 'context' => 'info', 'type' => 'link', 'url' => Yii::app()->createUrl('intralib')];
                    case ROLE_CLIENT:
                        break;
                }

                $this->widget('booster.widgets.TbButtonGroup', [
                    'size' => 'small',
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
                /** get the list of years and pass it to the timeline
                 * @todo I should not be doing this here, move to controller
                 */
                $sql = "select distinct substring(original_date for 4) as year from document where project_id=:projectId and original_date is not null order by year";
                $yearsDP = new CSqlDataProvider($sql, ['params' => [':projectId' => $project->id],
                    'pagination' => false]);

                $this->widget(
                        'booster.widgets.TbTabs', array(
                    'type' => 'tabs',
                    'placement' => 'top',
                    'tabs' => [
                        [
                            'label' => 'News',
                            'id' => 'newsInfoTab',
                            'active' => $newsDP->totalItemCount > 0 ? true : FALSE,
                            'icon' => 'info-sign',
                            'content' => $this->renderPartial('dashboard/_newsInfoTabPane', ['newsDP' => $newsDP], true)
                        ],
                        [
                            'label' => 'Favorites',
                            'icon' => 'star',
                            'active' => $newsDP->totalItemCount == 0 ? true : FALSE,
                            'badgeOptions' => ['label' => $favoritesDataProvider->getTotalItemCount()],
                            'content' => $this->renderPartial('dashboard/_favorite', ['dataProvider' => $favoritesDataProvider,], true),
                        ],
                        [
                            'label' => 'Your profile',
                            'id' => 'yourProfileTab',
                            'icon' => 'user',
                            'content' => $this->renderPartial('dashboard/_profileTabPane', ['model' => $model], true),
                        ],
                        [
                            'label' => 'Your Activity',
                            'id' => 'yourActivityTab',
                            'icon' => 'fire',
                            'content' => $this->renderPartial('dashboard/_activityTabPane', ['model' => $model], true)
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

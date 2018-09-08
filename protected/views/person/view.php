<?php
$this->layout = '//layouts/column1';
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = [
    ['label' => 'Browse people', 'url' => array('index')],
        #array('label' => 'Manage Person', 'url' => array('admin')),
];
if ($this->userData->userlevel === ROLE_ADMIN) {
    $this->menu[] = ['label' => 'Edit ' . $model->title, 'url' => array('update', 'id' => $model->id)];
}
if ($this->userData->id === $model->id)
    $this->menu[] = ['label' => 'Edit your profile', 'url' => array('yourself/update')];

if ($this->userData->userlevel == ROLE_ADMIN) {
    $this->menu[] = ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",];
}
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right" data-original-title="In the room the women come and go, Talking of Michelangelo. -T. S. Eliot"></span>&nbsp;Viewing <?= ucfirst($this->id) . ': ' . $model->title; ?> </h2>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbButtonGroup', array(
            'size' => 'small',
            'buttonType' => 'link',
            'buttons' => $this->menu,
        ));
        ?>
        <div class="row">
            <div class="col-lg-8">
                <?php
                $this->widget('booster.widgets.TbDetailView', array(
                    'data' => $model,
                    'type' => 'condensed',
                    'attributes' => array(
                        'id',
                        'title',
                        'username',
                        'userRole',
                        'email',
                        'phone',
                        'podName',
                    ),
                ));
                ?>
            </div>
            <div class="col-lg-4"><?= '<img class src="' . $model->avatarUrl . '" alt="avatar" />' ?>            </div>
        </div>
        <?php
        $this->widget(
                'ext.yiibooster.widgets.TbTabs', [
            'type' => 'tabs', // 'tabs' or 'pills'
            'placement' => 'top',
            'tabs' => [
                [
                    'label' => 'Activity', 'icon' => 'list-alt',
                    #'content' => $this->renderPartial('_list', ['dataProvider' => $projectsProvider,), true),
                    'badgeOptions' => ['label' => $model->log->getTotalItemCount($model->id)],
                    'content' => $this->renderPartial('//log/_log', ['dataProvider' => $model->userLog], true),
                    'active' => true,
                ],
                [
                    'label' => 'Comments',
                    'icon' => 'comment',
                    'badgeOptions' => ['label' => Post::getTotalItemCount($model->id)],
                    'content' => $this->widget('ext.comments.CommentsWidget', [
                        'parent_id' => $model->id,
                        'userData' => $this->userData,
                        'isPanel' => true
                            ], true),
                ],
                [
                    'label' => 'Timeline',
                    'id' => 'tabTimeline',
                    'icon' => 'whiteboard',
                    'content' => $this->renderPartial('//log/_timeline', ['model' => $model], true),
                ],
                [
                    'label' => 'Favorites',
                    'id' => 'tabFavorites',
                    'icon' => 'star',
                    'content' => $this->widget('booster.widgets.TbListView', array(
                        'dataProvider' => Favorite::GetUserFavorites($model->id),
                        'itemView' => '//favorite/_superview',
                            ), true),
                ],
            ]]
        );
        ?>
    </div>
    <div class="panel-footer">
    </div>
</div>



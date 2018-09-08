<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "Edit this {$this->id}", 'url' => ['update', 'id' => $model->id]],
    ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",],
);
$this->menu[] = Favorite::GetMyFavoriteButton($model->id);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="fa fa-ticket" data-toggle="tooltip" data-placement="right" data-original-title="Phlebas the Phoenician, a fortnight dead,
                  Forgot the cry of gulls, and the deep sea swell
                  And the profit and loss.
                  -T. S. Eliot"></span>
            &nbsp;Viewing <?= ucwords(str_replace('_', ' ', $model->class_name)); ?>: <?= $model->title; ?> </h1>
    </div>
    <div class="panel-body">
        <div class="row" >
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>
        </div>
        <br>
        <p><b><?= CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
            <?= CHtml::encode($model->status); ?>
        </p>
        <p>
            <b>Reporter:</b>
            <?= CHtml::encode($model->person->title); ?>
            <?php
            if ($model->person_id == Yii::app()->user->id && $model->status !== 'Closed') {
                #echo '<a class="btn btn-success " href="#" role="button">Mark bug as fixed!</a>';
                echo CHtml::link('Mark bug as fixed', array('ticket/fix', 'id' => $model->id, 'fixed' => true), array('class' => 'btn btn-success'));
                echo '&nbsp;';
                echo CHtml::link('Mark bug as NOT fixed', array('ticket/fix', 'id' => $model->id, 'fixed' => FALSE), array('class' => 'btn btn-danger'));
            }
            ?>
        </p>
        <p>
            <b><?= CHtml::encode($model->getAttributeLabel('created_stamp')); ?>:</b>
            <?= CHtml::encode($model->HumanStamp); ?>
        </p>
        <p>
            <b><?= CHtml::encode($model->getAttributeLabel('modified_stamp')); ?>:</b>
            <?= CHtml::encode($model->modifiedHumanStamp); ?>
        </p>
        <p><b><?= CHtml::encode($model->getAttributeLabel('url')); ?>:</b>
            <?= CHtml::link(CHtml::encode($model->url), $model->url); ?>
        </p>
        <p><b><?= CHtml::encode($model->getAttributeLabel('browser')); ?>:</b>
            <?= CHtml::encode($model->browser); ?>
        </p>
        <p><b><?= CHtml::encode($model->getAttributeLabel('description')); ?>:</b>
            <?= CHtml::encode($model->description); ?>
        </p>
        <?php
        $this->widget(
                'ext.yiibooster.widgets.TbTabs', [
            'type' => 'tabs', // 'tabs' or 'pills'
            'placement' => 'top',
            'tabs' => [
                [
                    'label' => 'Comments',
                    'icon' => 'comment',
                    'badgeOptions' => ['label' => Post::getTotalItemCount($model->id)],
                    'content' => $this->widget('ext.comments.CommentsWidget', [
                        'parent_id' => $model->id,
                        'userData' => $this->userData,
                        'isPanel' => true
                            ], true),
                    'active' => true,
                ],
                [
                    'label' => 'Activity', 'icon' => 'list-alt',
                    #'content' => $this->renderPartial('_list', ['dataProvider' => $projectsProvider,), true),
                    'badgeOptions' => ['label' => $model->log->getTotalItemCount($model->id)],
                    'content' => $this->renderPartial('//log/_log', ['dataProvider' => $model->log], true),
                ],
            ]]
        );
        ?>
    </div>
</div>



<?php ?>

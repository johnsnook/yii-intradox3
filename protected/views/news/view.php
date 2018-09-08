<?php
require_once Yii::app()->basePath . '/vendor/deleteCode.php';

$this->menu = array(
    ['label' => "All {$this->id}s", 'url' => ['index']],
    ['label' => "View ths {$this->id}", 'url' => ['view', 'id' => $model->id]],
    ['label' => "Edit this {$this->id}", 'url' => ['update', 'id' => $model->id]],
    ['label' => "Delete this {$this->id}", 'url' => "javascript:del('{$this->id}',{$model->id})",],
);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-<?= $model->glyph ?>"></span>
            <span class="pull-right" >Viewing <?= ucfirst($this->id) . ': ' . $model->title; ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <div class="media">
            <a class="pull-left" href="<?= $this->createUrl('person/view', ['id' => $model->person_id]) ?>"><center>
                    <img  src="<?= $model->person->avatarUrl ?>" class="media-object"  height="96" width="96" alt="commenter avatar" />
                    <?= CHtml::encode($model->person->title); ?></center>
            </a>
            <div class="media-body">
                <div class="media-heading">
                    <h2><?= CHtml::encode($model->title); ?></h2>Posted on <?= CHtml::encode($model->created_on); ?>
                </div>
                <?= $model->description ?>
            </div>
            <div class="media-bottom"><?php
                if (Yii::app()->user->id === $model->person_id) {
                    $this->widget('booster.widgets.TbButton', array(
                        'buttonType' => 'link',
                        'url' => $this->createUrl('news/update', ['id' => $model->id]),
                        'icon' => 'edit',
                        'label' => 'Edit',
                    ));
                }
                ?></div>
        </div>
        <?php
        $this->widget('ext.comments.CommentsWidget', [
            'parent_id' => $model->id,
            'userData' => $this->userData,
            'isPanel' => false
        ]);
        ?>
    </div>
    <div class="panel-footer">
        <div class="form-actions" style="display: block; height: 50px;">
            <?php
            $this->widget('booster.widgets.TbButtonGroup', [
                'buttonType' => 'link',
                'htmlOptions' => ['class' => 'pull-left'],
                'buttons' => $this->menu,
            ]);
            ?>


        </div>
    </div>
</div>



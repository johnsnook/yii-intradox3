<div class="media">

    <div class="media-body">
        <div class="media-heading"><a class="pull-left " href="<?= $this->createUrl('person/view', ['id' => $data->person_id]) ?>" style="margin-right: 15px; border: 1px solid #999"><center>
                    <img  src="<?= $data->person->avatarUrl ?>" class="media-object"  height="96" width="96" alt="commenter avatar" />
                    <?= CHtml::encode($data->person->title); ?></center>
            </a>
            <h2><?= CHtml::encode($data->title); ?></h2>Posted on <?= date("F jS, Y", strtotime($data->created_on)); ?>
        </div>
        <?= $data->description ?>
    </div>
    <div class="media-bottom"><?php
        if (Yii::app()->user->id === $data->person_id) {
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'link',
                'url' => $this->createUrl('news/update', ['id' => $data->id]),
                'icon' => 'edit',
                'label' => 'Edit',
            ));
        }
        ?></div>
</div>
<?php
$this->widget('ext.comments.CommentsWidget', [
    'parent_id' => $data->id,
    'userData' => $this->userData,
    'isPanel' => false
]);
?>
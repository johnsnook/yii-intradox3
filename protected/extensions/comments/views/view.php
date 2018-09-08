<?php
/** @var $superModel Super */
/** @var $this CommentWidget */
?>
<script>
    var gU = <?= Yii::app()->user->id ?>;
    var gIsA = <?= $this->userData->userlevel === ROLE_ADMIN ? 'true' : 'false' ?>;
    $(document).ready(function () {
        //alert(theComments[0].title);
        commentWidget_<?= $superModel->id; ?> = comments(<?= $superModel->id; ?>);
        //renderComments(theComments);
    });
</script>
<?php
$widget = "commentWidget_$superModel->id";
?>
<div id="comments" <?= $this->isPanel ? 'class="panel panel-default tab-panel"' : 'class="row" style="padding:20px"' ?>>
    <h4>Comments for <?= $superModel->class_name ?>: <?= $superModel->title ?></h4>
    <?php
    $this->widget('booster.widgets.TbButton', [
        'label' => 'Add a Comment',
        'buttonType' => 'link',
        'context' => 'success',
        'url' => "javascript:showForm({$superModel->id})",
        'icon' => 'comment',
        'size' => 'small',
    ]);
    ?>
    <div class="panel-body media-body" id="comment-<?= $superModel->id; ?>">
    </div>
</div>
<div id="blank" class="media" style="visibility: hidden">
    <a class="pull-left" href="#">
        <img src="/images/avatars/uglybabby.jpg" class="media-object"  height="48" width="48" alt="commenter avatar" />
    </a>
    <div class="media-body">
        <div class="media-heading">
            <div >
                <?php
                $this->widget('booster.widgets.TbButton', [
                    'label' => 'Reply',
                    'id' => 'btnReply',
                    'buttonType' => 'link',
                    'url' => "javascript:showForm({$superModel->id})",
                    'icon' => 'fa fa-reply',
                    'size' => 'extra_small',
                ]);
                $this->widget('booster.widgets.TbButton', [
                    'label' => 'Delete',
                    'id' => 'btnDelete',
                    'buttonType' => 'link',
                    'url' => "javascript:deleteComment()",
                    'icon' => 'remove-circle',
                    'size' => 'extra_small',
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
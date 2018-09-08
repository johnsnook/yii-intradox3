<?php
/** @var $parent_id integer */
?>
<script language="javascript" type="text/javascript">
    var gWhere = 0;
    var gParent_id = <?= $parent_id; ?>;
    var theComments = <?= Post::CommentsJSON($parent_id); ?>;
    var userid = <?= Yii::app()->user->id ?>;
    var isAdmin = <?= $this->userData->userlevel === ROLE_ADMIN ? 'true' : 'false' ?>;
    $(document).ready(function () {
        //alert(theComments[0].title);
        renderComments(theComments);
    });
    function renderComments(data)
    {
        $('#comment-' + gParent_id).html('');
        $.each(data, function (i, post) {
            $newb = $('#blank').clone();
            $newb.attr('id', null).attr('style', null);
//            if (post.avatar === null)
//                post.avatar = 'uglybabby.jpg'

            if (post.person_id === <?= Yii::app()->user->id ?>)
                post.person_name = 'You';

            $('.media-heading', $newb).append(post.person_name + ' commented ' + post.age + (post.age !== '' ? ' ago.' : 'now.'));
            $('img.media-object', $newb).attr('src', post.avatar);
            $('.media-body', $newb).append(post.is_deleted ? '[deleted]' : post.notes).attr('id', 'comment-' + post.id);
            if (!post.is_deleted) {
                $('#btnReply', $newb).attr('href', 'javascript:showForm(' + post.id + ');');
                if (userid == post.person_id || isAdmin)
                    $('#btnDelete', $newb).attr('href', 'javascript:deleteComment(' + post.id + ');');
                else
                    $('#btnDelete', $newb).remove();

            } else
            {
                $('a.btn', $newb).remove();
            }
            // append it to its momma
            $('#comment-' + post.super_id).append($newb);

        });
    }

    function postCreate() {
        //alert($("#post-form").serialize());
        $.ajax({
            type: 'POST',
            url: 'index.php?r=post/ajaxCreate',
            data: $("#post-form").serialize(),
            success: postCreateSuccess,
            dataType: "json"
        });
    }

    function postCreateSuccess(data) {
        //we don't need the form anymore, so hide it
        $('#comments form#post-form').remove();
        if (data.success == 'true')
        {
            // I guess just reload the whole shebang
            $('#comment-' + gParent_id).html('');
            $.ajax({
                type: 'GET',
                url: 'index.php?r=post/findPosts',
                data: {super_id: gParent_id},
                success: renderComments,
                dataType: "json"
            });
        } else
            $('#comments-' + gParent_id).html(data.error);
    }

    function showForm(where) {
        gWhere = where;
        // remove any previous forms
        $('#comments #formPost').remove();
        $.ajax({
            type: 'GET',
            url: 'index.php?r=post/commentForm',
            data: {super_id: where},
            success: function (result) {
                if ($('#comment-' + gWhere + ' div.media:first')[0])
                    $(result).insertBefore('#comment-' + gWhere + ' div.media:first');
                else
                    $('#comment-' + gWhere).append(result);
            },
            dataType: "html"
        });
    }

    function deleteComment(post_id) {
        $.ajax({
            'type': 'GET',
            url: 'index.php?r=post/delete&ajax=true',
            data: {
                ajax: true,
                id: post_id,
                super_id: gParent_id
            },
            success: function (result) {
                theComments = result;
                renderComments(theComments);
            },
            dataType: "json"
        })
    }
</script>
<?php
$s = Super::model()->findByPk($parent_id);
?>
<div id="comments" class="panel panel-default tab-panel">
    <h4>Comments for <?= $s->class_name ?>: <?= $s->title ?></h4>
    <div class="pull-right">
        <?php
        $this->widget('booster.widgets.TbButton', [
            'label' => 'Comment',
            'buttonType' => 'link',
            'url' => "javascript:showForm({$parent_id})",
            'icon' => 'comment',
            'size' => 'extra_small',
        ]);
        ?>
    </div>


    <div class="panel-body media-body" id="comment-<?= $parent_id; ?>"> 
    </div>
</div>

<div id="blank" class="media" style="visibility: hidden">
    <a class="pull-left" href="#">
        <img src="/images/avatars/uglybabby.jpg" class="media-object"  height="48" width="48" alt="commenter avatar" />
    </a>
    <div class="media-body">
        <div class="media-heading">
            <div class="pull-right">
                <?php
                $this->widget('booster.widgets.TbButton', [
                    'label' => 'Reply',
                    'id' => 'btnReply',
                    'buttonType' => 'link',
                    'url' => "javascript:showForm({$parent_id})",
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
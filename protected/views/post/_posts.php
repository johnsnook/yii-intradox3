<?php
/* @var $parent_id integer */
?>
<style>
    .indented
    {
        margin-left: 30px;
        margin-top: 5px;
        margin-right: 3px;
        border-right: 0px;
    }
</style>
<script language="javascript" type="text/javascript">
    var gWhere = 0;
    var gParent_id = <?= $parent_id; ?>;

    $(document).ready(function () {

        var theComments = <?= Post::CommentsJSON($parent_id); ?>;
        //alert(theComments[0].title);
        renderComments(theComments);
    });
    function renderComments(data)
    {
        $.each(data, function (i, post) {
            $newb = $('#blank').clone();
            $newb.attr('id', null).attr('style', null);
            if (post.avatar === null)
                post.avatar = 'uglybabby.jpg'

            if (post.person_id === <?= Yii::app()->user->id ?>)
                post.person_name = 'You';

            $('.media-heading', $newb).append(post.person_name + ' commented ' + post.age + (post.age !== '' ? ' ago.' : 'now.'));
            $('img.media-object', $newb).attr('src', 'images/avatars/' + post.avatar);
            $('.media-body', $newb).append(post.notes).attr('id', 'comment-' + post.id);
            $('.media-heading a.btn', $newb).attr('href', 'javascript:showForm(' + post.id + ');');
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
        $('#comments form#post-form').remove();
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
</script>
<div id="comments" class="">
    <div class=" media-body" id="comment-<?= $parent_id; ?>">
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
                    'label' => 'reply',
                    'buttonType' => 'link',
                    'url' => "javascript:showForm({$parent_id})",
                    'icon' => 'fa fa-reply',
                    'size' => 'extra_small',
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
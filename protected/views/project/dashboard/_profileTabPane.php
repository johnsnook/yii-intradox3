<div class="panel panel-default" style="border-top: 0px; padding: 20px">
    <?php
    echo '<br/>';
    $this->widget('booster.widgets.TbButton', [
        'label' => 'Edit your profile',
        'context' => 'primary',
        'icon' => 'edit',
        'buttonType' => 'link',
        'url' => $this->createUrl('yourself/update', ['id' => Yii::app()->user->id]),
    ]);
    echo '<hr/>';

    $this->widget('booster.widgets.TbDetailView', [
        'data' => $this->userData,
        'type' => 'condensed',
        'attributes' => [
            'title',
            'username',
            'userlevel',
            'email',
            'phone',
            'podName',
            'job_title',
            'themeName',
            'list_pagination'
        ],
    ]);
    ?>
</div>
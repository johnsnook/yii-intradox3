<?php
$this->menu = array(
    array('label' => 'Update your profile', 'icon' => 'edit', 'url' => array('update', 'id' => $model->id)),
);
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-eye-open"></span>
            <span class="pull-right" >Viewing <?= ucfirst($this->id) . ': ' . $model->title; ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <div class="col-lg-8">
            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'type' => 'condensed',
                'attributes' => array(
                    'title',
                    'username',
                    'userlevel',
                    'email',
                    'phone',
                    'podName',
                    'job_title',
                    'themeName',
                    'list_pagination',
                    'file_size',
                    'font_size',
                ),
            ));
            ?>
        </div>
        <div class="col-lg-4"><?php
            if ($model->avatar_id)
                echo '<img class src="{$model->avatarUrl}" alt="avatar" />';
            ?></div>
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
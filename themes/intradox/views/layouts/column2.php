<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class = "panel-heading">
                <h3 class = "panel-title">Actions</h3>
            </div>
            <div class = "panel-body">
                <?php
                $this->widget('booster.widgets.TbMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'sidebar'),
                ));
                ?>
            </div>
        </div>
    </div><!-- sidebar span3 -->
    <div class="col-md-9">
        <div class="content">
            <div class="row">
                <div class="col-md-11 opaque " style="padding-bottom: 40px;">
                    <?php
                    echo $content;
                    ?>
                </div>
                <div class="col-md-1" ></div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>

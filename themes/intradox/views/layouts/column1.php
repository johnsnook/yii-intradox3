<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid" >
    <div class="col-md-12">
        <div class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 ">
                    <?php
                    echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>
<?php
/* @var $this DefaultController */
?>
<div class="panel panel-roundy">
    <div class="panel-heading">
        <h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
    </div>
    <div class="panel-body">
        <p>
            This is the view content for action "<?php echo $this->action->id; ?>".
            The action belongs to the controller "<?php echo get_class($this); ?>"
            in the "<?php echo $this->module->id; ?>" module.
        </p>
        <p>
            You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
        </p>
    </div></div>
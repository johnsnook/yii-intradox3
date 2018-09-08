<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Error <?= $code; ?></h1>
    </div>
    <div class="panel-body">
        <div class="">
            <?= $message; ?>
            <br/>At line <?= "$line in $file"; ?> 
            <pre><code><?= "$source"; ?> </code></pre>
            <pre><code><?= "$trace"; ?> </code></pre>
            <!--?= CHtml::encode($message); ?-->
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>
<h2></h2>


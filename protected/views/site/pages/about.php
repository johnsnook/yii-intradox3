<?php
/* @var $this SiteController */
$this->layout = '//layouts/small';

$this->pageTitle = Yii::app()->name . ' - About';
?>

<div class="panel panel-info panel-roundy">
    <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-info-sign">&nbsp;About</span></h2>
    </div>

    <div class="panel-body"><p>Welcome to the third incarnation of NewFields IntraDox.
            This software was originally designed by spousal unit Marjorie & John Snook in 2004, makers of the Calliope &amp; Beatrix.
            The burden of success prompted a complete re-write from the ground up, incorporating new requests and lessons, while still hewing true to the philosophy of simplicity.
        </p>
        <p>Users should be able to identify sought projects and documents as quickly and painlessly as possible.  To that end, we are (finally) incorporating <a href="http://sphinxsearch.com/docs/latest/index.html" target="_blank">full text searching</a> as well as the ability to bookmark an object by designating it a 'favorite' as well as other improvements.</p>
        <p>Marj, you're good at writing this kind of drivel, could you send me some copy to replace or whatevs?  Love you.</p></div>
    <div class="panel-footer">© 2004-<?= date("Y") ?>+ <a href="http://newfields.com" target="_blank">Newfields</a> Knowledge Management & <a href="mailto:jsnook@gmail.com">John Snook</a> Consulting.</div>

</div>






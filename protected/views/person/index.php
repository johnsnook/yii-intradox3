<?php
/* @var $this PersonController */
/* @var $model CActiveRecord */
?>
<?php
$this->layout = 'column1';
?>
<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-heart" data-toggle="tooltip" data-placement="right" data-original-title="This love is silent. -T. S. Eliot"></span>&nbsp;<?= $this->route . ': ' . $model->title; ?>
        </h1>
    </div>
    <div class="panel-body" >
        <?php echo CHtml::form(Yii::app()->createUrl('person/index'), 'get') ?>
        <input type="search" placeholder="search" name="q" value="<?= isset($_GET['q']) ? CHtml::encode($_GET['q']) : ''; ?>" />
        <input type="submit" value="search" />
        <?php echo CHtml::endForm() ?>
        <?php
        $this->widget('booster.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'template' => '<p>{summary}</p><p>{items}</p><p>{pager}</p>'
        ));
        ?>
    </div>
</div>

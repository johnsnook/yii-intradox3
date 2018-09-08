<?php
$this->breadcrumbs = array(
    'Document Searches' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List DocumentSearch', 'url' => array('index')),
    array('label' => 'Create DocumentSearch', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('document-search-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Document Searches</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'document-search-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'person_id',
        'search_title',
        'title',
        'project_id',
        /*
          'filename',
          'corporate_author',
          'topic',
          'type',
          'catalog_number',
          'page_count',
          'bates_start',
          'bates_end',
          'notes',
          'restricted',
          'received_date',
          'original_date',
          'full_text',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>

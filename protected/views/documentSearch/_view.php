<div class="view">



    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('query')); ?>:</b>
    <?php echo CHtml::encode($data->query); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
    <?php
    $p = Project::model()->findByPk($data->project_id);
    echo CHtml::encode($p->title);
    ?>
    <br />
    <hr/>

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('corporate_author')); ?>:</b>
      <?php echo CHtml::encode($data->corporate_author); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('topic')); ?>:</b>
      <?php echo CHtml::encode($data->topic); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
      <?php echo CHtml::encode($data->type); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('catalog_number')); ?>:</b>
      <?php echo CHtml::encode($data->catalog_number); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('page_count')); ?>:</b>
      <?php echo CHtml::encode($data->page_count); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('bates_start')); ?>:</b>
      <?php echo CHtml::encode($data->bates_start); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('bates_end')); ?>:</b>
      <?php echo CHtml::encode($data->bates_end); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
      <?php echo CHtml::encode($data->notes); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('restricted')); ?>:</b>
      <?php echo CHtml::encode($data->restricted); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('received_date')); ?>:</b>
      <?php echo CHtml::encode($data->received_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('original_date')); ?>:</b>
      <?php echo CHtml::encode($data->original_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('full_text')); ?>:</b>
      <?php echo CHtml::encode($data->full_text); ?>
      <br />

     */ ?>

</div>
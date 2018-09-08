<div class="view">
    <?php
    echo CHtml::link(CHtml::encode($data->title), array('document/view', 'id' => $data->id));

    if (!is_null($data->corporate_author)) {
        echo ' by ' . CHtml::encode($data->corporate_author);
    }

    if (!is_null($data->file_extension)) {
        $fileicon = 'flaticon flaticon-' . $data->file_extension;
        $this->widget('booster.widgets.TbButton', array(
            'icon' => $data->glyph,
            'size' => 'small',
            'context' => 'link',
            'htmlOptions' => array(
                'href' => 'index.php?r=document/download&id=' . $data->id,
                'target' => '_blank'),
        ));
    }
    ?>
</div>
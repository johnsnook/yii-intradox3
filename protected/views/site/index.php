<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>



<?php
$this->beginWidget(
        'booster.widgets.TbJumbotron', array(
    'heading' => 'Welcome to ' . CHtml::encode(Yii::app()->name) . '!',
        )
);
$admin = '<a href="mailto:' . Yii::app()->params['adminEmail'] . '">the administrator</a>';
?>

<p>Intradox is a project-specific document management system that combines human indexing with full-text search.
</p>

<p>Intradox allows users to retrieve certain segments of the project file and sort results in whatever way is most useful. It also offers a simple but powerful full text search with advanced tools such as field searching, truncation, and proximity operators.
</p>

<p>Intradox was designed to be intuitive and simple, but training is available. Contact <?= $admin ?> with questions. A tip sheet detailing advanced fulltext searching features is available here: <link>
</p>
<p><?php
    $this->widget(
            'booster.widgets.TbButton', [
        'buttonType' => 'link',
        'url' => $this->createUrl('site/login'),
        'context' => 'primary',
        'size' => 'large',
        'label' => 'Newfields users login',
    ]);
    echo '&nbsp;';
    $this->widget(
            'booster.widgets.TbButton', [
        'buttonType' => 'link',
        'url' => $this->createUrl('page', ['view' => 'about']),
        #'context' => 'primary',
        'size' => 'large',
        'label' => 'Learn more',
    ]);
    ?></p>

<?php $this->endWidget(); ?>




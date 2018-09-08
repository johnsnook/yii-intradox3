<?php
/* @var $this ProjectController */
/* @var $model CActiveRecord */
?>
<?php
$this->setPageTitle(Yii::app()->name . " - {$model->title} Duplication Services");



//      Yii::app()->end();
?>
<div class="row panel">
    <div class = "col-md-6" > <h1 > Project: <?= $model->title; ?> </h1>
        <?php
        echo "Duplicating " . $model->title . "<br/>";
        $oldid = $model->id;

        $model->id = null;
        $model->title = $model->title . " [duplicate]";
        $model->isNewRecord = true;
        if ($model->save(FALSE)) {
            echo "Success<br/>";
            $newid = $model->id;
            foreach (Document::model()->findAllByAttributes(['project_id' => $oldid]) as $doc) {
                echo "Duplicating " . $doc->title . '...';
                $oldpath = $doc->getFilePath();
                $doc->id = null;
                $doc->isNewRecord = true;
                $doc->project_id = $newid;

                if ($doc->save(FALSE)) {
                    echo 'success!<br/>';

                    if (!is_null($oldpath)) {
                        $newpath = $doc->getFilePath();
                        copy($oldpath, $newpath);
                    }
                } else
                    echo "fail.";
            }

            //duplicated
            //$this->redirect(["Document/Index", "project_id" => $newid]);
            echo $this->createUrl("Document/Index", ["project_id" => $newid]);
        } else {
            echo "Failure<br/>";
        }
        ?>
    </div>
    <div class = "col-md-6" >
        <?php
        $this->widget('booster.widgets.TbMenu', array(
            'type' => 'pills',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => $this->menu,
        ));
        ?>
    </div>
</div>
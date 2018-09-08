<?php
/** @var $this SiteController */
/** @var $person_id integer */
/**
 * @todo I should not be doing this here, move to controller
 */
//$model = Ticket::model()->findByAttributes(array('status' => "Ready for retesting", 'person_id' => $person_id));
$criteria = new CDbCriteria;
$criteria->compare('status', "Ready for retesting");
$criteria->compare('person_id', $person_id);

$dp = new CActiveDataProvider('Ticket', array(
    'criteria' => $criteria,
        ));

if ($dp->totalItemCount > 0) {
    ?>

    <div class="panel panel-success"><div class="panel-body">
            <?php
            echo "You have $dp->totalItemCount tickets ready for retesting!";
            $this->widget('booster.widgets.TbListView', array(
                'dataProvider' => $dp,
                'itemView' => '//ticket/_viewLite',
                'template' => '<div class="row" style="text-align:left"><div class="col-md-8">{items}</div></div>'
            ));
            ?>
        </div></div>
            <?php
        }
        ?>
<?php //$this->endWidget();      ?>

<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $id
 * @property string $title
 * @property string $action
 * @property string $model
 * @property integer $super_id
 * @property integer $person_id
 * @property string $field
 * @property string $log_time
 * @property string $old_value
 * @property string $new_value
 *
 * The followings are the available model relations:
 * @property Person $person
 */
class Log extends CActiveRecord {

    public $glyph = 'tree-conifer';
    public $controllerName = 'log';

    /**
     * Build a description of the event from the data
     * @param integer $id The primary key of the log record
     * @return string A generated description of the activity
     */
    public function getDescription() {
        $this->findByPk($this->id);
        $who = Person::model()->findByPk($this->person_id);
        $what = Super::findChildByPk($this->super_id);
        $d = new DateTime(strtotime($this->log_time));
        $when = $d->format('F jS, Y h:i');
        $return = CHtml::link($who->title, array('person/view', 'id' => $this->person_id));

        switch ($this->action) {
            case 'CHANGE':
                if ($what) {
                    $return .= ' changed ' . $what->class_name . ': ' . CHtml::link($what->title, array($what->route . '/view', 'id' => $this->super_id));
                    $return .= ":$this->field from '$this->old_value' to '$this->new_value'";
                } else {
                    $return .= ' changed ' . $this->model . ': ' . $this->title;
                    $return .= " : $this->field from '$this->old_value' to '$this->new_value'";
                }
                break;
            case 'CREATE':
                if ($what)
                    $return .= ' created ' . $what->class_name . ': ' . CHtml::link($what->title, array($what->route . '/view', 'id' => $this->super_id));
                else
                    $return .= ' created ' . $this->model . ': ' . $this->title;

                break;
            case 'DELETE':
                $return .= ' deleted ' . $this->model . ': ';
                $return .= "'" . $this->old_value . "'";
                $return .= ' @ ' . $when;
                break;
            case 'VIEW':
                if ($what) {
                    $return .= ' viewed ' . $what->class_name . ':';
                    $return .= CHtml::link($what->title, array($what->route . '/view', 'id' => $this->super_id));
                } else
                    $return .= ' viewed ' . $this->model . ':' . $this->title;

                break;
        }
        $return .= ' @ ' . $when;
        return $return;
    }

    /**
     * Get list of this app users actions
     * @param string $model_type
     * @return CDataProvider
     */
    public function GetMyLog($model_type = NULL) {
        $criteria = new CDbCriteria;

        $criteria->compare('person_id', Yii::app()->user->id);
        $criteria->order = 'log_time DESC';


        if (isset($model_type))
            $criteria->compare('model', $model_type);

        return new CActiveDataProvider($this, array(
            'criteria' =>
            $criteria,
            'pagination'
            => Yii:: app()->getController()->userData->paginationParam,
        ));
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array
            (
            array('title', 'required'),
            array('super_id, person_id', 'numerical', 'integerOnly' => true),
            array('action, field, old_value, new_value', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, model, action, super_id, person_id, field, log_time, old_value, new_value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function

    relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'person' => array(self::BELONGS_TO
                , 'Person', 'person_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Description',
            'action' => 'Action',
            'super_id' => 'Super',
            'person_id' => 'Person',
            'field' => 'Field',
            'log_time' => 'Timestamp',
            'old_value' => 'Old Value',
            'new_value' => 'New Value',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {

        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('LOWER(title)', strtolower($this->title), true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('super_id', $this->super_id);
        $criteria->compare('person_id', $this->person_id);
        $criteria->compare('field', $this->field, true);
        $criteria->compare('log_time', $this->log_time);
        $criteria->compare('old_value', $this->old_value);
        $criteria->compare('new_value', $this->new_value);
        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => Yii::app()->getController()->userData->paginationParam,
        ]);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Log the static model class
     */ public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function GraphData($person_id = null, $action = null) {

        $where = ' WHERE log_time < now()';
        if (!is_null($person_id)) {
            $where .= ' AND  person_id = ' . $person_id;
        }
        //$where .= " AND (action = 'CREATE' OR action = 'CHANGE')";
        if (!is_null($action)) {
            $where = " AND action = '" . $action . '"';
        }
        $sql = "SELECT DISTINCT log_time::date as log_date,
            count(*) AS count
            FROM log
            {$where} AND date_part('year', log_time) BETWEEN 500 AND date_part('year', now())
            GROUP BY 1
            ORDER BY 1";
        $logdata = Yii::app()->db->createCommand($sql)->query()->readAll();
        $return = [];
        foreach ($logdata as $day) {
            $return[] = ['label' => $day['log_date'], 'data' => $day['count']];
        }
        return $return;
    }

}

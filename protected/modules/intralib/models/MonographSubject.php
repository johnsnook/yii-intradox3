<?php

/**
 * This is the model class for table "intralib.monograph_subject".
 *
 * The followings are the available columns in table 'intralib.monograph_subject':
 * @property integer $id
 * @property integer $monograph_id
 * @property integer $subject_id
 *
 * The followings are the available model relations:
 * @property Monograph $monograph
 * @property Subject $subject
 */
class MonographSubject extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'intralib.monograph_subject';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('monograph_id, subject_id', 'required'),
            array('monograph_id, subject_id', 'numerical', 'integerOnly' => true),
            ['monograph_id', 'uniqueCheck'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, monograph_id, subject_id', 'safe', 'on' => 'search'),
        );
    }

    public function uniqueCheck($attribute, $params) {
        $sql = "SELECT count(*) FROM " . $this->tableName() .
                " WHERE monograph_id = :mId AND " .
                "subject_id = :aId";
        $count = Yii::app()->db->createCommand($sql)->queryScalar([
            ':mId' => $this->monograph_id,
            ':aId' => $this->subject_id,
        ]);
        if ($count > 0) {
            $this->addError('monograph_id', "Relationship already exists");
            $this->addError('subject_id', "Relationship already exists");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'monograph' => array(self::BELONGS_TO, 'Monograph', 'monograph_id'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'monograph_id' => 'Monograph',
            'subject_id' => 'Subject',
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
        $criteria->compare('monograph_id', $this->monograph_id);
        $criteria->compare('subject_id', $this->subject_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MonographSubject the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

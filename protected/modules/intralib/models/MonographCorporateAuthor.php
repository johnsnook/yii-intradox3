<?php

/**
 * This is the model class for table "intralib.monograph_corporate_author".
 *
 * The followings are the available columns in table 'intralib.monograph_corporate_author':
 * @property integer $id
 * @property integer $monograph_id
 * @property integer $corporate_author_id
 *
 * The followings are the available model relations:
 * @property Monograph $monograph
 * @property CorporateAuthor $corporateAuthor
 */
class MonographCorporateAuthor extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'intralib.monograph_corporate_author';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('monograph_id, corporate_author_id', 'required'),
            array('monograph_id, corporate_author_id', 'numerical', 'integerOnly' => true),
            ['monograph_id', 'uniqueCheck'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, monograph_id, corporate_author_id', 'safe', 'on' => 'search'),
        );
    }

    public function uniqueCheck($attribute, $params) {
        $sql = "SELECT count(*) FROM " . $this->tableName() .
                " WHERE monograph_id = :mId AND " .
                "corporate_author_id = :aId";
        $count = Yii::app()->db->createCommand($sql)->queryScalar([
            ':mId' => $this->monograph_id,
            ':aId' => $this->corporate_author_id,
        ]);
        if ($count > 0) {
            $this->addError('monograph_id', "Relationship already exists");
            $this->addError('corporate_author_id', "Relationship already exists");
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
            'corporateAuthor' => array(self::BELONGS_TO, 'CorporateAuthor', 'corporate_author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'monograph_id' => 'Monograph',
            'corporate_author_id' => 'Corporate Author',
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
        $criteria->compare('corporate_author_id', $this->corporate_author_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MonographCorporateAuthor the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

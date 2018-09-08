<?php

/**
 * This is the model class for table "theme".
 *
 * The followings are the available columns in table 'theme':
 * @property integer $id
 * @property string $title

 * @property boolean $invert_nav
 * @property string $bootstrap_file
 */
class Theme extends Super {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'theme';
    }

    public function getGlyph() {
        return 'sunglasses';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, bootstrap_file', 'required'),
            array('invert_nav', 'boolean'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, bootstrap_file', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'bootstrap_file' => 'Bootstrap File',
            'invert_nav' => 'Invert the navbar',
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

        $criteria->compare('bootstrap_file', $this->bootstrap_file, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Theme the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

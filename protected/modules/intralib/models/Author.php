<?php

/**
 * This is the model class for table "intralib.author".
 *
 * The followings are the available columns in table 'intralib.author':
 * @property integer $id

 * @property string $title
 * @property integer $editor
 * @property string $notes
 *
 * The followings are the available model relations:
 * @property MonographAuthor[] $monographs
 */
class Author extends CActiveRecord {

    public $glyph = 'fa fa-user';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'intralib.author';
    }

    public function getMonographCount() {
        $sql = "SELECT count(*) FROM intralib.monograph_author WHERE author_id = :id";
        return Yii::app()->db->createCommand($sql)->queryScalar([':id' => $this->id]);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('editor', 'numerical', 'integerOnly' => true),
            array(' notes', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, editor, notes', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'monographs' => [self::MANY_MANY, 'Monograph', 'intralib.monograph_author(author_id, monograph_id)'],
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'editor' => 'Editor',
            'notes' => 'Notes',
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
        $criteria->compare('LOWER(editor)', strtolower($this->editor), true);
        $criteria->compare('notes', $this->notes, true);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => Yii::app()->getController()->userData->paginationParam,
        ]);
    }

    public function getMonographLinks() {
        $list = [];
        foreach ($this->monographs as $id => $m) {
            $list[] = CHtml::link($m->title, ['monograph/view', 'id' => $m->id]);
        }
        return implode('<br/><br/>', $list);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Author the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

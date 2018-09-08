<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $title
 * @property boolean $visible

 * @property integer $super_id
 * @property string $notes
 * @property integer $person_id
 * @property string $when
 *
 * The followings are the available model relations:
 * @property Super $super
 * @property Person $person
 */
class Post extends Super {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'post';
    }

    public function getGlyph() {
        return 'glyphicon glyphicon-comments';
    }

    public function behaviors() {
        return array(
            'softDelete' => array(
                'class' => 'application.behaviors.SoftDeleteBehavior'
            ),
        );
    }

    /**
     * @param integer $super_id the parent records primary key
     * @return integer the total number of comments attached to a super record
     */
    public static function getTotalItemCount($super_id) {
        return Yii::app()->db->createCommand("SELECT count(*) FROM intradox_findposts($super_id)")->queryScalar();
    }

    /**
     * @param integer $super_id the parent records primary key
     * @return string the parent and children posts in JSON format
     */
    public static function CommentsJSON($super_id) {
        $sql = 'SELECT * FROM intradox_findposts(:superId)';
        $dataProvider = new CSqlDataProvider($sql, [
            'params' => [':superId' => $super_id],
            'pagination' => false,
                ]
        );
        $theData = $dataProvider->getData();
        foreach ($theData as $key => $value) {
            $p = Person::model()->findByPk($value['person_id']);
            $theData[$key]['person_name'] = $p->title;
            $theData[$key]['avatar'] = $p->avatarUrl;
            $theData[$key]['age'] = Post::formatDateDiff(new DateTime($theData[$key]['when']));
        }
        return CJSON::encode($theData);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('notes, super_id, person_id', 'required'),
            array('super_id, person_id', 'numerical', 'integerOnly' => true),
            array('visible, notes', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, visible, super_id, notes, person_id, when', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'super' => [self::BELONGS_TO, 'Super', 'super_id'],
            'person' => [self::BELONGS_TO, 'Person', 'person_id'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'visible' => 'Visible',
            'super_id' => 'Super',
            'notes' => 'Comment',
            'person_id' => 'Person',
            'when' => 'When',
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
        $criteria->compare('visible', $this->visible);

        $criteria->compare('super_id', $this->super_id);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('person_id', $this->person_id);
        $criteria->compare('when', $this->when, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Post the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * A sweet interval formatting, will use the two biggest interval parts.
     * On small intervals, you get minutes and seconds.
     * On big intervals, you get months and days.
     * Only the two biggest parts are used.
     *
     * @param DateTime $start
     * @param DateTime|null $end
     * @return string
     */
    private static function formatDateDiff($start, $end = null) {
        if (!($start instanceof DateTime)) {
            $start = new DateTime($start);
        }

        if ($end === null) {
            $end = new DateTime();
        }

        if (!($end instanceof DateTime)) {
            $end = new DateTime($start);
        }

        $interval = $end->diff($start);
        $doPlural = function($nb, $str) {
            return $nb > 1 ? $str . 's' : $str;
        }; // adds plurals

        $format = array();
        if ($interval->y !== 0) {
            $format[] = "%y " . $doPlural($interval->y, "year");
        }
        if ($interval->m !== 0) {
            $format[] = "%m " . $doPlural($interval->m, "month");
        }
        if ($interval->d !== 0) {
            $format[] = "%d " . $doPlural($interval->d, "day");
        }
        if ($interval->h !== 0) {
            $format[] = "%h " . $doPlural($interval->h, "hour");
        }
        if ($interval->i !== 0) {
            $format[] = "%i " . $doPlural($interval->i, "minute");
        }
        if ($interval->s !== 0) {
            if (!count($format)) {
                return "less than a minute";
            } else {
                $format[] = "%s " . $doPlural($interval->s, "second");
            }
        }

        // We use the two biggest parts
        if (count($format) > 1) {
            $format = array_shift($format) . " and " . array_shift($format);
        } else {
            $format = array_pop($format);
        }

        // Prepend 'since ' or whatever you like
        return $interval->format($format);
    }

}

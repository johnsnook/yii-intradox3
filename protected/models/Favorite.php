<?php

/**
 * This is the model class for table "favorite".
 *
 * The followings are the available columns in table 'favorite':
 * @property integer $id
 * @property integer $person_id
 * @property integer $super_id
 * @property string $when
 *
 * The followings are the available model relations:
 * @property Super $super
 * @property Person $person
 */
class Favorite extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'favorite';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('person_id, super_id, when', 'required'),
            array('person_id, super_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
// @todo Please remove those attributes that should not be searched.
            array('id, person_id, super_id, when', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
        return array(
            'super' => array(self::BELONGS_TO, 'Super', 'super_id'),
            'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'person_id' => 'Person',
            'super_id' => 'Super',
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
        $criteria->compare('person_id', $this->person_id);
        $criteria->compare('super_id', $this->super_id);
        $criteria->compare('when', $this->when, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Get list of this app users favorites
     * @param string $model_type
     * @return CDataProvider
     */
    public static function GetUserFavorites($person_id, $model_type = NULL) {
        $controller = Yii::app()->getController();

        $criteria = new CDbCriteria;
        $criteria->select = 't.*';
        $criteria->join = 'INNER JOIN favorite f ON t.id = f.super_id';
        $criteria->condition = 'f.person_id = :personId ' . (!is_null($model_type) ? " AND t.class_name = '$model_type'" : '');
        $criteria->params = [':personId' => $person_id];

        $favs = new CActiveDataProvider('Super', array(
            'criteria' => $criteria,
            'pagination' => FALSE,
            'sort' => ['defaultOrder' => 'f.id DESC'],
        ));
        $favorites = [];
        foreach ($favs->getData() as $fav) {
            $favorites[] = Super::findChildByPk($fav->id);
        }
        //return $favorites;
        return new CArrayDataProvider($favorites, ['pagination' => false]);
    }

    /**
     * Get list of this app users favorites
     * @param integer $super_id
     * @return Array CButton array suitable for a button group
     */
    public static function GetMyFavoriteButton($super_id) {
        $uid = Yii::app()->user->id;
        $buttlabel = (Super::model()->isFavorite($super_id, $uid) ? 'Remove from' : 'Add to') . ' favorites';
        $butticon = (Super::model()->isFavorite($super_id, $uid) ? 'star' : 'star-empty');
        return [
            'htmlOptions' => ['id' => 'favoriteButton'],
            'label' => $buttlabel,
            'icon' => $butticon,
            'buttonType' => 'ajaxButton',
            'url' => "index.php?r=favorite/toggleFavorite&super_id=$super_id&person_id=$uid",
            'ajaxOptions' => [
                'type' => 'POST',
                'dataType' => 'json',
                'success' => "function (data) {
		var h = '';
		//console.log(data);
		if (data.is == true) {
			h = $('#favoriteButton > span').removeClass('glyphicon-star-empty').addClass('glyphicon-star')[0].outerHTML;
			$('#favoriteButton').html(h + ' Remove from' + ' favorites');
		}
		else
		{
			h = $('#favoriteButton > span').removeClass('glyphicon-star').addClass('glyphicon-star-empty')[0].outerHTML;
			$('#favoriteButton').html(h + ' Add to' + ' favorites');
		}
	}
"
            ],
        ];
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Favorite the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

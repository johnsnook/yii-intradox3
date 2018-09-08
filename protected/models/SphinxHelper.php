<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property string $title
 * @property string $ext
 * @property string $author
 * @property string $topic
 * @property string $type
 * @property string $catno
 * @property string $notes
 * @property date $date
 * @property string $text
 * @property string $bates_search
 */
class SphinxHelper extends CActiveRecord {

    public $searchFields = ['title', 'author', 'topic', 'type', 'notes', 'date', 'catno', 'text', 'bates_search'];
    public $bates_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'document';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['title, corporate_author, file_extension, topic, type,catalog_number, original_date, notes, full_text', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['title, corporate_author, file_extension, topic, type,catalog_number, original_date, bates_search, notes, full_text', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return [
            'title' => 'Title',
            'file_extension' => 'File Type',
            'corporate_author' => 'Author',
            'topic' => 'Topic',
            'type' => 'Type',
            'catalog_number' => 'Catalog Number',
            'original_date' => 'Original Date',
            'notes' => 'Notes',
            'full_text' => 'Full Document Text',
        ];
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Document the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

?>
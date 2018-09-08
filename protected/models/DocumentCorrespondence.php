<?php

/**
 * This is the model class for table "document_correspondence".
 *
 * The followings are the available columns in table 'document_correspondence':
 * @property integer $id
 * @property string $title

 * @property integer $project_id
 * @property string $file_extension
 * @property string $temp_file
 * @property string $corporate_author
 * @property string $topic
 * @property string $type
 * @property string $catalog_number
 * @property integer $page_count
 * @property string $bates_start
 * @property string $bates_end
 * @property string $notes
 * @property boolean $restricted
 * @property string $received_date
 * @property date $original_date
 * @property string $search_vector
 * @property string $full_text
 * @property string $recipient
 * @property string $personal_author

 *  * * The followings are the available model relations:
 * @property Project $project
 * @property Document[] $documents1
 * @property Document[] $documents2

 */
class DocumentCorrespondence extends Document {

    public $temp_file;

    public function getGlyph() {
        return 'glyphicon glyphicon-envelope';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'document_correspondence';
    }

    public function getRoute() {
        return 'document';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array_merge_recursive(parent::rules(), [
            ['title, recipient, personal_author', 'required'],
            ['project_id, page_count', 'numerical', 'integerOnly' => true],
            ['title, corporate_author, file_extension, topic, type, original_date,temp_file received_date,catalog_number,bates_start, bates_end, notes, full_text, restricted,recipient,personal_author', 'safe'],
            ['temp_file', 'file', 'allowEmpty' => true, 'maxSize' => 80000000,],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, title, project_id, corporate_author, topic, type, catalog_number, page_count, bates_start, bates_end, file_extension, orginal_date, notes,full_text, restricted,recipient,personal_author', 'safe', 'on' => 'search'],
        ]);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        $parent = parent::attributeLabels();
        $child = [
            'recipient' => "Recipient",
            'personal_author' => 'Personal Author'
        ];
        return array_merge($parent, $child);
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

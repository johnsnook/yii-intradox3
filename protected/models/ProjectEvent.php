<?php

/**
 * This is the model class for table "project_event".
 *
 * The followings are the available columns in table 'project_event':
 * @property integer $id
 * @property string $title

 * @property string $class_name
 * @property integer $project_id
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $type
 * @property string $contaminant
 * @property string $location
 * @property string $company
 * @property string $facility
 * @property Document[] $documents
 */
class ProjectEvent extends Super {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project_event';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, start_date, project_id', 'required'),
            array('project_id', 'numerical', 'integerOnly' => true),
            array('class_name, description, start_date, end_date, type, contaminant, location, company, facility', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, class_name, project_id, description, start_date, end_date, type, contaminant, company, facility', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return ['documents' => [self::MANY_MANY, 'Document', 'project_event_document(document_id, project_event_id)']];
    }

    public function attachDocuments($documents) {
        if (!is_array($documents))
            throw new Exception("Documents argument must be an Array");

        foreach ($documents as $document_id) {
            $sql = "INSERT INTO project_event_document (project_event_id, document_id) VALUES 
                ($this->id, $document_id)";
            Yii::app()->db->createCommand($sql)->execute();
        }
    }

    public function detachDocuments($documents) {
        if (!is_array($documents))
            throw new Exception("Documents argument must be an Array");

        foreach ($documents as $document_id) {
            $sql = "DELETE FROM project_event_document WHERE project_event_id = $this->id AND document_id = $document_id";
            Yii::app()->db->createCommand($sql)->execute();
        }
    }

    public function getRelatedDocumentIds() {
        $sql = "select document_id from project_event_document where project_event_id = $this->id";
        $relatedDocs = Yii::app()->db->createCommand($sql)->queryAll();
        $relatedDocs = SnookTools::array_column($relatedDocs, 'document_id');
        return $relatedDocs;
    }

    public function getRelatedDocumentStubs() {
        $sql = " select id, title from document where id in "
                . "(select document_id as doc from project_event_document where "
                . "project_event_id = $this->id ) order by title asc";
        $relatedDocs = Yii::app()->db->createCommand($sql)->queryAll();
        return $relatedDocs;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'class_name' => 'Class Name',
            'project_id' => 'Project',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'type' => 'Type',
            'contaminant' => 'Contaminant',
            'location' => 'Location',
            'company' => 'Company',
            'facility' => 'Facility',
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
        $criteria->compare('title', $this->title, true);

        $criteria->compare('class_name', $this->class_name, true);
        $criteria->compare('project_id', $this->project_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('contaminant', $this->contaminant, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('company', $this->company, true);
        $criteria->compare('facility', $this->facility, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Trim everything up, don't know why I have to do this shit, YII.
     *
     * @return boolean valid record
     */
    public function beforeSave() {
        if (parent::beforeSave()) {
            $this->title = trim($this->title);
            $this->type = trim($this->type);
            if (trim($this->end_date) == "") {
                $this->end_date = null;
            }
            if (trim($this->location) == "") {
                $this->location = null;
            }


            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

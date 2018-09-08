<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $title
 * @property boolean $archived
 * @property boolean $restricted
 * @property string $jobnumber
 * @property integer $document_count
 * @property integer $pod_id
 *
 * The followings are the available model relations:
 * @property Document[] $documents
 * @property ProjectPerson[] $projectPersons
 */
class Project extends Super {
    // Since 'super' is a table that other tables inherit from, this provides a false column which proved the class name of the child record
    /*
      public function getdocument_count() {
      if (isset($this->id))
      return Yii::app()->db->createCommand('SELECT count(*) FROM document d WHERE d.project_id =' . $this->id)->queryScalar();
      }
     *
     */

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project';
    }

    public function getGlyph() {
        return 'glyphicon glyphicon-folder-close';
    }

    public function behaviors() {
        return [
            // This behavior provides logging for this model
            'LoggableBehavior' => 'application.behaviors.LoggableBehavior',
            // helps with document to document relationship
            'CAdvancedArBehavior' => 'application.behaviors.CAdvancedArBehavior',
        ];
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['title', 'required'],
            ['pod_id', 'numerical', 'integerOnly' => true],
            ['archived, restricted, jobnumber', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, title, archived, restricted, jobnumber', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'pod' => [self::BELONGS_TO, 'Pod', 'pod_id'],
            'documents' => [self::HAS_MANY, 'Document', 'project_id'],
            'persons' => [self::MANY_MANY, 'Person', 'project_person(project_id, person_id)'],
        ];

        //Post has: 'categories'=>array(self::MANY_MANY, 'Category', 'tbl_post_category(post_id, category_id)')
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Project Title',
            'archived' => 'Archived',
            'restricted' => 'Restricted',
            'jobnumber' => 'Jobnumber',
            'document_count' => 'Documents',
            'pod_id' => 'Pod',
        ];
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
        $controller = Yii::app()->getController();

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('LOWER(title)', strtolower($this->title), true);

        $criteria->compare('archived', $this->archived);
        $criteria->compare('pod_id', $this->pod_id);
        $criteria->compare('restricted', $this->restricted);
        $criteria->compare('jobnumber', $this->jobnumber, true);

        $user = Person::model()->findByPk(Yii::app()->user->id);

        //if ($user->userlevel == ROLE_CLIENT || $user->userlevel == ROLE_USER) {
        $criteria->addCondition('t.restricted = false', 'AND');
        $criteria->addCondition('t.archived = false', 'AND');
        //}

        if ($user->userlevel == ROLE_CLIENT) {

            $criteria->join = "RIGHT JOIN project_person on project_person.project_id = t.id and project_person.person_id = :personId";
            $criteria->params = [':personId' => $user->id];
        }

        $projectsProvider = new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => $controller->userData->paginationParam,
        ]);
        $projectsProvider->sort->defaultOrder = 't.title ASC';
        return $projectsProvider;
    }

    public function afterSave() {
        parent::afterSave();
        if (!is_dir(Yii::app()->params['docs_path'] . $this->id))
            mkdir(Yii::app()->params['docs_path'] . $this->id);
        if (!is_dir(Yii::app()->params['thumbs_path'] . $this->id))
            mkdir(Yii::app()->params['thumbs_path'] . $this->id);
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            Document::model()->deleteAll('project_id = :pid', [':pid' => $this->id]);
            exec("rm -rf " . Yii::app()->params['docs_path'] . $this->id);
            exec("rm -rf " . Yii::app()->params['thumbs_path'] . $this->id);
            Log::model()->deleteAll('super_id= :pid', [':pid' => $this->id]);
            return true;
        } else
            return false;
    }

    public function PieData() {
        $sql = "SELECT DISTINCT title as label, document_count as data, id "
                . "FROM project WHERE document_count > 0 "
                . " ORDER BY data DESC";
        return Yii::app()->db->createCommand($sql)->query()->readAll();
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

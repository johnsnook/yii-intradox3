<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $id
 * @property string $title

 * @property string $username
 * @property string $password
 * @property integer $userlevel
 * @property string $email
 * @property string $phone
 * @property string $invitation_token
 * @property boolean $ldap it came from an ldap record, so editing is out.  unless...
 * @property integer $theme_id
 * @property integer $pod_id
 * @property integer $list_pagination
 * @property integer $font_size
 *
 * The followings are the available model relations:
 * @property Theme $theme
 * @property Project[] $projects
 * @property Favorite[] $favorites
 * @property Log[] $logs
 * @property Post[] $posts
 * @property Location $location
 */
class Person extends Super {

    public $temp_file;
    public $UserLevels = [
        1 => 'Guest',
        2 => 'User',
        3 => 'Admin'
    ];

    public function getGlyph() {
        return 'glyphicon glyphicon-user';
    }

    /**
     * Get list of this persons actions
     * @param string $model_type
     * @param aray $actions ['VIEW', 'CREATE', 'CHANGE', 'DELETE']
     * @return CDataProvider
     */
    public function getUserLog($model_type = NULL, $actions = NULL) {
        $criteria = new CDbCriteria;

        $criteria->compare('person_id', $this->id);
        $criteria->order = 'log_time DESC';

        if (isset($actions)) {
            foreach ($actions as $action) {
                $criteria->addCondition("action = '$action'", 'OR');
            }
        }
        if (isset($model_type))
            $criteria->compare('model', $model_type);


        return new CActiveDataProvider('Log', array(
            'criteria' => $criteria,
            'pagination' => Yii::app()->getController()->userData->paginationParam,
        ));
    }

    public function getUserRole() {
        return $this->UserLevels[$this->userlevel];
    }

    public function getPodName() {
        return $this->pod->title;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'person';
    }

    public function behaviors() {
        return [
            // This behavior provides logging for this model
            'LoggableBehavior' => [
                'class' => 'application.behaviors.LoggableBehavior',
                // we don't password or theme changes in the log
                'excludedAttributes' => ['theme_id', 'password']
            ],
            // helps with document to document relationship
            'CAdvancedArBehavior' => 'application.behaviors.CAdvancedArBehavior'];
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, username, email', 'required'),
            array('userlevel, list_pagination, theme_id, avatar_id, font_size', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 20),
            array('email', 'length', 'max' => 128),
            array('phone', 'length', 'max' => 30),
            array('password, account_manager, theme_id, avatar_id, list_pagination, font_size', 'safe'),
            array('email', 'email'),
            #array('phone', 'match', 'pattern' => '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title,  username, password, userlevel, email, phone, account_manager', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pod' => [self::BELONGS_TO, 'Pod', 'pod_id'],
            'theme' => array(self::HAS_ONE, 'Theme', 'id'),
            'avatar' => array(self::HAS_ONE, 'Avatar', 'id'),
            //'projects' => array(self::MANY_MANY, 'ProjectPerson', 'person_id'),
            'projects' => array(self::MANY_MANY, 'Project',
                'project_person(person_id, project_id)'),
            'favorites' => array(self::HAS_MANY, 'Favorite', 'person_id'),
            'logs' => array(self::HAS_MANY, 'Log', 'person_id'),
            'posts' => array(self::HAS_MANY, 'Post', 'person_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'avatar_id' => 'Avatar',
            'theme_id' => 'UI Theme',
            'title' => 'Full Name',
            'username' => 'Username',
            'password' => 'Password',
            'userlevel' => 'Userlevel',
            'userRole' => 'Role',
            'email' => 'Email',
            'podName' => 'Pod Name',
            'phone' => 'Phone',
            'account_manager' => 'Account Manager',
            'ldap' => 'It came from ldap',
            'list_pagination' => 'Page Size for list views',
            'font_size' => 'Font size percentage',
            'temp_file' => 'Custom Avatar',
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


        $criteria->compare('username', $this->username, true);
        $criteria->compare('userlevel', $this->userlevel);
        $criteria->compare('LOWER(email)', strtolower($this->email), true);
        $criteria->compare('LOWER(office)', strtolower($this->office), true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('account_manager', $this->account_manager);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Person the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function encrypt($value) {
        return md5($value);
    }

    public function getPaginationParam() {
        $return = false;
        $controller = Yii::app()->getController();
        if (isset($this->list_pagination))
            if ($this->list_pagination > 0)
                $return = ['pageSize' => $controller->userData->list_pagination,];

        return $return;
    }

    public function getTheme() {
        return Theme::model()->findByPk($this->theme_id);
    }

    public function getThemeName() {
        $t = Theme::model()->findByPk($this->theme_id);
        return $t->title;
    }

    public function getAvatarFilename() {
        $t = Avatar::model()->findByPk($this->avatar_id);
        return $t->filename;
    }

    public function getAvatarUrl() {
        $p = Yii::app()->getBaseUrl(true) . '/images/avatars/';
        if (!empty($this->file_extension)) {
            $p = Yii::app()->getBaseUrl(true) . '/images/thumbnails/avatars';
            $return = "{$p}/{$this->id}.{$this->file_extension}";
        } elseif (!is_null($this->avatar_id)) {
            $t = Avatar::model()->findByPk($this->avatar_id);
            $return = $p . $t->filename;
        } else
            $return = $p . 'uglybabby.jpg';

        return $return;
    }

    /**
     * We're using hashing to reduce load on the file system
     *
     * @param string $extension allows us to pass in an extension for new files
     * @return string The full path and file name
     */
    public function getFilePath($extension = null) {
        $p = dirname(Yii::app()->getBasePath()) . '/images/thumbnails/avatars';
        if (!file_exists($p))
            mkdir($p);

        if (is_null($extension))
            $extension = $this->file_extension;
        if (!is_null($extension) && strlen($extension)) {
            return "{$p}/{$this->id}.{$extension}";
        }

        return null;
    }

}

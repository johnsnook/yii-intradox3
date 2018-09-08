<?php

/**
 * This is the model class for table "pod".
 *
 * The followings are the available columns in table 'pod':
 * @property integer $id
 * @property string $title

 * @property string $members

 *
 * The followings are the available model relations:
 * @property Super $super
 * @property Person $person
 */
class Pod extends Super {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pod';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('title', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title', 'safe', 'on' => 'search'),
            ['title', 'unique'],
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                #'super' => array(self::BELONGS_TO, 'Super', 'super_id'),
                #'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'members' => 'Members',
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
        $criteria->compare('notes', $this->notes, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    static function getUserPod($username) {
        $sql = "SELECT id FROM pod WHERE '$username' = ANY(members)";
        $return = Yii::app()->db->createCommand($sql)->queryScalar();
        return $return == false ? null : $return;
    }

    static function syncPods() {
        echo "Syncing!\n";
        $options = Yii::app()->params['ldap'];
        $dc_string = "dc=" . implode(",dc=", $options['dc']);
        #$person = Person::model()->findByPk(Yii::app()->user->id);
        $connection = ldap_connect($options['host']);
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        $return = false;
        if ($connection) {
            $bind = @ldap_bind($connection, "uid=jsnook,ou={$options['ou']},{$dc_string}", "12Characters");
            if ($bind) {
                echo "bind success!\n";
                $filter = "objectClass=podObject";
                $result = ldap_search($connection, "ou={$options['ou']}, $dc_string", $filter);
                ldap_sort($connection, $result, "cn");
                $entries = ldap_get_entries($connection, $result);
                foreach ($entries as $entry) {
                    $return = true;
                    $title = $entry['cn'][0];
                    $podId = $entry['pod'][0];
                    #echo "{$title}: {$podId}\n";
                    $members = $entry['member'];
                    $count = $members['count'];
                    $users = '{';
                    for ($i = 0; $i < $count - 1; $i++) {
                        $users .= '"' . substr($members[$i], 4, strpos($members[$i], ',') - 4) . '",';
                        echo "\t" . substr($members[$i], 4, strpos($members[$i], ',') - 4) . "\n";
                    }
                    $users = substr($users, 0, strlen($users) - 1) . '}';
                    $pod = Pod::model()->findByAttributes(['title' => $title]);
                    if (!$pod)
                        $pod = new Pod ();
                    $pod->title = $title;
                    $pod->members = $users;
                    $pod->save();
                }
            }
            @ldap_close($connection);
        }
        return $return;
    }

    public function getMemberList() {
        $str = $this->members;
        $str = substr($str, 1, strlen($str) - 2);
        return explode(',', $str);
        #return json_decode($this->members);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pod the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

?>
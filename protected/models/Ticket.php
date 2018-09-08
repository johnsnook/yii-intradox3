<?php

/**
 * This is the model class for table "ticket".
 *
 * The followings are the available columns in table 'ticket':
 * @property integer $id
 * @property string $title
 * @property integer $person_id
 * @property string $status
 * @property string $url
 * @property string $description
 * @property string $created_stamp
 * @property string $modified_stamp
 *
 * The followings are the available model relations:
 * @property Person $person
 */
class Ticket extends Super {

	const TICKET_OPEN = 'Open';
	const TICKET_INPROGRESS = 'In-progress';
	const TICKET_RETEST = 'Ready for retesting';
	const TICKET_NOTFIXED = 'Not Fixed';
	const TICKET_CANTREPRODUCE = 'Unable to reproduce';
	const TICKET_CLOSED = 'Closed';

	public function behaviors() {
		return [
			// This behavior provides logging for this model
			'LoggableBehavior' => 'application.behaviors.LoggableBehavior',
			'ERememberFiltersBehavior' => array(
				'class' => 'application.components.ERememberFiltersBehavior',
				'defaults' => array(), /* optional line */
				'defaultStickOnClear' => false /* optional line */
			),
		];
	}

	public function afterSave() {
		parent::afterSave();
		$you = Yourself::getYou();
		$lyingWhore = Yii::app()->params['adminEmail'];
		$headers = //"From: $lyingWhore\r\n" .
				"Reply-To: $lyingWhore\r\n" .
				"CC: {$you->title} <{$you->email}>\n" .
				"MIME-Version: 1.0\r\n" .
				"Content-Type: text/html; charset=UTF-8";
		$url = Yii::app()->params['baseUrl'] . $this->url;
		$body = "<h2>Ticket: <a href=\"{$url}\">{$this->title}</a></h2>" . PHP_EOL
				. "Status {$this->status}<br>" . PHP_EOL
				. "Reported by " . $this->person->title . "<br>" . PHP_EOL
				. str_replace("\n", '<br>', $this->description);
		mail(Yii::app()->params['adminEmail'], "ID3 Ticket: {$this->title}", $body, $headers);
		Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
		$this->refresh();
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'ticket';
	}

	public function getGlyph() {
		return 'fa fa-ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,description', 'required'),
			array('person_id', 'numerical', 'integerOnly' => true),
			['title, description, status,url', 'safe'],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, status,url, created_stamp, modified_stamp', 'safe', 'on' => 'search'),
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
			'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Subject',
			'person_id' => 'Reporter',
			'url' => 'URL',
			'status' => 'Status',
			'description' => 'Description',
			'created_stamp' => 'Reported On',
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

		$criteria->compare('created_stamp::text', trim($this->created_stamp), true);
		$criteria->compare("modified_stamp::text", trim($this->modified_stamp), true);
		$criteria->compare('status', $this->status);
		$criteria->compare('person_id', $this->person_id);
		//$criteria->compare("date 'created_stamp'", trim($this->created_stamp), true);

		$fuck = new CActiveDataProvider($this, array(
			'pagination' => Yii:: app()->getController()->userData->paginationParam,
			'sort' => ['defaultOrder' => ' modified_stamp DESC '],
			'criteria' => $criteria,
		));
//        die('<pre>' . print_r($fuck, 224) . '</pre>');

		return $fuck;
	}

	public function getHumanStamp() {
		$d = new DateTime($this->created_stamp);
		return $d->format('F jS, Y h:i');
	}

	public function getModifiedHumanStamp() {
		$d = new DateTime($this->modified_stamp);
		return $d->format('F jS, Y h:i');
	}

	static function getUserTicket($username) {
		$sql = "SELECT id FROM ticket WHERE '$username' = ANY(members)";
		return Yii::app()->db->createCommand($sql)->queryScalar();
	}

	static function getStatusOptions() {
		return [
			Ticket::TICKET_OPEN => Ticket::TICKET_OPEN,
			Ticket::TICKET_INPROGRESS => Ticket::TICKET_INPROGRESS,
			Ticket::TICKET_RETEST => Ticket::TICKET_RETEST,
			Ticket::TICKET_NOTFIXED => Ticket::TICKET_NOTFIXED,
			Ticket::TICKET_CANTREPRODUCE => Ticket::TICKET_CANTREPRODUCE,
			Ticket::TICKET_CLOSED => Ticket::TICKET_CLOSED];
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ticket the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

}

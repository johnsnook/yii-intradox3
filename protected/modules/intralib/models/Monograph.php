<?php

/**
 * This is the model class for table "intralib.monograph".
 *
 * The followings are the available columns in table 'intralib.monograph':
 * @property integer $id
 * @property string $title
 * @property string $accession_number
 * @property string $call_number
 * @property string $series_title
 * @property string $year
 * @property string $pages
 * @property string $volumn_number
 * @property string $edition_number
 * @property string $binding
 * @property string $document_type
 * @property string $agency_number
 * @property string $location
 * @property string $notes
 * @property string $full_text
 * @property string $file_extension
 *
 * The followings are the available model relations:
 * @property MonographSubject[] $Subjects
 * @property MonographAuthor[] $Authors
 * @property MonographCorporateAuthor[] $corporateAuthors
 */
class Monograph extends CActiveRecord {

    public $temp_file;
    public $total_found;
    public $glyph = 'book';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'intralib.monograph';
    }

    public function behaviors() {
        return [
            // helps with document to document relationship
            'CAdvancedArBehavior' => 'application.behaviors.CAdvancedArBehavior'
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
            ['accession_number, call_number, series_title, year, pages, volumn_number, edition_number, binding, document_type, agency_number, location, notes, full_text, file_extension', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, title, accession_number, call_number, series_title, year, pages, volumn_number, edition_number, binding, document_type, agency_number, location, notes, full_text, file_extension', 'safe', 'on' => 'search'],
            ['temp_file', 'file', 'allowEmpty' => true, 'maxSize' => 80000000,],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'authors' => [self::MANY_MANY, 'Author', 'intralib.monograph_author(monograph_id, author_id)'],
            'corporateAuthors' => [self::MANY_MANY, 'CorporateAuthor', 'intralib.monograph_corporate_author(monograph_id, corporate_author_id)'],
            'subjects' => [self::MANY_MANY, 'Subject', 'intralib.monograph_subject(monograph_id, subject_id)'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'accession_number' => 'Accession Number',
            'call_number' => 'Call Number',
            'series_title' => 'Series Title',
            'year' => 'Year',
            'pages' => 'Pages',
            'volumn_number' => 'Volumn Number',
            'edition_number' => 'Edition Number',
            'binding' => 'Binding',
            'document_type' => 'Document Type',
            'agency_number' => 'Agency Number',
            'location' => 'Location',
            'notes' => 'Notes',
            'full_text' => 'Full Text',
            'file_extension' => 'File Extension',
            'filePath' => 'Electronic Document',
            'subjectTitles' => 'Subjects',
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
    public function search($query = '') {
        $controller = Yii::app()->getController();
        $return = null;

        if (strlen(trim($query))) {
            $return = new CActiveDataProvider('Monograph', [
                'criteria' => $this->searchDBCriteria($query),
                'sort' => ['defaultOrder' => $this->total_found ? 'weight desc' : 'id desc'],
                'pagination' => $controller->userData->paginationParam,
            ]);
        } else {
            $return = new CActiveDataProvider('Monograph', [
                'criteria' => $this->searchDBCriteria(''),
                'sort' => ['defaultOrder' => 'id desc'],
                'pagination' => $controller->userData->paginationParam,
            ]);
        }
        return $return;
    }

    /**
     * Provides the CDBCriteria object generated by a search request.  This was
     * moved to a seperate funcion to provide the same service that the grid uses
     * to other widgets, such as a timeline based on the data in the grid but
     * without the pagination
     *
     * @return CDBCriteria the criteria object typical of a search scenario
     */
    public function searchDBCriteria($query) {
        $this->total_found = null;
        $criteria = new CDbCriteria;


        if (strlen(trim($query))) {
            $query = addslashes($query);
            $s = new SphinxClient();
            if ($s->setServer("127.0.0.1", 9312) == false) {
                throw new Exception("Unable to connect to the Sphinx searchd service.  Please contact Marjorie.", $code);
                return null;
            }
            $s->SetLimits(0, 20000, 20000);
            $s->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
            $s->setMatchMode(SPH_MATCH_EXTENDED);

            $s->SetFieldWeights([
                "title" => 4,
                "corp" => 3,
                "subject" => 4,
                "author" => 3,
                "acc" => 2,
                "call" => 2,
                "notes" => 2,
                "year" => 2,
                "full_text" => 1
            ]);

            $result = $s->query($query, 'intralib');

            /* We run the query against Sphinx, it returns a list of document.ids
             * and we create a cdbcriteria object with those keys and join the
             * weights?  wtf is going on here i can't fucking remember thanks pot
             * 
             */

            if ($result !== false) {
                $this->total_found = $result['total_found'];
                if ($result !== false && $result['total'] > 0) {
                    $keys = array_keys($result['matches']);
                    $criteria->addInCondition('t.id', $keys);
                    $sWeight = "";
                    foreach ($keys as $key)
                        $sWeight .= "({$key}, {$result['matches'][$key]['weight']}),";
                    $sWeight = substr($sWeight, 0, strlen($sWeight) - 1);
                    $criteria->join = "JOIN (VALUES $sWeight) AS search(id,weight) ON t.id = search.id";
                }
            }
        }
        return $criteria;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Monograph the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getSubjectTitles() {
        $list = CHtml::listData($this->subjects, 'id', 'title');
        return implode(', ', $list);
    }

    public function getAuthorLinks() {
        $list = [];
        foreach ($this->authors as $id => $author) {
            $list[] = CHtml::link($author->title, ['author/view', 'id' => $author->id]);
        }
        return implode(', ', $list);
    }

    public function getCorporateAuthorLinks() {
        $list = [];
        foreach ($this->corporateAuthors as $id => $author) {
            $list[] = CHtml::link($author->title, ['corporateAuthor/view', 'id' => $author->id]);
        }
        return implode(', ', $list);
    }

    public function getSubjectLinks() {
        $list = [];
        foreach ($this->subjects as $id => $subject) {
            $list[] = CHtml::link($subject->title, ['subject/view', 'id' => $subject->id]);
        }
        return implode(', ', $list);
    }

    public function getSubjectQueryLinks() {
        $list = [];
        foreach ($this->subjects as $id => $subject) {
            $list[] = CHtml::link($subject->title, "javascript:AddToQuery('{$subject->title}');");
        }
        return implode(', ', $list);
    }

    public function getFileSize() {
        $file = $this->filePath;
        if (file_exists($file))
            return SnookTools::human_filesize(filesize($file));
        else
            return null;
    }

    /**
     * We're using hashing to reduce load on the file system
     *
     * @param string $extension allows us to pass in an extension for new files
     * @return string The full path and file name
     */
    public function getFilePath($extension = null) {
        $edocspath = Yii::app()->controller->module->edocsPath;
        if (is_null($extension))
            $extension = $this->file_extension;
        if (!is_null($extension) && strlen($extension)) {
            // get a zero padded hex string
            $f = substr("000000" . dechex($this->id), -6);
            $h = substr($f, 0, 3);
            $f = substr($f, -3, 3);
            // Make sure our hash directory exists inside the project directory
            if (!file_exists($edocspath . $h))
                mkdir($edocspath . $h);
            return "{$edocspath}{$h}/$f.{$extension}";
        } else
            return null;
    }

    public function getDownloadUrl() {
        return CHtml::link($this->title . '.' . $this->file_extension, ['monograph/download', 'id' => $this->id]);
    }

    public function readFileText() {
        $filepath = $this->filePath;
        $text = null;
        if (file_exists($filepath)) {
            switch ($this->file_extension) {
                case 'pdf':
                    $pi = pathinfo($filepath);
                    $textpath = "{$pi['dirname']}/{$pi['filename']}.txt";
                    $cmd = "pdftotext -q {$filepath}";
                    exec($cmd);
                    $text = @file_get_contents($textpath);
                    @unlink($textpath);
                    break;
                case 'doc':
                case 'docx':
                case 'xlsx':
                case 'pptx':
                    Yii::import('application.vendor.DocxConversion');

                    $dx = new DocxConversion($filepath);
                    $text = $dx->convertToText();
                    break;
                default:
            }
        }

        return $text;
    }

    /**
     * Custom function to return an array of distinct authors, topics or types
     * @param string $which the field name in which to search
     * @return Array list of distintct elements
     * @todo use params in CSqlDataProvider
     */
    public function lookupDistinctField($which) {
        $sql = "SELECT distinct $which FROM " . $this->tableName() . " WHERE $which IS NOT NULL ORDER BY $which ASC";
#error_log("SQL: $sql\n", 3, "/home/intrado1/public_html/my-errors.log");

        $dataProvider = new CSqlDataProvider($sql, ['pagination' => false]);
        $dataArray = $dataProvider->getData();
        $typeaheadArray = [];

        foreach ($dataArray as $data) {
            $typeaheadArray[] = CHtml::encode($data[$which]);
        }
        return $typeaheadArray;
    }

    /**
     * Custom function to return an array of distinct authors, topics or types
     * @param string $which the field name in which to search
     * @return Array list of distintct elements
     */
    public function lookupDistinctListOptions($which) {
        $sql = "SELECT distinct $which FROM " . $this->tableName() . " WHERE $which IS NOT NULL ORDER BY $which ASC";
#error_log("SQL: $sql\n", 3, "/home/intrado1/public_html/my-errors.log");

        $dataProvider = new CSqlDataProvider($sql, [
            'pagination' => false,
        ]);

        $dataArray = $dataProvider->getData();
        $typeaheadArray = [];

        foreach ($dataArray as $data) {
            $typeaheadArray[$data[$which]] = CHtml::encode($data[$which]);
        }
//error_log('$typeaheadArray:' . json_encode($typeaheadArray) . "\n", 3, "/home/intrado1/public_html/my-errors.log");
        return $typeaheadArray;
    }

}

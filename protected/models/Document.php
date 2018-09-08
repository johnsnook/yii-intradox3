<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
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
 * @property date $received_date
 * @property string $original_date
 * @property integer $original_date_y
 * @property integer $original_date_m
 * @property integer $original_date_d
 * @property string $search_vector
 * @property string $full_text


 *  * * The followings are the available model relations:
 * @property Project $project
 * @property Document[] $documents1
 * @property Document[] $documents2

 */
class Document extends Super {

    public $original_date_y;
    public $original_date_m;
    public $original_date_d;
    public $temp_file;
    public $search;
    public $searchFields = ['title', 'corporate_author', 'topic', 'type', 'notes', 'original_date', 'catalog_number', 'full_text'];
    public $sphinxAliases = ['title' => 'title', 'corporate_author' => 'author', 'topic' => 'topic', 'type' => 'type', 'notes' => 'notes', 'original_date' => 'date', 'catalog_number' => 'catno', 'full_text' => 'text'];
    public $label;
    public $data;
    public $total_found;
    public $bates_search;

    public function getDocuments() {
        return array_merge($this->documents1, $this->documents2);
    }

    public function getRelatedDocumentStubs() {
        $sql = " select id, title from document where id in (select document_id_b as doc from document_document where document_id_a = $this->id UNION"
                . " select document_id_a as doc from document_document where document_id_b = {$this->id}) order by title asc";
        $relatedDocs = Yii::app()->db->createCommand($sql)->queryAll();
        return $relatedDocs;
    }

    public function getRelatedDocumentIds() {
        $sql = "select document_id_b as doc from document_document where document_id_a = $this->id UNION"
                . " select document_id_a as doc from document_document where document_id_b = $this->id";
        $relatedDocs = Yii::app()->db->createCommand($sql)->queryAll();
        $relatedDocs = SnookTools::array_column($relatedDocs, 'doc');
        return $relatedDocs;
    }

    public function getGlyph() {
        return 'glyphicon glyphicon-file';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'document';
    }

    public function behaviors() {
        return [
// This behavior provides logging for this model
            'LoggableBehavior' => [
                'class' => 'application.behaviors.LoggableBehavior',
                'excludedAttributes' => ['file_extension', 'full_text'],
            ],
            // helps with document to document relationship
            'CAdvancedArBehavior' => 'application.behaviors.CAdvancedArBehavior'
        ];
    }

    public function checkYearMonth($attributes, $params) {
        if ($this->original_date_m) {
            if (empty($this->original_date_y)) {
                $this->addError('original_date_y', 'Year must be defined before month.');
            }
        }
    }

    public function checkMonthDay($attributes, $params) {
        if ($this->original_date_d) {
            if (empty($this->original_date_y)) {
                $this->addError('original_date_y', 'Year must be defined before day.');
            }
            if (empty($this->original_date_m)) {
                $this->addError('original_date_m', 'Month must be defined before day.');
            }
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return [
            ['title', 'required'],
            ['project_id, page_count', 'numerical', 'integerOnly' => true],
            ['title, corporate_author, file_extension, topic, type, original_date, bates_start, bates_end, received_date,catalog_number, notes, full_text, restricted', 'safe'],
            ['temp_file', 'file', 'allowEmpty' => true, 'maxSize' => 80000000,],
            // The following rule is used by search().
            ['original_date_y', 'numerical', 'integerOnly' => true, 'min' => 1776,
                'max' => 3000, 'allowEmpty' => true, 'enableClientValidation' => true],
            ['original_date_m', 'numerical', 'integerOnly' => true, 'min' => 1,
                'max' => 12, 'allowEmpty' => true, 'enableClientValidation' => true],
            ['original_date_d', 'numerical', 'integerOnly' => true, 'min' => 1,
                'max' => 31, 'allowEmpty' => true, 'enableClientValidation' => true],
            ['original_date_m', 'checkYearMonth'],
            ['original_date_d', 'checkMonthDay'],
            ['id, title, project_id, corporate_author, topic, type, bates_start, bates_end, catalog_number, '
                . 'page_count, file_extension, orginal_date, notes,full_text, restricted', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
        return [
            'project' => [self::BELONGS_TO, 'Project', 'project_id'],
            'documents1' => [self::MANY_MANY, 'Document', 'document_document(document_id_a, document_id_b)'],
            'documents2' => [self::MANY_MANY, 'Document', 'document_document(document_id_b, document_id_a)'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'project_id' => 'Project',
            'file_extension' => 'Electronic Document',
            'corporate_author' => 'Corporate Author',
            'topic' => 'Topic',
            'type' => 'Type',
            'catalog_number' => 'Catalog Number',
            'page_count' => 'Page Count',
            'bates_start' => 'Bates Start',
            'bates_end' => 'Bates End',
            'bates_search' => 'Bates Number',
            'original_date' => 'Original Date',
            'original_date_y' => 'Year',
            'original_date_m' => 'Month',
            'original_date_d' => 'Day',
            'notes' => 'Notes',
            'full_text' => 'Full Document Text',
            'restricted' => 'Restricted',
            'created_info' => 'Created by',
            'modified_info' => 'Modified by',
            'received_date' => 'Received Date',
            'documents' => 'Related Documents',
            'search' => 'Filter documents by',
            'searchFields' => 'Fields to include in query'
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
    public function search($query = '', $bates_search = null) {
        $controller = Yii::app()->getController();
        $this->project_id = intval($this->project_id);
        $this->bates_search = $bates_search;
        $return = null;
        if (!is_numeric($this->project_id) || $this->project_id === 0)
            throw new CException('Project id must be set');

        if (strlen(trim($query))) {
            $return = new CActiveDataProvider('Document', [
                'criteria' => $this->searchDBCriteria($query),
                'sort' => ['defaultOrder' => $this->total_found ? 'weight desc' : 'id desc'],
                'pagination' => $controller->userData->paginationParam,
            ]);
        } else {
            $return = new CActiveDataProvider('Document', [
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
        if (is_integer($this->project_id)) {
            $criteria->condition = "project_id = :pid";
            $params[':pid'] = $this->project_id;
        }
        if (!empty($this->bates_search)) {
            $criteria->addCondition(':batesSearch BETWEEN bates_start AND bates_end');
            $params[':batesSearch'] = $this->bates_search;
        }
        $criteria->params = $params;
// hide restricted documents from guests added 1/26/2016 snook
        if (Yii::app()->user->isGuest) {
            $criteria->addCondition('restricted != true');
        }
        if (strlen(trim($query))) {
            $admin = '<a href="mailto:' . Yii::app()->params['adminEmail'] . '">administrator</a>';
            $query = addslashes($query);
            $s = new SphinxClient();
            if ($s->setServer("127.0.0.1", 9312) == false) {
                throw new Exception("Unable to connect to the Sphinx searchd service.  Please contact the {$admin}.", $code);
                return null;
            }
            $s->SetLimits(0, 20000, 20000);
            $s->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
            $s->setMatchMode(SPH_MATCH_EXTENDED);

            $s->SetFieldWeights([
                "title" => 4,
                "corporate_author" => 3,
                "topic" => 4,
                "type" => 3,
                "catalog_number" => 2,
                "notes" => 2,
                "original_date" => 2,
                "full_text" => 1
            ]);

            //$s->setMaxQueryTime(0);
            $s->SetFilter('project_id', [$this->project_id]);
            $result = $s->query($query, 'id3');

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
                    foreach ($keys as $key) {
                        $sWeight .= "({$key}, {$result['matches'][$key]['weight']}),";
                    }
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
     * @return Document the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Custom function to return an array of distinct authors, topics or types
     * @param string $which the field name in which to search
     * @return Array list of distintct elements
     * @todo use params in CSqlDataProvider
     */
    public function lookupDistinctField($which, $project_id) {
        $sql = "SELECT distinct $which FROM document WHERE $which IS NOT NULL AND  project_id = $project_id ORDER BY $which ASC";

        $dataProvider = new CSqlDataProvider($sql, ['pagination' => false]);
        $dataArray = $dataProvider->getData();
        $typeaheadArray = [];

        foreach ($dataArray as $data) {
            $typeaheadArray[] = CHtml::encode($data[$which]);
        }

        // mix in the types that every project has
        if ($which == 'type') {
            $alwaysTypes = ['Report', 'Article', 'Guidance', 'Data', 'Correspondence', 'Legal documents'];
            $typeaheadArray = array_unique(array_merge($typeaheadArray, $alwaysTypes), SORT_REGULAR);
        }
        return $typeaheadArray;
    }

    /**
     * Custom function to return an array of distinct authors, topics or types
     * @param string $which the field name in which to search
     * @return Array list of distintct elements
     */
    public function lookupDistinctListOptions($which, $project_id) {
        $sql = "SELECT distinct $which FROM document WHERE $which IS NOT NULL AND  project_id = $project_id ORDER BY $which ASC";
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

    public function afterFind() {
        $parts = explode('-', $this->original_date);
        if (count($parts)) {
            $og = '';
            $this->original_date_y = $parts[0];
            if (isset($parts[1])) {
                $this->original_date_m = $parts[1];
                if (isset($parts[2])) {
                    $this->original_date_d = $parts[2];
                }
            }
        }
        return parent::afterFind();
    }

    /**
     * Trim everything up, don't know why I have to do this shit, YII.
     *
     * @return boolean valid record
     */
    public function beforeSave() {
        if (parent::beforeSave()) {
            $this->title = trim($this->title);
            $this->corporate_author = trim($this->corporate_author);
            $this->topic = trim($this->topic);
            $this->type = trim($this->type);
            $this->catalog_number = trim($this->catalog_number);
            $this->bates_start = trim($this->bates_start);
            $this->bates_end = trim($this->bates_end);

            /** added to handle multipart date */
            $og = '';
            if (strlen($this->original_date_y) === 4) {
                $og = $this->original_date_y;
                if (strlen($this->original_date_m) > 0) {
                    $og .= '-' . str_pad($this->original_date_m, 2, '0', STR_PAD_LEFT);
                    if (strlen($this->original_date_d) > 0) {
                        $og .= '-' . str_pad($this->original_date_d, 2, '0', STR_PAD_LEFT);
                    }
                }

                $this->original_date = $og;
            }
            if (!empty($this->bates_start)) {
                if (empty($this->bates_end)) {
                    $this->bates_end = $this->bates_start;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            DocumentDocument::model()->deleteLinks($this->id);
            Log::model()->deleteAll('super_id = :id', [':id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

    public function getFileSize() {
        $file = $this->filePath;
        if (file_exists($file))
            return SnookTools::human_filesize(filesize($file));
        else
            return null;
    }

    /**
     * We're using hashing to reduce load on the file sytem
     *
     * @param string $extension allows us to pass in an extension for new files
     * @return string The full path and file name
     */
    public function getFilePath($extension = null) {
        if (is_null($extension)) {
            $extension = $this->file_extension;
        }
        if (!is_null($extension) && strlen($extension)) {
//          get a zero padded hex string
            $f = substr("000000" . dechex($this->id), -6);
            $h = substr($f, 0, 3);
            $f = substr($f, -3, 3);
//          Make sure our hash directory exists inside the project directory
            try {
                if (!file_exists(Yii::app()->params['docs_path'] . "{$this->project_id}/$h")) {
                    @mkdir(Yii::app()->params['docs_path'] . "{$this->project_id}/$h");
                }
            } catch (Exception $e) {

            }
            return Yii::app()->params['docs_path'] . "{$this->project_id}/$h/$f.{$extension}";
        } else {
            return null;
        }
    }

    public function getThumbnailPath() {
        if (!is_null($this->file_extension)) {
//          get a zero padded hex string
            $f = substr("000000" . dechex($this->id), -6);
            $h = substr($f, 0, 3);
            $f = substr($f, -3, 3);
//          Make sure our hash directory exists inside the project directory
            try {
                if (!file_exists(Yii::app()->params['thumbs_path'] . "{$this->project_id}/$h")) {
                    @mkdir(Yii::app()->params['thumbs_path'] . "{$this->project_id}/$h");
                }
            } catch (Exception $e) {

            }
            return Yii::app()->params['thumbs_path'] . "{$this->project_id}/$h/$f.jpg";
        } else {
            return null;
        }
    }

    public function getThumbnailUrl() {
        if (!is_null($this->file_extension)) {
//          get a zero padded hex string
            $f = substr("000000" . dechex($this->id), -6);
            $h = substr($f, 0, 3);
            $f = substr($f, -3, 3);

            return "/images/thumbnails/{$this->project_id}/$h/$f.jpg";
        } else {
            return null;
        }
    }

    /**
     * Uses Poppler shell tool to convert pdfs to text, or other conversion
     * libraries for different file types
     *
     */
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
     * Uses imagemagick to create a smallish jpg thumbnail of the first page
     * type
     *
     */
    public function makeThumbnail() {
        @unlink($this->thumbnailPath);
        $leefixedit = false;
        if ($leefixedit) {
            $img = new imagick();

//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
//this is important to give good quality output, otherwise text might be unclear
            $img->setResolution(200, 200);

//read the file
            $img->readImage("{$this->filePath}[0]");
//reduce the dimensions - scaling will lead to black color in transparent regions
            $img->scaleImage(200, 300, true);
//set new format
            $img->setImageFormat('jpg');
// -flatten option, this is necessary for images with transparency, it will produce white background for transparent regions
            $img = $img->flattenImages();

//save image file
            $img->writeImages($this->thumbnailPath, false);
        } else {
            $cmd = "convert {$this->filePath}[0] -resize 33% -flatten -quality 50% {$this->thumbnailPath} &";
            exec($cmd);
        }
    }

//public $count;

    public function PieData($fieldName, $project_id = null, $query = '') {
        $return = null;
        $pieDP = new CActiveDataProvider('Document');
        $this->project_id = intval($project_id);

        $mainCrit = $this->searchDBCriteria($query);
        $pieDP->criteria = $this->searchDBCriteria($query);
        $pieDP->criteria->distinct = true;
        $pieDP->criteria->group = $fieldName;
        $pieDP->criteria->select = " {$fieldName} as label, count(*) as data ";
#throw new CDbException(json_encode($pieDP->criteria, 128));
//$pieDP->sort->sortVar ='';
        $pieData = $pieDP->getData();
        $return = [];
        foreach ($pieData as $doc) {
            $return[] = ['label' => $doc->label, 'data' => $doc->data];
        }
        return $return;
    }

    public function NetworkGraphJson($project_id = null, $query = '') {
        $return = null;
        $dp = new CActiveDataProvider('Document');
        $this->project_id = intval($project_id);

        $dp->criteria = $this->searchDBCriteria($query);

        $nodes = [];
        $links = [];

        $iterator = new CDataProviderIterator($dp);
        $keys = $dp->getKeys();
        foreach ($iterator as $doc) {
            $nodes[] = ['name' => $doc->title, 'group' => $doc->id];
            $linkedDocs = $doc->getRelatedDocumentIds();
            foreach ($linkedDocs as $linkedDoc) {
                if (in_array($linkedDoc['doc'], $keys))
                    $links[] = ['source' => $doc->id, 'target' => $linkedDoc['doc'], 'weight' => 1];
            }
        }
        return json_encode(['nodes' => $nodes, 'links' => $links]);
    }

}

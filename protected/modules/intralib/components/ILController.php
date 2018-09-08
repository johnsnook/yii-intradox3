<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ILController
 *
 * @author John
 */
class ILController extends Controller {

    private $_title = null;

    public function getTitle() {
        if (is_null($this->_title)) {
            return ucfirst($this->id);
        } else {
            return $this->_title;
        }
    }

    public function setTitle($t) {
        $this->_title = $t;
    }

    public function getHumpback() {
        return str_replace(' ', '', $this->title);
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function beforeAction($a) {
        $this->NavbarItems[] = ['label' => 'IntraLib', 'icon' => 'fa fa-university', 'items' => [
                ['label' => 'Monographs', 'icon' => Monograph::model()->glyph, 'url' => ['monograph/index']],
                ['label' => 'Authors', 'icon' => Author::model()->glyph, 'url' => ['author/index']],
                ['label' => 'Corporate Authors', 'icon' => CorporateAuthor::model()->glyph, 'url' => ['corporateAuthor/index']],
                ['label' => 'Subjects', 'icon' => Subject::model()->glyph, 'url' => ['subject/index']]
        ]];

        return true;
    }

    /**
     * This is called by AJAX request.  I'm sick of fucking around with this broken
     * ass chinesey shit.  Now the grid will get rendered by the view first then subsequently
     * updated with a partial render
     */
    public function actionGetGridView() {
        /**
         * DataProvider for the grid
         * create data provider and renderPartial CGridView widget
         */
        if (isset($_GET[$this->humpback]['search'])) {
            $criteria = new CDbCriteria;
            $query = $_GET[$this->humpback]['search'];
            $criteria->addCondition("title ILIKE '%$query%'");

            $searchDP = new CActiveDataProvider($this->humpback, [
                'criteria' => $criteria,
                'pagination' => $this->userData->paginationParam,
            ]);
            $this->renderPartial('/_grid', ['gridSearchDP' => $searchDP]);
            Yii::app()->end();
        } else {
            //echo json_encode($_GET[$this->title], JSON_PRETTY_PRINT);
            echo $this->humpback;
        }
    }

}

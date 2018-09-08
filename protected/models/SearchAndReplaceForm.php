<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchAndReplaceForm
 *
 * @author John
 */
class SearchAndReplaceForm extends CFormModel {

    public $project_id;
    public $field;
    public $find;
    public $caseSensitive;
    public $replace;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return [
            ['project_id, field, find', 'required'],
            ['caseSensitive', 'boolean'],
            ['field, find,caseSensitive,replace', 'safe']
        ];
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return [
            'field' => 'Document field to search',
            'find' => 'Find',
            'caseSensitive' => 'Case sensitive',
            'replace' => 'Replace',
        ];
    }

    public function save() {
        $sql = "UPDATE document SET {$this->field} = ";
        if ($this->caseSensitive)
            $sql .= " regexp_replace({$this->field}, '{$this->find}', '{$this->replace}', 'g')";
        else
            $sql .= " regexp_replace({$this->field}, '{$this->find}', '{$this->replace}', 'gi')";
        $sql .= " WHERE project_id = {$this->project_id}";

        Yii::app()->db->createCommand($sql)->execute();

        return true;
    }

}

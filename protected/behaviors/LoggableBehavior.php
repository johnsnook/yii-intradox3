<?php

class LoggableBehavior extends CActiveRecordBehavior {

    private $_oldattributes = array();
    public $excludedAttributes = [];

    public function afterSave($event) {
        $you = Yourself::getYou();

        $newattributes = $this->Owner->getAttributes();
        $oldattributes = $this->getOldAttributes();
        $log = new Log();
        $log->log_time = date('Y-m-d H:i:s');

        if (!$this->Owner->isNewRecord) {
            // compare old and new

            foreach ($newattributes as $name => $value) {
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }

                if ($value != $old & !in_array($name, $this->excludedAttributes) & $old != '') {
                    $log->old_value = $old;
                    $log->new_value = $value;
                    $log->action = 'CHANGE';
                    $log->model = strtolower(get_class($this->Owner));
                    $log->super_id = $this->Owner->getPrimaryKey();
                    $log->field = $name;
                    $log->person_id = $you->id;
                    $log->title = $this->Owner->Attributes['title'];
                    $log->save();
                }
            }
        } else {
            $log->action = 'CREATE';
            $log->model = strtolower(get_class($this->Owner));
            $log->super_id = $this->Owner->getPrimaryKey();
            if ($log->model === 'document') {
                $class = Yii::app()->params['documentRule'];
                Yii::app()->db->createCommand("select public.validate_document_class('$class')")->execute();
            }
            $log->person_id = $you->id;
            $log->title = $this->Owner->Attributes['title'];

            $log->save();
        }
        return parent::afterSave($event);
    }

    public function afterDelete($event) {
        $d = new DateTime();

        $log = new Log();
        $log->log_time = date('Y-m-d H:i:s');
        $log->old_value = $this->Owner->Attributes['title'];
        $log->new_value = '';
        $log->action = 'DELETE';
        $log->model = strtolower(get_class($this->Owner));
        $log->super_id = $this->Owner->getPrimaryKey();
        $log->field = 'N/A';
        $log->person_id = $userid;
        $log->title = $this->Owner->Attributes['title'];
        $log->save();
        return parent::afterDelete($event);
    }

    public function afterFind($event) {
        // Save old values
        $this->setOldAttributes($this->Owner->getAttributes());

        return parent::afterFind($event);
    }

    public function getOldAttributes() {
        return $this->_oldattributes;
    }

    public function setOldAttributes($value) {
        $this->_oldattributes = $value;
    }

}

?>
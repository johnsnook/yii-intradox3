<?php

/**
 * From:
 * https://www.packtpub.com/sites/default/files/5481OS-Chapter-8-Extending-Yii.pdf
 */
class SoftDeleteBehavior extends CActiveRecordBehavior {

    public $flagField = 'is_deleted';

    public function remove() {
        $this->getOwner()->{$this->flagField} = 1;
        return $this->getOwner();
    }

    public function restore() {
        $this->getOwner()->{$this->flagField} = 0;
        return $this->getOwner();
    }

    public function notRemoved() {
        $criteria = $this->getOwner()->getDbCriteria();
        $criteria->compare($this->flagField, 0);
        return $this->getOwner();
    }

    public function removed() {
        $criteria = $this->getOwner()->getDbCriteria();
        $criteria->compare($this->flagField, 1);
        return $this->getOwner();
    }

    public function isRemoved() {
        return (boolean) $this->getOwner()->{$this->flagField};
    }

}

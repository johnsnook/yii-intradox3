<?php

class Yourself extends Person {

    public function behaviors() {
        return [];
    }

    public static function getYou() {
        return self::model()->findByPk(Yii::app()->user->id);
    }

}

<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
define('ROLE_CLIENT', 1);
define('ROLE_USER', 2);
define('ROLE_ADMIN', 3);

class Controller extends CController {

    /**
     * @var Holds an activeRecord with current user. NULL if guest
     */
    public $userData = null;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    public $background = '/images/intradox.jpg';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = [];

    /**
     * @var array the navbar items of the current page. The value of this property will
     * be assigned to {@link TbNavbar::items}. Please refer to {@link TbNavbar::items}
     * for more details on how to specify this property.
     */
    public $NavbarItems = [];

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = [];

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $homeLabel = 'Projects';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $defaultMenu = [];

    /*
     * Special created_on/modified_on formatter function.  returns nothing if user not set
     * @param model $data
     * @param string $which
     * @return srting the views output
     */

    public function userStamp($data, $which = "created") {
        $return = '';
        $go = FALSE;
        $obj = null;
        $date = '';
        eval('$go = isset($data->' . $which . 'By);');
        if ($go) {
            eval('$obj = $data->' . $which . 'By;');
            eval('$date = $data->' . $which . '_on;');
            $return = '<b>'
                    . CHtml::encode($data->getAttributeLabel($which . '_by'))
                    . ": </b>"
                    . CHtml::encode($obj->title)
                    . ' @ ' . CHtml::encode(date("m/d/Y h:i A", strtotime($date)))
                    . "<br />\n";
        }
        return $return;
    }

    /*
     * overide init function to get our user data
     * @return srting the views output
     */

    public function init() {
        // Load the user
        if (!Yii::app()->user->isGuest) {
            $this->userData = Person::model()->findByPk(Yii::app()->user->id);
            switch ($this->userData->userlevel) {
                case ROLE_ADMIN:
                case ROLE_USER:
                    break;
                case ROLE_CLIENT:
                default:
                    break;
            }
            $this->NavbarItems[] = ['label' => 'Projects', 'url' => Yii::app()->createUrl('project/index'), 'icon' => 'briefcase'];
        }
    }

    /**
     * Check if the current user is in the passed array of roles
     * This function is defined in accessRules() used in the context of CAccessControlFilter
     * @param string $allowedRoles
     * @return boolean
     */
    public function allowUser($allowedRoles) {
        if ($this->userData !== null) {
            return array_search($this->userData->userlevel, $allowedRoles) !== FALSE ? TRUE : FALSE;
        }
        return FALSE;
    }

    /** perform access control for CRUD operations
     *
     * @return array
     */
    public function filters() {
        return array('accessControl');
    }

}

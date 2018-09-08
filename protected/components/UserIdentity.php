<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    private $_userlevel;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $ldap = Yii::app()->params['ldap'];
        $person = null;
        if ($ldap) {
            $person = $this->ldap_authenticate(Yii::app()->params['ldap']);
        }
        if (is_null($person)) {

            $person = Person::model()->findByAttributes(array("username" => $this->username));
        }

        if (is_null($person)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if ($person->password !== md5($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                #if ($person->password !== $person->encrypt($this->password)) {
                //Found in our database
                $this->_id = $person->id;
                $this->setState('title', $person->title);
                $this->_userlevel = $person->userlevel;
                $this->errorCode = self::ERROR_NONE;
            }
        }

        return !$this->errorCode;
    }

    /**
     * Authenticates a user via ldap.
     * We're here because the user wasn't found in the regular db so we'll check
     * against the active directory and if we find them we add them to our db
     * @return Person CActiveRecord or Null if not found.
     */
    private function ldap_authenticate($options) {
        $dc_string = "dc=" . implode(",dc=", $options['dc']);

        $connection = ldap_connect($options['host']);
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        $return = null;
        if ($connection) {
            $bind = @ldap_bind($connection, "uid={$this->username},ou={$options['ou']},{$dc_string}", $this->password);
            if ($bind) {
                $filter = "(uid=$this->username)";
                $result = ldap_search($connection, "ou={$options['ou']}, $dc_string", $filter);
                ldap_sort($connection, $result, "sn");
                $infoArr = ldap_get_entries($connection, $result);
                if ($infoArr['count'] == 1) {
                    $info = $infoArr[0];
                    $person = Person::model()->findByAttributes(["username" => $this->username]);
                    if ($person === null) {
                        $person = new Person();
                        if (strpos($this->username, 'snook'))
                            $person->userlevel = 3;
                        else
                            $person->userlevel = 2;
                        $person->username = $this->username;
                    }
                    $person->password = md5($this->password);
                    $person->title = $info["cn"][0];
                    $person->email = $info["mail"][0];
                    $person->pod_id = Pod::getUserPod($this->username);
                    $person->phone = $info["telephoneNumber"][0];
                    $person->ldap = TRUE;
                    if (!$person->save()) {
                        Yii::log("couldn't save your LDAP record: " . json_encode($person->errors) . "\n" . json_encode($info));
                        Yii::app()->end();
                    }
                    $this->_id = $person->id;
                    $this->setState('title', $person->title);
                    $this->_userlevel = $person->userlevel;
                    $this->errorCode = self::ERROR_NONE;
                    $return = $person;
                }
            }
            @ldap_close($connection);
            return $return;
        }
    }

    function getId() {
        return $this->_id;
    }

}
?>

</body>
</html>

<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/1_Backend/4_alta/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "modules/users/model/BLL/user_bll.class.singleton.php");

class user_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = user_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_user($arrArgument) {
        return $this->bll->create_user_BLL($arrArgument);
    }
}

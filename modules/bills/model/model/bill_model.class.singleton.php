<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/web/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "modules/bills/model/BLL/bill_bll.class.singleton.php");

class bill_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = bill_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_bill($arrArgument) {
        return $this->bll->create_bill_BLL($arrArgument);
    }
}

<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/web/';
if (!defined('SITE_ROOT')) define('constant', $path);
define('MODEL_PATH', SITE_ROOT . 'model/');

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "modules/list_bills/model/DAO/bill_dao.class.singleton.php");

class bill_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = billDAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_bills_BLL($numPage) {
        return $this->dao->list_bills_DAO($this->db,$numPage);
    }

    public function details_bill_BLL($id) {
        return $this->dao->details_bill_DAO($this->db,$id);
    }

}

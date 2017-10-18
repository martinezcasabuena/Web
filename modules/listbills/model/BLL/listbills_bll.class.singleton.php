<?php
class listbills_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = listbills_dao::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_bills_BLL() {
        return $this->dao->list_bills_DAO($this->db);
    }

    public function details_bill_BLL($id) {
        return $this->dao->details_bill_DAO($this->db,$id);
    }

}

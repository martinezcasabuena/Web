<?php
class listbills_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = listbills_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_bills() {
        return $this->bll->list_bills_BLL();
    }

    public function details_bill($id) {
        return $this->bll->details_bill_BLL($id);
    }

}

<?php

class billDAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_bills_DAO($db,$numPage) {
      if($numPage==0){
        $sql = "SELECT * FROM bills";
      }else{
        $sql = "SELECT * FROM bills limit $numPage";
      }
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function details_bill_DAO($db,$id) {
        $sql = "SELECT * FROM bills WHERE id=".$id;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }
}

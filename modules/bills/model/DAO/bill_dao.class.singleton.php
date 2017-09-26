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

    public function create_bill_DAO($db, $arrArgument) {
        $name = $arrArgument['name'];
        $last_name = $arrArgument['last_name'];
        $bill_date = $arrArgument['bill_date'];
        $service_date = $arrArgument['service_date'];
        $address = $arrArgument['address'];
        $nif = $arrArgument['nif'];
        $email = $arrArgument['email'];
        $paid_form = $arrArgument['paid_form'];
        $service = $arrArgument['service'];
        $avatar = $arrArgument['avatar'];

        $venta = 0;
        $reparacion = 0;
        $sustitucion = 0;
        $revision = 0;

        foreach ($service as $indice) {
            if ($indice === 'Venta')
                $venta = 1;
            if ($indice === 'Reparacion')
                $reparacion = 1;
            if ($indice === 'Sustitucion')
                $sustitucion = 1;
            if ($indice === 'Revision')
                $revision = 1;
        }

        $sql = "INSERT INTO bills (name, last_name, bill_date, service_date,"
                . " address, nif, email, paid_form,venta,reparacion,sustitucion,revision, avatar"
                . " ) VALUES ('$name', '$last_name', '$bill_date',"
                . " '$service_date', '$address', '$nif', '$email', '$paid_form', '$venta', '$reparacion',"
                . "'$sustitucion', '$revision', '$avatar')";

        return $db->ejecutar($sql);
    }
}

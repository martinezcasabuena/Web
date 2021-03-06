<?php
class bills_dao {
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
        $country = $arrArgument['country'];
        $province = $arrArgument['province'];
        $city = $arrArgument['city'];
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
                . " address, nif, email, paid_form,country, province,city,venta,reparacion,sustitucion,revision, avatar"
                . " ) VALUES ('$name', '$last_name', '$bill_date',"
                . " '$service_date', '$address', '$nif', '$email', '$paid_form','$country', '$province',"
                . " '$city', '$venta', '$reparacion','$sustitucion', '$revision', '$avatar')";

        return $db->ejecutar($sql);
    }

    public function obtain_countries_DAO($url){
          $ch = curl_init();
          curl_setopt ($ch, CURLOPT_URL, $url);
          curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
          $file_contents = curl_exec($ch);

          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          $accepted_response = array(200, 301, 302);
          if(!in_array($httpcode, $accepted_response)){
            return FALSE;
          }else{
            return ($file_contents) ? $file_contents : FALSE;
          }
    }

    public function obtain_provinces_DAO(){
          $json = array();
          $tmp = array();

          $provincias = simplexml_load_file(RESOURCES . "provinciasypoblaciones.xml");
          $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
          for ($i=0; $i<count($result); $i+=2) {
            $e=$i+1;
            $provincia=$result[$e];

            $tmp = array(
              'id' => (string) $result[$i], 'nombre' => (string) $provincia
            );
            array_push($json, $tmp);
          }
              return $json;

    }

    public function obtain_cities_DAO($arrArgument){
          $json = array();
          $tmp = array();

          $filter = (string)$arrArgument;
          $xml = simplexml_load_file(RESOURCES . 'provinciasypoblaciones.xml');
          $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

          for ($i=0; $i<count($result[0]); $i++) {
              $tmp = array(
                'poblacion' => (string) $result[0]->localidad[$i]
              );
              array_push($json, $tmp);
          }
          return $json;
    }
}

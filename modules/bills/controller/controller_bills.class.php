<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT'] . "/web/modules/bills/utils/functions_bills.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/utils/upload.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/utils/common.inc.php");

//////////////////////////////////////////////////////////////// upload
if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    $result_avatar = upload_files();
    $_SESSION['result_avatar'] = $result_avatar;
    //echo debug($_SESSION['result_avatar']); //se mostraría en alert(response); de dropzone.js
}

//////////////////////////////////////////////////////////////// alta_users_json
if ((isset($_POST['alta_bills_json']))) {
    alta_bills();
}

function alta_bills() {
    $jsondata = array();
    $billsJSON = json_decode($_POST["alta_bills_json"], true);
    $result = validate_bill($billsJSON);
    //$result=true;
    if (empty($_SESSION['result_avatar'])) {
        $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
    }
    $result_avatar = $_SESSION['result_avatar'];

    if (($result['resultado']) && ($result_avatar['resultado'])) {
        $arrArgument = array(
            'name' => ucfirst($result['datos']['name']),
            'last_name' => ucfirst($result['datos']['last_name']),
            'nif' => $result['datos']['nif'],
            'address' => $result['datos']['address'],
            'email' => $result['datos']['email'],
            'bill_date' => $result['datos']['bill_date'],
            'service_date' => $result['datos']['service_date'],
            'country' => $result['datos']['country'],
            'province' => $result['datos']['province'],
            'city' => $result['datos']['city'],
            'paid_form' => strtoupper($result['datos']['paid_form']),
            'service' => $result['datos']['service'],
            'avatar' => $result_avatar['datos']
        );

        /////////////////insert into BD////////////////////////
        $arrValue = false;
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/web/modules/bills/model/model/';
        $arrValue = loadModel($path_model, "bill_model", "create_bill", $arrArgument);
        //echo json_encode($arrValue);
        //die();

        $mensaje = "Bill has been successfully registered";

        //Redirigir a otra página
        $_SESSION['bill'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;

        $callback = "index.php?module=bills&view=results_bills";

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
        echo json_encode($jsondata);
        exit;
    } else {
        $error = $result['error'];
        $error_avatar = $result_avatar['error'];
        $jsondata["success"] = false;
        $jsondata["error"] = $result['error'];
        $jsondata["error_avatar"] = $result_avatar['error'];

        $jsondata["success1"] = false;
        if ($result_avatar['resultado']) {
            $jsondata["success1"] = true;
            $jsondata["img_avatar"] = $result_avatar['datos'];
        }
        header('HTTP/1.0 400 Bad error');
        echo json_encode($jsondata);
        //exit;
    }
}
if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    $_SESSION['result_avatar'] = array();
    $result = remove_files();
    if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }
}

//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {
    $jsondata = array();
    if (isset($_SESSION['bill'])) {
        //echo debug($_SESSION['user']);
        $jsondata["bill"] = $_SESSION['bill'];
    }
    if (isset($_SESSION['msje'])) {
        //echo $_SESSION['msje'];
        $jsondata["msje"] = $_SESSION['msje'];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION['bill']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

/////////////////////////////////////////////////// load_data
if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
    $jsondata = array();
    if (isset($_SESSION['bill'])) {
        $jsondata["bill"] = $_SESSION['bill'];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["bill"] = "";
        echo json_encode($jsondata);
        exit;
    }
}

if(  (isset($_GET["load_country"])) && ($_GET["load_country"] == true)  ){
		$json = array();

    	$url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
		$path_model=$_SERVER['DOCUMENT_ROOT'] . '/web/modules/bills/model/model/';
		$json = loadModel($path_model, "bill_model", "obtain_countries", $url);

		if($json){
			echo $json;
			exit;
		}else{
			$json = "error";
			echo $json;
			exit;
		}
	}

if(  (isset($_GET["load_provinces"])) && ($_GET["load_provinces"] == true)  ){
    	$jsondata = array();
        $json = array();

		$path_model=$_SERVER['DOCUMENT_ROOT'] . '/web/modules/bills/model/model/';
		$json = loadModel($path_model, "bill_model", "obtain_provinces");

		if($json){
			$jsondata["provinces"] = $json;
			echo json_encode($jsondata);
			exit;
		}else{
			$jsondata["provinces"] = "error";
			echo json_encode($jsondata);
			exit;
		}
	}

/////////////////////////////////////////////////// load_cities
if(  isset($_POST['idPoblac']) ){
	    $jsondata = array();
        $json = array();

		$path_model=$_SERVER['DOCUMENT_ROOT'] . '/web/modules/bills/model/model/';
		$json = loadModel($path_model, "bill_model", "obtain_cities", $_POST['idPoblac']);

		if($json){
			$jsondata["cities"] = $json;
			echo json_encode($jsondata);
			exit;
		}else{
			$jsondata["cities"] = "error";
			echo json_encode($jsondata);
			exit;
		}
	}

<?php
//include 'modules/bills/utils/functions_bills.inc.php';
//include 'utils/upload.php';
/*if ((isset($_POST['alta_bills_json']))) {
  $jsondata["success"] = true;
  $jsondata["redirect"] =false;
  echo json_encode($jsondata);
  exit;
}
*/

//include ($_SERVER['DOCUMENT_ROOT'] . "/web/modules/users/utils/functions_user.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/modules/users/utils/functions_user.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/utils/upload.php");

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
            'paid_form' => strtoupper($result['datos']['paid_form']),
            'service' => $result['datos']['service'],
        );

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
include 'modules/bills/view/create_bills.php';
alert("sa");

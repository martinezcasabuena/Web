<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT'] . "/web/modules/bills/utils/functions_bills.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/utils/upload.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/web/utils/common.inc.php");


if ((isset($_GET["allbills"])) && ($_GET["allbills"] == true)) {

  $path_model = $_SERVER['DOCUMENT_ROOT'] . '/web/modules/list_bills/model/model/';
  $arrValue = loadModel($path_model, "bill_model", "list_bills");
  $jsondata["bill"] = $arrValue;
  echo json_encode($jsondata);
  exit;

}


function close_session() {
    unset($_SESSION['bill']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

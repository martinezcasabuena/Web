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

if ((isset($_GET["details_bill"]))) {
  $idBill=($_GET["details_bill"]);
  $path_model = $_SERVER['DOCUMENT_ROOT'] . '/web/modules/list_bills/model/model/';
  $arrValue = loadModel($path_model, "bill_model", "details_bill",$idBill);
  $jsondata["bill"] = $arrValue;
  $_SESSION["loadedBill"]=$jsondata;
  echo json_encode($jsondata);
  exit;
}

if ((isset($_GET["loadBill"]))) {
  echo json_encode($_SESSION["loadedBill"]);
  exit;
}

function close_session() {
    unset($_SESSION['bill']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

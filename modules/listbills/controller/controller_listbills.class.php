<?php
class controller_listbills {
  function __construct() {
      $_SESSION['module'] = "listbills";
  }

  function list_bills() {
      require_once(VIEW_PATH_INC . "header.php");
      loadView('modules/listbills/view/', 'list_bills.php');
      require_once(VIEW_PATH_INC . "footer.html");
      require_once(VIEW_PATH_INC . "menu.php");
  }

  function details_bill() {
      require_once(VIEW_PATH_INC . "header.php");
      loadView('modules/listbills/view/', 'details_bill.php');
      require_once(VIEW_PATH_INC . "footer.html");
      require_once(VIEW_PATH_INC . "menu.php");
  }

  function load_billsList(){
      if ((isset($_POST["allbills"])) && ($_POST["allbills"] === "true")) {
        $arrValue = loadModel(MODEL_LISTBILLS, "listbills_model", "list_bills");
        $jsondata["bill"] = $arrValue;
        echo json_encode($jsondata);
        exit;
    }
  }


  function load_billDetails (){
    if ((isset($_POST["load_billDetails"]))) {
      $idBill=($_POST["load_billDetails"]);
      $arrValue = loadModel(MODEL_LISTBILLS, "listbills_model", "details_bill",$idBill);
      $jsondata["bill"] = $arrValue;
      $_SESSION["loadedBill"]=$jsondata;
      echo json_encode($jsondata);
      exit;
    }
  }

  function load_bill(){
    if ((isset($_POST["loadBill"])) && ($_POST["loadBill"] === "true")) {
      echo json_encode($_SESSION["loadedBill"]);
      exit;
    }
  }

  function close_session() {
      unset($_SESSION['bill']);
      unset($_SESSION['msje']);
      $_SESSION = array(); // Destruye todas las variables de la sesión
      session_destroy(); // Destruye la sesión
  }
}

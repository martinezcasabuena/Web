<?php
class controller_bills {
  function __construct() {
      include(FUNCTIONS_BILLS . "functions_bills.inc.php");
      include(UTILS . "upload.php");
      $_SESSION['module'] = "bills";
  }

  function form_bills() {
    require_once(VIEW_PATH_INC . "header.php");
    loadView('modules/bills/view/', 'create_bills.php');
    require_once(VIEW_PATH_INC . "footer.html");
    require_once(VIEW_PATH_INC . "menu.php");

  }

  function results_bills() {
    require_once(VIEW_PATH_INC . "header.php");
    loadView('modules/bills/view/', 'results_bills.php');

    require_once(VIEW_PATH_INC . "footer.html");
    require_once(VIEW_PATH_INC . "menu.php");

  }

  //////////////////////////////////////////////////////////////// upload
  function upload_bills() {
    if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
        $result_avatar = upload_files();
        $_SESSION['result_avatar'] = $result_avatar;
        //echo debug($_SESSION['result_avatar']); //se mostraría en alert(response); de dropzone.js
    }
  }

  //////////////////////////////////////////////////////////////// alta_users_json
  function alta_bills_json() {
    if ((isset($_POST['alta_bills_json']))) {
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

          $callback = "../../bills/results_bills/";

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
  }
  function delete_bills() {
    if (isset($_GET["delete"]) && $_GET["delete"] == true) {
        $_SESSION['result_avatar'] = array();
        $result = remove_files();
        if ($result === true) {
            echo json_encode(array("res" => true));
        } else {
            echo json_encode(array("res" => false));
        }
    }
  }

  //////////////////////////////////////////////////////////////// load
  function load_bills() {
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
  }

  function close_session() {
      unset($_SESSION['bill']);
      unset($_SESSION['msje']);
      $_SESSION = array(); // Destruye todas las variables de la sesión
      session_destroy(); // Destruye la sesión
  }

  /////////////////////////////////////////////////// load_data
  function load_data_bills() {
    if ((isset($_POST["load_data"])) && ($_POST["load_data"] == true)) {
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
  }

  function load_countries_bills() {
    $json = array();
    $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';

    try {
        //throw new Exception();
        //console.log("Try");
        $json = loadModel(MODEL_BILLS, "bill_model", "obtain_countries", $url);
    } catch (Exception $e) {
        $json = array();
    }

    if ($json) {
        echo $json;
        exit;
    } else {
        $json = "error";
        echo $json;
        exit;
    }
  }


  function load_provinces_bills() {
    if ((isset($_POST["load_provinces"])) && ($_POST["load_provinces"] == true)) {
        $jsondata = array();
        $json = array();

        try {
            $json = loadModel(MODEL_BILLS, "bill_model", "obtain_provinces");
        } catch (Exception $e) {
            $json = array();
        }

        if ($json) {
            $jsondata["provinces"] = $json;
            echo json_encode($jsondata);
            exit;
        } else {
            $jsondata["provinces"] = "error";
            echo json_encode($jsondata);
            exit;
        }
    }
  }

  /////////////////////////////////////////////////// load_cities
  function load_towns_bills() {
      if (isset($_POST['idPoblac'])) {
          $jsondata = array();
          $json = array();

          try {
              $json = loadModel(MODEL_BILLS, "bill_model", "obtain_cities", $_POST['idPoblac']);
          } catch (Exception $e) {
              showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
          }

          if ($json) {
              $jsondata["cities"] = $json;
              echo json_encode($jsondata);
              exit;
          } else {
              $jsondata["cities"] = "error";
              echo json_encode($jsondata);
              exit;
          }
      }
  }
  
}

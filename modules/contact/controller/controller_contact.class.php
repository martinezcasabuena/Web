
<?php
class controller_contact {

    public function __construct() {
        $_SESSION['module'] = "contact";
    }

    public function view_contact() {
      require_once(VIEW_PATH_INC . "header.php");
      loadView('modules/contact/view/', 'contact.php');
      require_once(VIEW_PATH_INC . "footer.html");
      require_once(VIEW_PATH_INC . "menu.php");
    }

    public function process_contact() {
      if ((isset($_POST["sendEmail"])) && ($_POST["sendEmail"] === "true")) {
        $dataEmail = json_decode($_POST["dataEmail"], true);
        if($dataEmail){
          $json = send_mailgun($dataEmail['name'],$dataEmail['email'],$dataEmail['message']);
          print_r($dataEmail['name']);
        }else{
          echo "<div class='alert alert-error'>Server error. Try later...</div>";
        }
      }
  }
}

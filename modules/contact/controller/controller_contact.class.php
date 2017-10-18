<?php
class controller_contact {
  function __construct() {
      $_SESSION['module'] = "contact";
  }

  function contact() {
    require_once(VIEW_PATH_INC . "header.php");
    loadView('modules/contact/view/', 'contact.php');
    require_once(VIEW_PATH_INC . "footer.html");
    require_once(VIEW_PATH_INC . "menu.php");

  }


}

<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
include 'modules/users/utils/functions_user.inc.php';

if (isset($_POST['submit_bill'])) {
    $result = validate_user();

    if ($result['resultado']) {
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

        $mensaje = "User has been successfully registered";

        $_SESSION['user'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;

        $callback = "index.php?module=users&view=results_users";
        redirect($callback);
    } else {
        $error = $result['error'];
    }
}
include 'modules/users/view/create_users.php';

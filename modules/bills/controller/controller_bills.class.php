<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
include 'modules/bills/utils/functions_bills.inc.php';

if ($_POST) {
    $result = validate_bill();
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

        $mensaje = "Bill has been successfully registered";

        $_SESSION['bill'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;

        $callback = "index.php?module=bills&view=results_bills";
        redirect($callback);
    } else {
        $error = $result['error'];
    }
}
include 'modules/bills/view/create_bills.php';

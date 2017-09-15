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

if (isset($_POST['submit_user'])) {
    $result = validate_user();

    if ($result['resultado']) {
        $arrArgument = array(
            'name' => ucfirst($result['datos']['name']),
            'last_name' => ucfirst($result['datos']['last_name']),
            'title_date' => $result['datos']['title_date'],
            'address' => $result['datos']['address'],
            'nif' => $result['datos']['nif'],
            'pass' => $result['datos']['pass'],
            'email' => $result['datos']['email'],
            'en_lvl' => strtoupper($result['datos']['en_lvl']),
            'interests' => $result['datos']['interests'],
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

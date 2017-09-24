<?php
function validate_bill($value) {
    $error = array();
    $valido = true;
    $filtro = array(
        'name' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^\D{2,30}$/')
        ),
        'last_name' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^\D{2,30}$/')
        ),
        'nif' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^^(([A-Z])|\d)\d{7}(?(2)\d|[A-Z])$/')
        ),
        'address' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-z0-9- ]+$/i')
        ),
        'email' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'valida_email'
        ),
        'bill_date' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/')
        ),
        'service_date' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/')
        ),
    );


    $resultado = filter_var_array($value, $filtro);

    //no filter
    $resultado['paid_form'] = $value['paid_form'];

    $resultado['service'] = $value['service'];

    /*if ($resultado['bill_date']) {
        //validate to user's over 16
        $dates = validateAge($value['bill_date']);

        if (!$dates) {
            $error['bill_date'] = 'User must have more than 16 years';
            $valido = false;
        }
    }


    if ($resultado['bill_date'] && $resultado['service_date']) {
        //compare date of birth with title_date
        $dates = valida_dates($value['service_date'], $value['bill_date']);

        if (!$dates) {
            $error['service_date'] = 'birth date must be before the date of registration and must have more than 16 years.';
            $valido = false;
        }
    }

*/

    if ($value['paid_form'] === 'Selecciona la forma de pago') {
        $error['paid_form'] = "You haven't select a payment method.";
        $valido = false;
    }

    if(count($resultado['service']) <1){

            $error['service'] = "Select 1 or more.";
            $valido = false;
        }

    if ($resultado != null && $resultado) {


        if (!$resultado['name']) {
            $error['name'] = 'Name must be 2 to 20 letters';
            $valido = false;
        }

        if (!$resultado['last_name']) {
            $error['last_name'] = 'Last name must be 2 to 30 letters';
            $valido = false;
        }

        if (!$resultado['nif']) {
            $error['nif'] = 'Enter a valid NIF: 00000000X';
            $valido = false;
        }

        if (!$resultado['address']) {
            $error['address'] = "Direction don't have points or symbols.";
            $valido = false;
        }

        if (!$resultado['email']) {
            $error['email'] = 'error format email (example@example.com)';
            $valido = false;
        }


        if (!$resultado['bill_date']) {
            if($value['bill_date'] == ""){
                $error['bill_date'] = "this camp can't empty";
                $valido = false;
            }else{
                $error['bill_date'] = 'error format date (mm/dd/yyyy)';
                $valido = false;
            }
        }

        if (!$resultado['service_date']) {
            if($value['service_date'] == ""){
                $error['service_date'] = "this camp can't empty";
                $valido = false;
            }else{
            $error['service_date'] = 'error format date (mm/dd/yyyy)';
            $valido = false;
            }
        }
    } else {
        $valido = false;
    };
    return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);
}


function valida_dates($start_days, $dayslight) {

    $start_day = date("m/d/Y", strtotime($start_days));
    $daylight = date("m/d/Y", strtotime($dayslight));

    list($mes_one, $dia_one, $anio_one) = split('/', $start_day);
    list($mes_two, $dia_two, $anio_two) = split('/', $daylight);

    $dateOne = new DateTime($anio_one . "-" . $mes_one . "-" . $dia_one);
    $dateTwo = new DateTime($anio_two . "-" . $mes_two . "-" . $dia_two);

    if ($dateOne <= $dateTwo) {
        return true;
    }
    return false;
}


//validate email
function valida_email($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (filter_var($email, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^.{5,50}$/')))) {
            return $email;
        }
    }
    return false;
}

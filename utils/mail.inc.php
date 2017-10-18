<?php
    function enviar_email($arr) {
        $html = '';
        $subject = '';
        $body = '';
        $ruta = '';
        $return = '';

        switch ($arr['type']) {
            case 'alta':
                $subject = 'Tu Alta en Rural_Shop';
                $ruta = "<a href='" . amigable("?module=login&function=activar&aux=A" . $arr['token'], true) . "'>aqu&iacute;</a>";
                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
                break;

            case 'modificacion':
                $subject = 'Tu Nuevo Password en Rural_Shop<br>';
                $ruta = '<a href="' . amigable("?module=login&function=activar&aux=F" . $arr['token'], true) . '">aqu&iacute;</a>';
                $body = 'Para recordar tu password pulsa ' . $ruta;
                break;

            case 'contact':
                $subject = 'Tu Petici&oacute;n a Rural_Shop ha sido enviada<br>';
                $ruta = '<a href=' . 'https://php-mvc-oo-yomogan.c9.io/3_Framework/4_framework_contact/'. '>aqu&iacute;</a>';
                $body = 'Para visitar nuestra web, pulsa ' . $ruta;
                break;

            case 'admin':
                $subject = $arr['inputSubject'];
                $body = 'inputName: ' . $arr['inputName']. '<br>' .
                'inputEmail: ' . $arr['inputEmail']. '<br>' .
                'inputSubject: ' . $arr['inputSubject']. '<br>' .
                'inputMessage: ' . $arr['inputMessage'];
                break;
        }

      /*  $html .= "<html>";
        $html .= "<body>";
	       $html .= "<h4>". $subject ."</h4>";
	       $html .= $body;
	       $html .= "<br><br>";
	       $html .= "<p>Sent by RURAL_SHOP</p>";
		$html .= "</body>";
		$html .= "</html>";

        set_error_handler('ErrorHandler');
        try{
            $mail = email::getInstance();
            $mail->name = $arr['inputName'];
            if ($arr['type'] === 'admin')
                $mail->address = 'ruralshoponti@gmail.com';
            else
                $mail->address = $arr['inputEmail'];
            $mail->subject = $subject;
            $mail->body = $html;
        } catch (Exception $e) {
			$return = 0;
		}
		restore_error_handler();

        /*
        if ($mail->enviar()) {
            $return = 1;
        } else {
            $return = 0;
        }
        */

        $return = $mail->enviar();
        return $return;
    }

    function send_mailgun($email){
      $config = array();
      $config['api_key'] = "key-0d32063a19d690be82da3bfeb69a9e3b"; //API Key
      $config['api_url'] = "https://api.mailgun.net/v2/sandbox1811da627e3e450ebabe2e836ed20a3a.mailgun.org/messages"; //API Base URL

      $message = array();
      $message['from'] = "ruralshoponti@gmail.com";
      $message['to'] = $email;
      $message['h:Reply-To'] = "ruralshoponti@gmail.com";
      $message['subject'] = "Hello, this is a test";
      $message['html'] = 'Hello ' . $email . ',</br></br> This is a test';

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $config['api_url']);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }

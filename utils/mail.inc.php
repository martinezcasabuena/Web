<?php

function send_mailgun($name,$email,$messageContent){
  $config = array();
  $config['api_key'] = ""; //API Key
  $config['api_url'] = ""; //API Base URL

  $message = array();
  $message['from'] = "martinezcasabuena@gmail.com";
  $message['to'] = $email;
  $message['h:Reply-To'] = "martinezcasabuena@gmail.com";
  $message['subject'] = "Hello, this is a test";
  $message['html'] = 'Hello ' . $name . ',</br></br> This is a test:</br></br>'.$messageContent;

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

<?php

class Bosspay {

  var $url;

  function __construct() {

  }

  function init($url) {
    $this->url = $url;
  }

  function login($username, $password) {
    $data = array('username' => $username, 'password' => $password);
    return json_decode($this->post($this->url . '/api/login', $data));
  }

  function cash_in($token, $amount) {
    $data = array('token' => $token, 'amount' => $amount);
    return json_decode($this->post($this->url . '/api/cash_in', $data));
  }
  
  private function post($url, $data, $headers = array()) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $params = http_build_query($data);
    // echo $url . '<br>';
    // print_pre($headers);
    // print_pre($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
  }
}
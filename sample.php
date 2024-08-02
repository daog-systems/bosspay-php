<?php

include_once('src/Client.php');

// Sample
$client = new Bosspay\Client();
$client->init('http://localhost:8888/daog-systems/bosspay');
$response = $client->login('a', 'a');
$token = $response->token;

$reference_no = uniqid();
$response = $client->cash_in($token, 100, $reference_no);
print_r($response);

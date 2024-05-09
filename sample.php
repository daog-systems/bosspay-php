<?php

include_once('bosspay.php');

// Sample
$client = new Bosspay();
$client->init('http://localhost:8888/daog-systems/bosspay');
$response = $client->login('a', 'a');
$token = $response->token;

$response = $client->cash_in($token, 100);
print_r($response);
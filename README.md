# bosspay-api



## Endpoints

Base URL: http://localhost:8888/daog-systems/bosspay

### Login

Route
* /api/login

Parameters
* username - (string)
* password - (string)

Response
* status - (string); OK, Not OK
* token - (string), user token

## Transactions

Route
* /api/get_transactions

Parameters
* token - (string)

Response
* status - (string)
* transactions - (array)

## Cash-In

Route
* /api/cash_in

Parameters
* token - (string)
* amount - (decimal)

Response
* status - (string)
* redirect_url - (string); Payment gateway redirect url


## Webhook

Once payment is received, we'll POST data to your custom webhook URL with the payload structure below.

```
{"id":"xxx","user_id":"xxx","reference_no":"663993e2a914f"}
```

## Installation

Install via composer

```
> composer require daog-systems/bosspay-php
```

## Usage

```
<?php
require 'vendor/autoload.php';

// Sample
$client = new Bosspay\Client();
$client->init('http://localhost:8888/daog-systems/bosspay');
$response = $client->login('a', 'a');
$token = $response->token;

$response = $client->cash_in($token, 100);
print_r($response);
```

See sample.php
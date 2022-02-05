<?php
$username = '<api_key>';
$password = '<secret_key>';
$secure_token = '<secure_token>';

$Url = 'https://checkout.beem.africa/v1/checkout';

$reference_number = '<reference_number>';
$amount = '<amount>';
$mobile = '<mobile>';
$transaction_id = '<transaction_id>';
$sendSource = '<sendSource>';
$body = array('amount' => $amount, 'transaction_id' => $transaction_id, 'reference_number' => $reference_number, 'mobile' => $mobile, 'sendSource' => $sendSource);

// Setup cURL
$ch = curl_init();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$Url = $Url . '?' . http_build_query($body);

curl_setopt($ch, CURLOPT_URL, $Url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($ch, array(
    CURLOPT_HTTPGET => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic ' . base64_encode("$username:$password"),
        'Content-Type: application/json',
        'beem-secure-token: $secure_token',
    ),
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo $response;

    die(curl_error($ch));
}
var_dump($response);
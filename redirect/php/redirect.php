<?php
$username='<api_key>';
$password = '<secret_key>';

$Url ='https://checkout.beem.africa/v1/checkout';

 
 $reference_number='<reference_number>'; 
 $amount ='<amount>'; 
 $mobile ='<mobile>'; 
 $sendSource ='<sendSource>'; 
 $body = array('amount'=>$amount,'reference_number'=>$reference_number,'mobile'=>$mobile,'sendSource'=>$sendSource);

// Setup cURL
$ch = curl_init($Url);
error_reporting(E_ALL);
ini_set('display_errors', 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($ch, array(
    CURLOPT_HTTPGET => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic ' . base64_encode("$username:$password"),
        'Content-Type: application/json'
    ),
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
        echo $response;

    die(curl_error($ch));
}
var_dump($response);
?>
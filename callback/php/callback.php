<?php

$data = file_get_contents('php://input');
$data = json_decode($data, true);

    $amount=$data['amount'];
    $referenceNumber=$data['referenceNumber'];
    $status=$data['status'];
    $timestamp=$data['timestamp'];
    $transactionID=$data['transactionID'];
    $msisdn=$data['msisdn'];

//Your logic here ... 

 $res= array('amount' => $amount, 
             'status' => true/false,
             'referenceNumber'=> $referenceNumber,
             'statusMessage'=>'Your message here',
             'transactionID'=> $transactionID
);
    
$json = json_encode($res);

echo $json;
?>
<?php
include 'dbconnect.php';
session_start();


header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "Tenant-payment.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);


// $data = json_decode($stkCallbackResponse);

// $MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
// $CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
// $ResultCode = $data->Body->stkCallback->ResultCode;
// $ResultDesc = $data->Body->stkCallback->ResultDesc;
// $Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
// $TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
// $UserPhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;
// //CHECK IF THE TRASACTION WAS SUCCESSFUL 
// // if ($ResultCode == 0) {
// //   echo "<script> alert('Write Your Mpesa Pin) </script>";

// // }
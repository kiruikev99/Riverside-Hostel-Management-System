<?php

include("connection.php");


session_start();
if (isset($_POST['submit'])) {

    $fname= $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $date =($_POST['date']);

    $_SESSION['mpesanum'] = $_POST['mpesanum'];
    $_SESSION['amount'] =  $_POST['amount'];

}
$amount = 
// Extract and process the callback data
$callbackData = file_get_contents('php://input');
$callbackData = json_decode($callbackData);

// Extract relevant information from $callbackData
$transactionId = $callbackData->Body->stkCallback->CheckoutRequestID;
$_SESSION['amount'] = $callbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value;

// Store $transactionId and $amount in your PHPMyAdmin database
// Implement your database connection and insertion logic here

// Respond to Safaricom with an empty HTTP 200 response
http_response_code(200);
?>
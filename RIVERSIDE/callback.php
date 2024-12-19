<?php
session_start();
include 'dbconnect.php';

header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "Transactions.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse);

$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$ResultDesc = $data->Body->stkCallback->ResultDesc;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$UserPhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;
$date = date("l jS \of F Y h:i:s A");
//CHECK IF THE TRASACTION WAS SUCCESSFUL 
if ($ResultCode == 0) {
  $fname = isset($_GET['fname']) ? $_GET['fname'] : null;
  $lname = isset($_GET['lname']) ? $_GET['lname'] : null; 
  $usernumber = isset($_GET['phone1']) ? $_GET['phone1'] : null;
  $gender = isset($_GET['gender']) ? $_GET['gender'] : null; 
  $tenantid = isset($_GET['fname']) ? $_GET['tenantid'] : null;
  $university = isset($_GET['university']) ? $_GET['university'] : null; 
  $status = 'Booked';
  //STORE THE TRANSACTION DETAILS IN THE DATABASE
  mysqli_query($conn, "INSERT INTO mpesa_transactions (MerchantRequestID, CheckoutRequestID, ResultCode, Amount, TransactionId, UserPhoneNumber, Date) 
  VALUES ('$MerchantRequestID', '$CheckoutRequestID', '$ResultCode', '$Amount', '$TransactionId', '$UserPhoneNumber', '$date')");
  
  mysqli_query($conn, "UPDATE blockabooking 
  SET 
      Status = '$status',
      Name = '$fname',
      LastName = '$lname',
      StudentPhoneNumber = '$usernumber',
      Gender = '$gender',
      University = '$university',
      NumberPaid = '$UserPhoneNumber',
      TransactionId = '$TransactionId' 
  WHERE RoomNo = '$tenantid'");
  echo $fname;
  
}
else{ 
  echo "wozza";
}
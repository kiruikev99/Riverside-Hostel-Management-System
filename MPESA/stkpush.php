<?php
include "dbconnect.php";
include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://b6d3-105-163-1-224.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/MPESA/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');

// ENCRYPT DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = $_POST['mpesanum']; // Phone number to receive the stk push
$money = $_POST['amount'];

$PartyA = $phone;
$PartyB = '254722388926';
$AccountReference = 'RIVERSIDE';
$TransactionDesc = 'stkpush test';
$Amount = $money;

$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

// INITIATE CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); // Setting custom header
$curl_post_data = array(
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $callbackurl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
$curl_response;

$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$ResponseCode = $data->ResponseCode;

if ($ResponseCode == "0") {
    header("Location: /Admin-RIVERSIDE/PROJECT%20WORK/Riverside.php");
    echo 'echo <script>alert("Welcome to Geeks for Geeks")</script>';;

    // Replace with your database credentials
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ID = $_POST['id'];
    $numpaid = $_POST['mpesanum'];
    $Amount = $_POST['amount'];

    // Using prepared statements to prevent SQL injection
    $sql = "INSERT INTO `riversidebookings` (`First Name`, `Last Name`, ID, NumberPaid, TransactionID, AmountPaid)
          VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssd", $fname, $lname, $ID, $numpaid, $CheckoutRequestID, $Amount);

    if ($stmt->execute()) {
        echo "alert('New record created successfully')";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

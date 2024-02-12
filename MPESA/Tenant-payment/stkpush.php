<?php
include "dbconnect.php";
include 'accessToken.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {



date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://38cd-105-163-0-248.ngrok-free.app /Admin-RIVERSIDE/PROJECT%20WORK/MPESA/Tenant-payment/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');

// ENCRYPT DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = $_POST['phone']; // Phone number to receive the stk push
$money = $_POST['amount'];;

$PartyA = $phone;
$PartyB = '254722388926';
$AccountReference = 'Room Payment Riverside Hostel';
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
    echo  '<script>
    window.location.href = "/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/fiancebase.php";
    alert("Plese write your Pin")
    </script>';
    // Replace with your database credentials
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $roomNo = $_SESSION['RoomNo'];
  

     // Retrieve the original amount from the database based on the room number
     $sql = "SELECT MonthBalance FROM tenantaccount WHERE RoomNo = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $roomNo);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     $originalAmount = $row['MonthBalance'];

     $newAmount = $originalAmount - $Amount;

    // Update the database with the new amount for the specific room
    $updateSql = "UPDATE tenantaccount SET MonthBalance = ? WHERE RoomNo = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ds", $newAmount, $roomNo);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        echo  '<script>
        window.location.href = "/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/fiancebase.php";
        alert("Success")
        </script>';
    } else {
        echo  '<script>
        window.location.href = "/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/fiancebase.php";
        alert("Failed")
        </script>';
    }
}
}


    

?>

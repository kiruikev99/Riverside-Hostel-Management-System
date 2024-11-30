<?php
include 'dbconnect.php';
include 'accesstoken.php';
header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "RiversideMpesaResponse.json";
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $mpesanum = $_POST["mpesanum"];
    $tenantid = $_POST['tenantid'];
    $university = $_POST["university"];

    // Validation
    $errors = array();
    if (strlen($fname) < 3) {
        $errors[] = "First Name must be at least 3 characters long.";
    }
    if (preg_match('/\d/', $fname)) {
        $errors[] = "First Name must not contain numbers.";
    }
    if (strlen($lname) < 3) {
        $errors[] = "Last Name must be at least 3 characters long.";
    }
    if (preg_match('/\d/', $lname)) {
        $errors[] = "Last Name must not contain numbers.";
    }

    // Remove any spaces or hyphens in the phone number
    $phone = str_replace(array(' ', '-'), '', $phone);
    if (substr($phone, 0, 1) == '0') {
        $phone = '254' . substr($phone, 1);
    }
    if (substr($phone, 0, 1) == '7') {
        $phone = '254' . $phone;
    }
    if (strlen($phone) != 12) {
        $errors[] = "Invalid phone number format.";
    }

    if (count($errors) > 0) {
        echo '<script>';
        foreach ($errors as $error) {
            echo "Swal.fire('Error', '$error', 'error');";
        }
        echo '</script>';
    } else {
        // Proceed with STK push
        date_default_timezone_set('Africa/Nairobi');
        $processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $callbackurl = 'https://0362-41-80-112-234.ngrok-free.app/Riverside-Hostel-Management-System/RIVERSIDE/callbackblocka.php';
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = '174379';
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
        $PartyA = $phone;
        $PartyB = $BusinessShortCode;
        $AccountReference = 'RIVERSIDE HOSTELS';
        $TransactionDesc = 'Room Booking';
        $Amount = '1';z32
        $stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

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

        // Initiate CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $curl_error = curl_error($curl);

        echo '<pre>';
        print_r($curl_response);
        echo '</pre>';

        if ($curl_response === false) {
            echo '<script>Swal.fire("Error", "CURL Error: ' . $curl_error . '", "error");</script>';
        }
    }
}

$stats = "booked";

if ($data->ResponseCode == "0") {

include 'paymentblocka.php';

    $query = "UPDATE blockabooking 
        SET `Status` = ?, 
            `Name` = ?, 
            LastName = ?, 
            StudentPhoneNumber = ?, 
            Gender = ?, 
            University = ?,
            NumberPaid = ?
        WHERE RoomNo = ?";  // Changed to use parameter binding for RoomNo
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Add $tenantid to the bind_param call
        mysqli_stmt_bind_param($stmt, "ssssssss", $stats, $fname, $lname, $phone, $gender, $university, $mpesanum, $tenantid);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "STK PUSH SUCCESS!",
                    text: "Please Enter Your MPESA Pin To Complete Booking",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "riverside.php";
                });
            </script>';
        } else {
            echo '<script>Swal.fire("Error", "Database update failed: ' . mysqli_error($conn) . '", "error");</script>';
        }
        mysqli_stmt_close($stmt);
    }
}
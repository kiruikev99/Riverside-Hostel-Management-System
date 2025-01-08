<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Pesa Payment</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
</body>
</html>


<?php


include 'accesstoken.php';

$user = isset($_GET['user']) ? $_GET['user'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $_SESSION["phone"]  = $_POST["phone"];
    $_SESSION["amount"]  = $_POST["amount"];
    $_SESSION["user"] = $user;

    // Validation
    $errors = array();

    if (!is_numeric($_SESSION["amount"]) || $_SESSION["amount"] <= 0) {
        $errors[] = "Amount must be a positive number.";
    }

    // Remove any spaces or hyphens in the phone number
    $_SESSION["phone"] = str_replace(array(' ', '-'), '', $_SESSION["phone"]);

    // If the phone number starts with '0', replace '0' with '254'
    if (substr($_SESSION["phone"], 0, 1) == '0') {
        $_SESSION["phone"] = '254' . substr($_SESSION["phone"], 1);
    }

    // If the phone number starts with '7', add '254' at the beginning
    if (substr($_SESSION["phone"], 0, 1) == '7') {
        $_SESSION["phone"] = '254' . $_SESSION["phone"];
    }

    // Ensure the phone number is 12 digits long (international format)
    if (strlen($_SESSION["phone"]) != 12) {
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
        $callbackurl =  'http://rnqoo-105-163-2-125.a.free.pinggy.link/Riverside-Hostel-Management-System/ECARE/callback.php'; // Replace with your active ngrok URL
        $callbackurl .= '?phone=' . urlencode($_SESSION["phone"]);
        $callbackurl .= '&amount=' . urlencode($_SESSION["amount"]);
        $callbackurl .= '&user=' . urlencode($_SESSION["user"]);
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = '174379';
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
        $PartyA = $_SESSION["phone"];
        $PartyB = $BusinessShortCode;
        $AccountReference = 'RIVERSIDE HOSTELS';
        $TransactionDesc = 'Rent Payment';
        $Amount = $_SESSION["amount"];
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

        // echo '<pre>';
        // print_r($curl_response);
        // echo '</pre>';

        if ($curl_response === false) {
            echo '<script>Swal.fire("Error", "CURL Error: ' . $curl_error . '", "error");</script>';
        } else {
            $data = json_decode($curl_response);
            if (isset($data->ResponseCode) && $data->ResponseCode == "0") {

                echo '
                    
                <script>
                    Swal.fire({
                        title: "Success",
                        text: "Please Enter Your MPESA Pin, If Successful you will receive a Confirmation Email.",
                        icon: "success",
                        confirmButtonText: "Okay"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "tenantbase.php"; // Redirects to riverside.php
                        }
                    });
                </script>';    } 
                
                else {
                $errorMessage = $data->errorMessage ?? 'Unknown error occurred';
                echo '<script>Swal.fire("Error", "M-Pesa API Error: ' . $errorMessage . '", "error");</script>';
            }
        }
    }

        }
//                
            

?>
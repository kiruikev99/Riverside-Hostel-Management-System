<?php
// Include required files
include 'dbconnect.php';
include 'accesstoken.php';
include 'paymentblocka.php';

// Set the header to JSON
header("Content-Type: application/json");

// Log the callback response
$logFile = "RiversideMpesaResponse.json";
$stkCallbackResponse = file_get_contents('php://input');
file_put_contents($logFile, $stkCallbackResponse, FILE_APPEND);

// Decode the JSON response
$data = json_decode($stkCallbackResponse);

if ($data && isset($data->Body->stkCallback)) {
    $stkCallback = $data->Body->stkCallback;

    $MerchantRequestID = $stkCallback->MerchantRequestID ?? null;
    $CheckoutRequestID = $stkCallback->CheckoutRequestID ?? null;
    $ResultCode = $stkCallback->ResultCode ?? null;
    $ResultDesc = $stkCallback->ResultDesc ?? null;

    // Handle metadata if present
    $CallbackMetadata = $stkCallback->CallbackMetadata->Item ?? [];
    $Amount = $CallbackMetadata[0]->Value ?? null;
    $TransactionId = $CallbackMetadata[1]->Value ?? null;
    $UserPhoneNumber = $CallbackMetadata[4]->Value ?? null;

    // Log the extracted data
    error_log("STK Callback Data: MerchantRequestID=$MerchantRequestID, ResultCode=$ResultCode, Amount=$Amount");

    // Process the callback response
    if ($ResultCode == 0) {
        // Successful transaction - Update the database
        $query = "UPDATE blockabooking 
                  SET `Status` = ?, 
                      `NumberPaid` = ?, 
                      `TransactionId` = ? 
                  WHERE `StudentPhoneNumber` = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            $status = "Booked";
            mysqli_stmt_bind_param($stmt, "ssss", $status, $Amount, $TransactionId, $UserPhoneNumber);

            if (mysqli_stmt_execute($stmt)) {
                error_log("Database updated successfully for phone number $UserPhoneNumber.");
            } else {
                error_log("Database update failed: " . mysqli_error($conn));
            }
        } else {
            error_log("Prepared statement error: " . mysqli_error($conn));
        }

        // Send success response
        echo json_encode(['status' => 'success', 'message' => 'Payment processed successfully and database updated.']);
    } else {
        // Failed transaction
        echo json_encode(['status' => 'error', 'message' => $ResultDesc]);
    }
} else {
    // Invalid callback
    error_log("Invalid STK Callback Response");
    echo json_encode(['status' => 'error', 'message' => 'Invalid callback response']);
}


        // Initialize STK push for payment
        date_default_timezone_set('Africa/Nairobi');
        $processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $callbackurl = 'https://df9d-105-163-157-15.ngrok-free.app/Riverside-Hostel-Management-System/RIVERSIDE/callbackblocka.php';
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = '174379';
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
        $PartyA = $phone;
        $PartyB = $BusinessShortCode;
        $AccountReference = 'RIVERSIDE HOSTELS';
        $TransactionDesc = 'Room Booking';
        $Amount = '1'; // Amount to charge
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

        if ($curl_response === false) {
            echo '<script>Swal.fire("Error", "CURL Error: ' . $curl_error . '", "error");</script>';
        } else {
            echo '<script>
                Swal.fire({
                    title: "STK PUSH SENT!",
                    text: "Please Enter Your MPESA Pin To Complete Payment.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "riverside.php";
                });
            </script>';
        }

?>

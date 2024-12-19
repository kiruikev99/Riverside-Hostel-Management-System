<?php
// process_mpesa_response.php
// This script processes the M-Pesa response and prepares global variables

// Include database connection
include 'dbconnect.php';

// Global variables to store transaction details
$GLOBALS['transaction_details'] = [
    'status' => 'pending',
    'merchant_request_id' => '',
    'checkout_request_id' => '',
    'result_code' => '',
    'result_description' => '',
    'amount' => '',
    'transaction_id' => '',
    'phone_number' => '',
    'timestamp' => date('Y-m-d H:i:s')
];

function processMpesaResponse() {
    $processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $callbackurl = 'https://your-callback-url.com/callbackblocka.php'; // Replace with your actual callback URL
    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');
    $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
    $PartyA = $phone;
    $PartyB = $BusinessShortCode;
    $AccountReference = 'RIVERSIDE HOSTELS';
    $TransactionDesc = 'Room Booking';
    $Amount = '1'; // Amount to charge

    // Prepare STK Push headers
    $stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

    // Prepare STK Push data
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
    // Log file path
    $logFile = "RiversideMpesaResponse.json";

    // Check if log file exists
    if (!file_exists($logFile)) {
        error_log("Response log file not found.");
        return false;
    }

    // Read the last line of the log file (most recent transaction)
    $fileContents = file($logFile, FILE_IGNORE_NEW_LINES);
    if (empty($fileContents)) {
        error_log("No response logs found.");
        return false;
    }

    // Get the last log entry
    $lastEntry = end($fileContents);
    
    // Decode JSON response
    $data = json_decode($lastEntry, true);

    // Check if data is valid
    if (!$data || !isset($data['Body']['stkCallback'])) {
        error_log("Invalid or malformed response");
        return false;
    }

    $stkCallback = $data['Body']['stkCallback'];

    // Extract callback metadata
    $callbackMetadata = $stkCallback['CallbackMetadata']['Item'] ?? [];

    // Populate global transaction details
    $GLOBALS['transaction_details'] = [
        'status' => $stkCallback['ResultCode'] == 0 ? 'success' : 'failed',
        'merchant_request_id' => $stkCallback['MerchantRequestID'] ?? '',
        'checkout_request_id' => $stkCallback['CheckoutRequestID'] ?? '',
        'result_code' => $stkCallback['ResultCode'] ?? '',
        'result_description' => $stkCallback['ResultDesc'] ?? '',
        'amount' => '',
        'transaction_id' => '',
        'phone_number' => '',
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Extract additional details from metadata
    foreach ($callbackMetadata as $item) {
        switch ($item['Name']) {
            case 'Amount':
                $GLOBALS['transaction_details']['amount'] = $item['Value'] ?? '';
                break;
            case 'MpesaReceiptNumber':
                $GLOBALS['transaction_details']['transaction_id'] = $item['Value'] ?? '';
                break;
            case 'PhoneNumber':
                $GLOBALS['transaction_details']['phone_number'] = $item['Value'] ?? '';
                break;
        }
    }

    // Log the processed details
    error_log("Processed Transaction: " . print_r($GLOBALS['transaction_details'], true));

    // Return true if transaction was successful
    return $GLOBALS['transaction_details']['status'] === 'success';
}

// Function to update booking status in database
function updateBookingStatus() {
    global $conn;

    $details = $GLOBALS['transaction_details'];

    // Prepare update query
    $query = "UPDATE blockabooking 
              SET `Status` = 'Booked', 
                  `AmountPaid` = ?, 
                  `TransactionId` = ? 
              WHERE `StudentPhoneNumber` = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", 
            $details['amount'], 
            $details['transaction_id'], 
            $details['phone_number']
        );
        
        if (mysqli_stmt_execute($stmt)) {
            error_log("Booking status updated successfully for phone {$details['phone_number']}");
            return true;
        } else {
            error_log("Failed to update booking status: " . mysqli_error($conn));
            return false;
        }
    } else {
        error_log("Prepared statement error: " . mysqli_error($conn));
        return false;
    }
}
?>
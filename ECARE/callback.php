<?php
session_start();

include 'connection.php';

header("Content-Type: application/json");

// Log the incoming M-Pesa callback response
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "MpesaTenant.json";

if (!$stkCallbackResponse) {
    error_log("Callback received no data", 3, "error.log");
    die(json_encode(["error" => "No data received"]));
}

// Log raw data for debugging
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse . "\n");
fclose($log);

// Validate JSON
$data = json_decode($stkCallbackResponse);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("Invalid JSON received in callback: " . json_last_error_msg(), 3, "error.log");
    die(json_encode(["error" => "Invalid JSON format"]));
}

// Confirm required structure
if (!isset($data->Body->stkCallback)) {
    error_log("Callback missing stkCallback structure", 3, "error.log");
    die(json_encode(["error" => "Invalid callback structure"]));
}

// Extract necessary fields
$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID ?? null;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID ?? null;
$ResultCode = $data->Body->stkCallback->ResultCode ?? null;
$ResultDesc = $data->Body->stkCallback->ResultDesc ?? null;

$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value ?? 0;
$TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value ?? '';
$UserPhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value ?? '';

// Process successful transactions
if ($ResultCode == 0) {
    $username = isset($_GET['user']) ? $_GET['user'] : null;
    $method = 'Mpesa';
    $date = date("Y-m-d H:i:s"); // Current date and time

    // Begin a transaction to ensure consistency
    mysqli_begin_transaction($conn);

    try {
        // Retrieve the current balance and RoomNo for the user
        $balanceQuery = "SELECT MonthBalance, RoomNo FROM tenantaccountblocka WHERE Username = ?";
        $balanceStmt = mysqli_prepare($conn, $balanceQuery);
        mysqli_stmt_bind_param($balanceStmt, "s", $username);
        mysqli_stmt_execute($balanceStmt);
        $balanceResult = mysqli_stmt_get_result($balanceStmt);

        if ($balanceResult && mysqli_num_rows($balanceResult) > 0) {
            $balanceRow = mysqli_fetch_assoc($balanceResult);
            $currentBalance = $balanceRow['MonthBalance'];
            $roomNo = $balanceRow['RoomNo'];

            // Calculate the new balance
            $newBalance = max(0, $currentBalance - $Amount);

            // Update the user's MonthBalance
            $updateQuery = "UPDATE tenantaccountblocka SET MonthBalance = ? WHERE Username = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "ds", $newBalance, $username);
            if (!mysqli_stmt_execute($updateStmt)) {
                throw new Exception("Failed to update balance: " . mysqli_error($conn));
            }

            // Insert the transaction into the tenanttransactions table
            $insertQuery = "INSERT INTO tenanttransactions (RoomNo, Username, NumberPaid, AmountPaid, Balance, TransactionId, Date) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "sssssss", $roomNo, $username, $UserPhoneNumber, $Amount, $newBalance, $TransactionId, $date);
            if (!mysqli_stmt_execute($insertStmt)) {
                throw new Exception("Failed to insert transaction: " . mysqli_error($conn));
            }

            // Commit the transaction
            mysqli_commit($conn);

            // Success response with SweetAlert
            echo '<script type="text/javascript">
            Swal.fire({
                title: "Payment Successful!",
                text: "Your payment has been received and the balance has been updated.",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.location.href = "tenantbase.php";
            });
            </script>';
        } else {
            // throw new Exception("User not found or invalid data for username: $username");
        }
    } catch (Exception $e) {
        // Rollback the transaction on error
        mysqli_rollback($conn);

        // Error response
        echo '<script type="text/javascript">
        Swal.fire({
            title: "Error",
            text: "' . $e->getMessage() . '",
            icon: "error",
            confirmButtonText: "OK"
        });
        </script>';
    } finally {
        // Close statements
        if (isset($balanceStmt)) mysqli_stmt_close($balanceStmt);
        if (isset($updateStmt)) mysqli_stmt_close($updateStmt);
        if (isset($insertStmt)) mysqli_stmt_close($insertStmt);

        // Close the database connection
        mysqli_close($conn);
    }
} else {
    // Handle failed transactions
    echo '<script type="text/javascript">
    Swal.fire({
        title: "Transaction Failed",
        text: "' . $ResultDesc . '",
        icon: "error",
        confirmButtonText: "OK"
    });
    </script>';
}
?>

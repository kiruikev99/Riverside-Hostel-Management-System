<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

// CHECK IF THE TRANSACTION WAS SUCCESSFUL
if ($ResultCode == 0) {
    $fname = isset($_GET['fname']) ? $_GET['fname'] : null;
    $lname = isset($_GET['lname']) ? $_GET['lname'] : null;
    $usernumber = isset($_GET['phone1']) ? $_GET['phone1'] : null;
    $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
    $tenantid = isset($_GET['tenantid']) ? $_GET['tenantid'] : null;
    $university = isset($_GET['university']) ? $_GET['university'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $status = 'Booked';

    // STORE THE TRANSACTION DETAILS IN THE DATABASE
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

    // SEND EMAIL
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your mail server here
        $mail->SMTPAuth = true;
        $mail->Username = 'riversidehostels@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'vgkizurrywyuyhwm
';   // Replace with your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('riversidehostels@gmail.com', 'Riverside Hostels'); // Sender email and name
        $mail->addAddress($email); // Recipient email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body = "
        <div style='display: center'>
          <img width='180' src='https://fe52-105-163-1-123.ngrok-free.app /Riverside-Hostel-Management-System/RIVERSIDE/images/riverside-logo.png'>
        </div>
            <h2> Room $tenantid Confirmation   </h2>
            <p>Dear $fname $lname,</p>
            <p>Thank you for Booking. Your transaction was successful.</p>
            <p><b>Please note</b> You are Required to Move in 1 Week Prior your University Opening date To avoid Inconvinience<br> Tenants Acconts will also be made once they have settled</p>
            <p><strong>Transaction Details:</strong></p>
            <ul>
                <li>Room No:  $tenantid</li>
                <li>Amount: KES $Amount</li>
                <li>Transaction ID: $TransactionId</li>
                <li>Date: $date</li>
            </ul>
            <p>Regards,<br>Riverside Hostels</p>
        ";

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    echo $fname;
} else {
    echo "Transaction failed.";
}

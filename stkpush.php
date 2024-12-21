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
// INCLUDE THE ACCESS TOKEN FILE
include 'accesstoken.php';

// Retrieve tenant ID from query parameters
$tenantid = isset($_GET['tenantid']) ? $_GET['tenantid'] : '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and store form data in session
    $_SESSION["fname1"] = $_POST["fname"];
    $_SESSION["lname1"] = $_POST["lname"];
    $_SESSION["phone1"] = $_POST["phone"];
    $_SESSION["gender1"] = $_POST["gender"];
    $_SESSION["mpesanum1"] = $_POST["mpesanum"];
    $_SESSION["tenantid1"] = $tenantid;
    $_SESSION["unvisity1"] = $_POST["university"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["status1"] = "Booked"; // Status to update

    // Validate form data
    $errors = [];
    if (strlen($_SESSION["fname1"]) < 3 || preg_match('/\d/', $_SESSION["fname1"])) {
        $errors[] = "First Name must be at least 3 characters long and not contain numbers.";
    }
    if (strlen($_SESSION["lname1"]) < 3 || preg_match('/\d/', $_SESSION["lname1"])) {
        $errors[] = "Last Name must be at least 3 characters long and not contain numbers.";
    }

    // Clean and validate phone number
    $_SESSION["phone1"] = str_replace([' ', '-'], '', $_SESSION["phone1"]);
    if (substr($_SESSION["phone1"], 0, 1) === '0') {
        $_SESSION["phone1"] = '254' . substr($_SESSION["phone1"], 1);
    } elseif (substr($_SESSION["phone1"], 0, 1) === '7') {
        $_SESSION["phone1"] = '254' . $_SESSION["phone1"];
    }
    if (strlen($_SESSION["phone1"]) != 12) {
        $errors[] = "Invalid phone number format.";
    }

    // Display errors using SweetAlert
    if (!empty($errors)) {
        echo '<script>';
        foreach ($errors as $error) {
            echo "Swal.fire('Error', '$error', 'error');";
        }
        echo '</script>';
        exit();
    }

    // Set up M-Pesa STK Push request
    date_default_timezone_set('Africa/Nairobi');
    $processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $callbackurl = 'https://7c5f-105-160-72-131.ngrok-free.app/Riverside-Hostel-Management-System/RIVERSIDE/callback.php';
    $callbackurl .= '?fname=' . urlencode($_SESSION["fname1"]);
    $callbackurl .= '&lname=' . urlencode($_SESSION["lname1"]);
    $callbackurl .= '&phone1=' . urlencode($_SESSION["phone1"]);
    $callbackurl .= '&gender=' . urlencode($_SESSION["gender1"]);
    $callbackurl .= '&tenantid=' . urlencode($_SESSION["tenantid1"]);
    $callbackurl .= '&university=' . urlencode($_SESSION["unvisity1"]);
    $callbackurl .= '&email=' . urlencode($_SESSION["email"]);

    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');
    $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);

    $phone = $_SESSION["mpesanum1"]; // Phone number to receive the STK push
    $money = '1';
    $stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

    // Prepare the STK Push payload
    $curl_post_data = [                 
        'BusinessShortCode' => $BusinessShortCode,
        'Password' => $Password,
        'Timestamp' => $Timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $money,
        'PartyA' => $phone,
        'PartyB' => $BusinessShortCode,
        'PhoneNumber' => $phone,
        'CallBackURL' => $callbackurl,
        'AccountReference' => 'RIVERSIDE HOSTELS',
        'TransactionDesc' => 'Room Booking Payment'
    ];

    // Initiate cURL request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

    // Execute cURL and handle response
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        echo '<script>Swal.fire("Error", "Failed to connect to M-Pesa API: ' . curl_error($curl) . '", "error");</script>';
        exit();
    }

    $data = json_decode($curl_response);
    $ResponseCode = $data->ResponseCode ?? null;
    $CheckoutRequestID = $data->CheckoutRequestID ?? null;

    if ($ResponseCode === "0") {
        echo '
        <script>
            Swal.fire({
                title: "Success",
                text: "Please Enter Your MPESA Pin, If Successful you will receive a Confirmation Email.",
                icon: "success",
                confirmButtonText: "Okay"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "riverside.php"; // Redirects to riverside.php
                }
            });
        </script>';    } 
        
        else {
        $errorMessage = $data->errorMessage ?? 'Unknown error occurred';
        echo '<script>Swal.fire("Error", "M-Pesa API Error: ' . $errorMessage . '", "error");</script>';
    }
}
?>

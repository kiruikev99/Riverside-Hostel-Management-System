<?php

include ("connection.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row['FirstName'];
    $lastName = $row['LastName'];
    $_SESSION["payroom"] = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $balance = $row['MonthBalance'];
    $university = $row['University'];
    $checkin = $row['Checkin'];
    
    $date = date("Y-m-d");
    $formattedDate = date("M", strtotime($date));

    $_SESSION["wame"] = $row['FirstName'];
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE - Financial Records</title>
    <style>
           @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap');

        body {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            background: #f0f4f8;
            color: #333;
        }

        .main {
            background: #e0f7fa;
            padding: 20px;
            min-height: 100vh;
        }

        .header {
            text-align: left;
            color: #00796b;
            font-weight: 700;
            font-style: bold;
            padding-top: 40px;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 3.5rem;
        }

        .header span {
            display: block;
            font-size: 3.5rem;
            margin-top: 10px;
        }

        .boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-bottom: 20px;
        }

        .box {
            background-color: #4db6ac;
            color: white;
            width: 250px;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: black;
        }

        .box p {
            margin: 5px 0;
            font-family: Arial, Helvetica, sans-serif;
            color: aliceblue;
        }

        .notices {
            text-align: center;
            margin-top: 20px;
        }

        .notices h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #00796b;
        }

        .notices-border {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 60%;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notices-border p {
            margin: 0;
            color: #333;
        }

        marquee {
            color: white;
            background-color: #00796b;
            padding: 10px;
            font-size: 1rem;
        }

        .BTN {
            padding: 20px 100px;
            background: greenyellow;
            color: grey;
            border: none;
        }

        .BTN:hover {
            background-color: green;
            color: white;
            transition: color 0.3s, background-color 0.3s;
            cursor: pointer;
        }

        .payment-form {
            background-color: aliceblue;
            padding: 100px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-form h3 {
            font-family: 'Alegreya', serif;
        }

        .payment-form label {
            font-family: 'Rajdhani', sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .payment-form input {
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 3px solid white;
            margin-bottom: 10px;
        }

        .payment-form button {
            padding: 10px;
            width: 100px;
            border-radius: 5px;
            background-color: green;
            color: white;
            border: none;
        }

        .payment-form button:hover {
            background-color: darkgreen;
            cursor: pointer;
        }

        .balance-box {
            background-color: aliceblue;
            padding: 100px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .split {
            display: flex;
            gap: 30px;
            justify-content: center;

        }

        @media (max-width: 600px) {
            .split {
                display: block;
            }

        }
    </style>
</head>

<body>
    <marquee scrollamount="15" direction="left">If you have an issue with your portal, please contact 0743928989!</marquee>

    <div class="main">
        <?php include ('base.php'); ?>

        <div class="header">
            <h1><?php echo $name; ?>'s Financial Records</h1>
        </div>
        <div class="split">
            <div class="balance-box">
                <h1>CURRENT</h1>
                <img width="200" src="images/rent.png">
                <h2><?php echo $formattedDate; ?> Balance: <?php echo $balance; ?></h2>
                <br><br>
                <a style="font-size: 25px" href="transactionpdf.php"> View Transaction PDF</a>
            </div>

            <div class="payment-form">

                <img width="200" src="images/mpesa.png">
                <h3>Pay Rent</h3>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="phone">Phone Number</label><br>
                    <input type="number" name="phone" id="phone" placeholder="Enter your phone number" required><br>
                    <label for="amount">Amount</label><br>
                    <input type="number" name="amount" id="amount" placeholder="Amount" required><br>
                    <button type="submit">Pay</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>

<?php
include 'accesstoken.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $phone = $_POST["phone"];
    $amount = $_POST["amount"];

    // Validation
    $errors = array();

    if (!is_numeric($amount) || $amount <= 0) {
        $errors[] = "Amount must be a positive number.";
    }

    // Remove any spaces or hyphens in the phone number
    $phone = str_replace(array(' ', '-'), '', $phone);

    // If the phone number starts with '0', replace '0' with '254'
    if (substr($phone, 0, 1) == '0') {
        $phone = '254' . substr($phone, 1);
    }

    // If the phone number starts with '7', add '254' at the beginning
    if (substr($phone, 0, 1) == '7') {
        $phone = '254' . $phone;
    }

    // Ensure the phone number is 12 digits long (international format)
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
        $callbackurl = 'https://2327-105-163-0-210.ngrok-free.app/Riverside-Hostel-Management-System/ECARE/callback.php'; // Replace with your active ngrok URL
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = '174379';
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
        $PartyA = $phone;
        $PartyB = $BusinessShortCode;
        $AccountReference = 'RIVERSIDE HOSTELS';
        $TransactionDesc = 'Rent Payment';
        $Amount = $amount;
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
        } else {
            $data = json_decode($curl_response);
            if (isset($data->ResponseCode) && $data->ResponseCode == "0") {
                //INCLUDING IN THE DATABASE
                include ("connection.php");

                // Get room number from session
                $roomNo = $_SESSION['payroom'];
                $date = date("Y-m-d");
                $method = 'Mpesa';

                // Retrieve current balance
                $balanceQuery = "SELECT MonthBalance FROM tenantaccount WHERE RoomNo = ?";
                $balanceStmt = mysqli_prepare($conn, $balanceQuery);
                mysqli_stmt_bind_param($balanceStmt, "s", $roomNo);
                mysqli_stmt_execute($balanceStmt);
                $balanceResult = mysqli_stmt_get_result($balanceStmt);

                if ($balanceResult && mysqli_num_rows($balanceResult) > 0) {
                    $balanceRow = mysqli_fetch_assoc($balanceResult);




                    $currentBalance = $balanceRow['MonthBalance']; //Gets the current month balance before it is updated

                    // Calculate new balance
                    $newBalance = $currentBalance - $amount; //Where the before month balance is subtracted from the amount 

                    if ($newBalance < 0) {
                        // If new balance is negative, set it to 0
                        $newBalance = 0;
                    }

                    // Update the balance in the database
                    $updateQuery = "UPDATE tenantaccount SET MonthBalance = ? WHERE RoomNo = ?";
                    $updateStmt = mysqli_prepare($conn, $updateQuery);

                    if ($updateStmt) {
                        mysqli_stmt_bind_param($updateStmt, "ds", $newBalance, $roomNo); //Where the new balance is updated
                        if (mysqli_stmt_execute($updateStmt)) {


                            //Abl
                            // Insert transaction into tenanttransactions table
                            $insertQuery = "INSERT INTO tenanttransactions (RoomNo, FirstName, LastName, NumberPaid, AmountPaid, Balance, Method, Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                            $insertStmt = mysqli_prepare($conn, $insertQuery);

                            if ($insertStmt) {
                                mysqli_stmt_bind_param($insertStmt, "ssssssss", $roomNo, $name, $lastName, $phone, $amount, $newBalance, $method, $date);
                                if (mysqli_stmt_execute($insertStmt)) {
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
                                    echo "Error: " . mysqli_error($conn);
                                }
                                mysqli_stmt_close($insertStmt);
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        mysqli_stmt_close($updateStmt);
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error fetching current balance.";
                }

                mysqli_stmt_close($balanceStmt);
                mysqli_close($conn);

            } else {
                echo '<script>Swal.fire("Error", "Request Failed. Please try again.", "error");</script>';
            }
        }
    }
}
?>

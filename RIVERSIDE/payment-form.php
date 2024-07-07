<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/logo.png" type="image/icon type">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <title>BOOKING</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
         @import url('https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap');
        .order-summary{
            font-family: "Chakra Petch", sans-serif;
  font-weight: 600;
  font-style: italic;
        }
        body{
            background-color: rgb(211,211,211);
        }
        .info{
            font-family: "Bebas Neue", sans-serif;
            opacity: 0.4;
  font-style: normal;
  text-align: center;
        }

    .form-section {
        width:40%;
        float: left;
        margin: 50px auto;
        font-family: "Play", sans-serif;
  font-weight: 400;
  font-style: normal;
        
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-section h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5H7z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    input[type="submit"] {
        background-color: #2ecc71;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    .img-book{
        text-align:center;
    }

    input[type="submit"]:hover {
        background-color: #27ae60;
    }
    @media screen and (max-width: 800px){

       .order-summary{
        display: none
       }
       .form-section{
        width: 80%;
       }

    }
</style>
</head>
<body>

<header style="text-align:center; background-color: white" class="image">
    <img width="100" src="images/riverside-logo.png">
</header>

<div style="display: flex; " class="grey-background">

        <div  class="form-section">
           <div class="img-book">
            <img width=300 src="images/BOOKING.png" alt="">
           </div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="fname">First Name</label>
                <input required type="text" id="fname" name="fname">

                <label for="lname">Last Name</label>
                <input  required type="text" id="lname" name="lname">

                <label for="phone">Phone Number</label>
                <input required type="number" id="phone" name="phone">

                <label for="gender">Gender</label>
                <select required id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <div style="text-align:center;" class="mpesa">
                    <img width="200" src="images/mpesa.png">
                </div>
                <label for="mpesanum">Mpesa Number</label>
                <input required type="number" id="mpesanum" name="mpesanum">

                <label for="amount">Amount</label>
                <input type="number" name="amount">

                <div class="info">
                    <p>If you have any problem with the Payment or Want more inquiries Contact <b>0743928989</b><br>
                    Thank You</p>
                </div>

                <input required type="submit" value="Submit">
            </form>
        </div>
        <div style="padding: 50px 90px; background-color: " class="order-summary">
            <h2>Room Order</h2>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Room Type</h5> </span>  <span style="padding-left: 20px"><h5>Single Room</h5> </span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Amount:</h5> </span>  <span style="padding-left: 20px"><h5>6,000</h5> </span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Payment Method:</h5> </span>  <span style="padding-left: 20px"><img width="90" src="images/mpesa.png" alt=""></span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Total</h5> </span>  <span style="padding-left: 20px"><h2>6,150</h2> </span>
                </div>
                <hr>
            </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>
</html>

<?php
// INCLUDE THE ACCESS TOKEN FILE
include 'accesstoken.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $mpesanum = $_POST["mpesanum"];
    $amount = $_POST["amount"];
    
    // Validation
    $errors = array();
    if (strlen($fname) < 5) {
        $errors[] = "First Name must be at least 5 characters long.";
    }
    if (preg_match('/\d/', $fname)) {
        $errors[] = "First Name must not contain numbers.";
    }
    if (strlen($lname) < 5) {
        $errors[] = "Last Name must be at least 5 characters long.";
    }
    if (preg_match('/\d/', $lname)) {
        $errors[] = "Last Name must not contain numbers.";
    }
    
    if (!is_numeric($amount) || $amount <= 0) {
        $errors[] = "Amount must be a positive number.";
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
        $callbackurl = 'https://7670-105-163-2-251.ngrok-free.app/Riverside-Hostel-Management-System/MPESA/callback.php';
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = '174379';
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
        $phone = '254743928989'; // Convert to international format
        $PartyA = $phone;
        $PartyB = $BusinessShortCode;
        $AccountReference = 'RIVERSIDE HOSTELS';
        $TransactionDesc = 'Room Booking';
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
        echo $curl_response;

        if ($curl_response === false) {
            echo '<script>Swal.fire("Error", "CURL Error: ' . curl_error($curl) . '", "error");</script>';
        } else {
            $data = json_decode($curl_response);
            if ($data->ResponseCode == "0") {
                include ("connection.php");
                $query = "INSERT INTO riversidebookings (`First Name`, `Last Name`, Gender, NumberPaid, AmountPaid) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
        
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $gender, $mpesanum, $amount);
                    if (mysqli_stmt_execute($stmt)) {
                        echo $TransactionDesc;
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_close($conn);
            } else {
                echo '<script>Swal.fire("Error", "STK Push Failed. Please try again.", "error");</script>';
            }
        }
        curl_close($curl);
    }
}
?>

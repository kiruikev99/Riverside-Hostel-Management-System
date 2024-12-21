<?php
    // INCLUDE THE ACCESS TOKEN FILE
    include 'accesstoken.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Dotenv\Dotenv;

    require 'vendor/autoload.php';

    $tenantid = isset($_GET['tenantid']) ? $_GET['tenantid'] : '';

    // If form is submitted, get tenantid from POST instead of GET
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tenantid = isset($_POST['tenantid']) ? $_POST['tenantid'] : $tenantid;
    }

    ?>
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

            body {
                background-color: #f4f4f4;
                font-family: "Play", sans-serif;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: #fff;
                padding: 20px;
                text-align: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 20px;
            }

            .form-section {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin: 20px;
                padding: 20px;
                width: 100%;
                max-width: 600px;
            }

            .form-section h2 {
                color: #333;
                margin-bottom: 20px;
                text-align: center;
            }

            .form-section label {
                color: #333;
                display: block;
                margin-bottom: 5px;
            }

            .form-section input[type="text"],
            .form-section input[type="number"],
            .form-section select {
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
                margin-bottom: 15px;
                padding: 10px;
                width: 100%;
            }

            .form-section select {
                appearance: none;
                background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5H7z"/></svg>');
                background-position: right 10px center;
                background-repeat: no-repeat;
                background-size: 20px;
                -moz-appearance: none;
                -webkit-appearance: none;
            }

            .form-section input[type="submit"] {
                background-color: #2ecc71;
                border: none;
                border-radius: 5px;
                color: #fff;
                cursor: pointer;
                font-size: 16px;
                padding: 12px 20px;
                transition: background-color 0.3s ease;
                width: 100%;
            }

            .form-section input[type="submit"]:hover {
                background-color: #27ae60;
            }

            .form-section .info {
                font-family: "Bebas Neue", sans-serif;
                font-style: normal;
                opacity: 0.4;
                text-align: center;
            }

            .form-section .img-book {
                text-align: center;
            }

            .order-summary {
                display: none;
                font-family: "Chakra Petch", sans-serif;
                font-weight: 600;
                font-style: italic;
                margin: 20px;
                padding: 20px;
            }

            @media screen and (min-width: 800px) {
                .order-summary {
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    display: block;
                    max-width: 400px;
                }
            }

            .order-summary h2 {
                color: #333;
                text-align: center;
            }

            .order-summary .sections {
                margin-bottom: 20px;
            }

            .order-summary .sections h5 {
                margin: 0;
            }

            .order-summary hr {
                border: 0;
                border-top: 1px solid #eee;
                margin: 10px 0;
            }
        </style>
    </head>

    <body>
        <header>
            <img width="100" src="images/riverside-logo.png" alt="Riverside Logo">
        </header>

        <div class="container">
            <div class="form-section">
                <div class="img-book">
                    <img width="300" src="images/BOOKING.png" alt="Booking Image">
                </div>
                <form action="paymentblockd.php?tenantid=<?php echo htmlspecialchars($tenantid); ?>" method="post">
                <input type="hidden" name="tenantid" value="<?php echo htmlspecialchars($tenantid); ?>">
                    <label for="fname">Student's First Name</label>
                    <input required type="text" id="fname" name="fname">

                    <label for="lname">Student's Last Name</label>
                    <input required type="text" id="lname" name="lname">

                    <label for="phone">Student's Phone Number </label>
                    <input required type="number" id="phone" name="phone">

                    <label for="gender">Gender</label>
                    <select required id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <label for="university">University</label>
                    <select required id="university" name="university">
                        <option value="Kabianga University">Kabianga University</option>
                        <option value="Kapkatet University">Kapkatet University</option>
                    </select>

                    <div style="text-align:center;" class="mpesa">
                        <img width="200" src="images/mpesa.png" alt="Mpesa Logo">
                    </div>
                    <label for="mpesanum">Mpesa Number</label>
                    <input required placeholder="Enter Phone Number Paying" type="number" id="mpesanum" name="mpesanum">

                    <div class="info">
                        <p>If you have any problem with the Payment or want more inquiries, contact <b>0743928989</b><br>
                            Thank You</p>
                    </div>

                    <input required type="submit" value="Submit">
                </form>
            </div>

            <div class="order-summary">
                <h2>Room Details</h2>
                <div class="sections">
                    <div style="display:flex">
                        <span>
                            <h5>Room: </h5>
                        </span>
                        <span style="padding-left: 20px">
                        <?php echo ($tenantid); ?>
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="sections">
                    <div style="display:flex">
                        <span>
                            <h5>Amount:</h5>
                        </span>
                        <span style="padding-left: 20px">
                            <h5>3,500</h5>
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="sections">
                    <div style="display:flex">
                        <span>
                            <h5>Payment Method:</h5>
                        </span>
                        <span style="padding-left: 20px">
                            <img width="90" src="images/mpesa.png" alt="Mpesa Logo">
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="sections">
                    <div style="display:flex">
                        <span>
                            <h5>Total:</h5>
                        </span>
                        <span style="padding-left: 20px">
                            <h2>3,500</h2>
                        </span>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    </body>

    </html>

    <?php
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
            $callbackurl = 'https://2327-105-163-0-210.ngrok-free.app/Riverside-Hostel-Management-System/MPESA/callback.php';
            $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
            $BusinessShortCode = '174379';
            $Timestamp = date('YmdHis');
            $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
            $PartyA = $phone;
            $PartyB = $BusinessShortCode;
            $AccountReference = 'RIVERSIDE HOSTELS';
            $TransactionDesc = 'Room Booking';
            $Amount = '1';
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
                $stats = "booked";
                $data = json_decode($curl_response);
                if ($data->ResponseCode == "0") {
                    include("connection.php");
                    $query = "UPDATE blockdbooking 
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
            }
        }
    }
            ?>
            </body>
            </html>
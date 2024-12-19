    <?php
    // INCLUDE THE ACCESS TOKEN FILE
   
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
                <form action="stkpush.php?tenantid=<?php echo htmlspecialchars($tenantid); ?>" method="post">
              
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


    
            </body>
            </html>
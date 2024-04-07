<?php

include("connection.php");
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
    $roomNo = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $balance = $row['MonthBalance'];



    $university = $row['University'];

    $checkin = $row['Checkin'];



    $date = date("Y-m-d");

    $formattedDate = date("M", strtotime($date));


    $_SESSION["wame"] = $row['FirstName'];
    ;



    // Add other fields as needed
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap');

        .head{
            font-family: "Alegreya", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            color: white;
        }
        h2{
            font-family: "Alegreya", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;

        }

        label{
            font-family: "Rajdhani", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
       
       .main{
        background-image: url("images/bg3.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

        table {
            padding-left: 100px;
            font-size: x-large;
        }

        .box {
            
            text-align: center;
        }
        .mm{
            text-align: center;
        }
        .topbox {
            padding-left: 20%;
        }
    </style>


</head>

<body>
    <div class="main">
        <?php include('base.php'); ?>
        <!-- <div style="text-align: center" class="dd">
            <h1> <span id='Date'><?php echo date("H:i:s Y--d "); ?></span></h1>
            <script>
            function updateDateTime() {
                var datetimeElement = document.getElementById('Date');
                var currentTime = new Date();
                var formattedDateTime =  
                    ' ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds() + '<br> ' + ' ' + ' ' +  currentTime.getFullYear() + '-' + (currentTime.getMonth() + 1) + '-' + currentTime.getDate();

                datetimeElement.innerHTML = formattedDateTime;
            }

            // Update every second (1000 milliseconds)
            setInterval(updateDateTime, 1000);

            // Initial update
            updateDateTime();
            </script>
        </div> -->

        <div style="padding-top: 30px" v class="mm">
            <div class="head">
                <h1>
                    <?php echo $name; ?>, Finacial Record
                </h1>
            </div>
            <div class="topbox">
                <div style="background-color: aliceblue;padding-top: 10px" class="box">
                    <h2>
                        <?php echo $formattedDate ?> Balance:
                        <?php echo $balance ?>
                    </h2>
                    <hr>

                    <div style="text-align: center; padding-bottom: 100px;" class="lipa">
                        <h3 style="text-align: center">
                        <span class="mpesa-img"><img style="" width="200"
                                src="images/mpesa.png" alt=""></span></h3>


                        <!-- start of the Form  -->
                        <form action="/Admin-RIVERSIDE/PROJECT%20WORK/MPESA/Tenant-payment/stkpush.php" method="post"
                            style="text-align: center">
                            <label for="phone">Phone Number </label><br><br><input style="padding: 3px; border-radius: 5px; border: 3px solid white" type="number" name="phone"
                                id="phone" placeholder="Enter your phone number" required><br><br>
                            <label for="phone">Amount </label><br><br><input style="padding: 3px;  border-radius: 5px; border: 3px solid white;" type="number" name="amount"
                                id="phone" placeholder="Amount" required><br><br>
                            <button style="padding: 10px; width: 100px;  border-radius: 5px; background-color: green; color: white" type="submit">Pay</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    
        </div>
   </div>
</body
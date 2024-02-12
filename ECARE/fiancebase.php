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


    $_SESSION["wame"] = $row['FirstName'];;



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
        .main {
            display: grid;
            grid-template-columns: 25% 1fr 1fr;

        }
       
        ul{
            list-style-type: none;
            
            
        }
        li{
            padding-top: 30px;
            font-size: x-large;
            
            
        }
        .sidebar{
            background-image: linear-gradient(green, blue);
            width: 300px;
            height: 100%;
            
        }
        a{
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: black;
        }
        .current{
            border-bottom: 2px solid blue;
        }
        table{
            padding-left: 100px;
            font-size: x-large;
        }
        
        
        </style>


</head>
<body>
<div class="main">
    <div class="sidebar">
        <img width="210" src="images/ecare-logo.png" alt="">
        <ul>
            <li><a href="tenantbase.php">Home</a></li>
            <li><a class="current" href="fiancebase.php">Finance</a></li>
            <li><a href="transactionpdf.php">Transaction PDF</a></li>
            <li><a href="maintainance.php">Maintainance</a></li>
            <li><a href="tenantbase.php">Notices</a></li>

        </ul>
    </div>

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
    
    <div style="padding-top: 30px"v class="mm">
    <div class="head">
        <h1><?php echo $name; ?>,  Finacial Record</h1>
    </div>
        <div style="background-color: aliceblue;padding-top: 10px" class="box">
            <h2><?php echo $formattedDate ?> Balance: <?php echo $balance ?> </h2>
            <hr>
          
            <div style="text-align: center; padding-bottom: 100px;" class="lipa">
                <h3 style="text-align: center" ><span >Make <?php echo $formattedDate ?> </span> Payment With <span>MPESA</span><img style="padding-left: 50px" width="200" src="images/mpesa.png" alt=""></h3>



                <form action="/Admin-RIVERSIDE/PROJECT%20WORK/MPESA/Tenant-payment/stkpush.php" method="post" style="text-align: center">
                    <label for="phone">Phone Number  </label><input style="padding: 3px;" type="number" name="phone" id="phone" placeholder="Enter your phone number" required><br><br>
                    <label for="phone">Amount </label><input style="padding: 3px;" type="number" name="amount" id="phone" placeholder="Amount" required><br><br>
                    <button type="submit">Pay</button>

                </form>
            </div>
            
        </div>
    </div>
    <div style="padding-top: 70px" class="transaction-record">
        <h2 style="text-align: center">Last Transaction Record</h2>
        <table>
            <tr>
                <th>Name</th>
                <th   style="padding-left: 60px ">Amount</th>
                <th style="padding-left: 60px ">Date</th>
            </tr>
            <tr style="padding-left: 10px ">
                <td ><?php echo $name; ?></td>
                <td style="padding-left: 60px "></td>
                <td style="padding-left: 60px ">2024-01-05</td>
            </tr>

        </table>
        <div style="text-align: center; padding-top: 20px" class="button">
            <button>View All Transation</button>
        </div>

    </div>
</div>
</body
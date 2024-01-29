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
    $balance = $row['Balance'];
    $totalAmount = $row['AmountPaid'];
    $university = $row['University'];

    $checkin = $row['Checkin'];


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
            grid-template-columns: 1fr 70%;

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
            width: 420px;
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
        .name, .roomno{
            font-size: x-large;
            padding-left: 30px;;
        }
        .date-booking, .balance, .credentials{
            background-image: url("images/bg.jpg");
            color: white;
            width: 170px;
            border-radius: 10px;
            padding: 10px;
        }
        .notices-border{
            background-image: url("images/ll.jpg");
            border-radius: 10px;
            
            padding: 70px;
            width: 60%;

        }
        .boxes{
            padding-top: 50px;
            display: flex;
            gap: 70px;
            
        }
        </style>
</head>
<body style=" margin-left: 10px">

<div class="main">
    <div class="sidebar">
        <img width="210" src="images/ecare-logo.png" alt="">
        <ul>
            <li><a class="current" href="tenantbase.php">Home</a></li>
            <li><a href="fiancebase.php">Finance</a></li>
            <li><a href="tenantbase.php">Transaction PDF</a></li>
            <li><a href="tenantbase.php">Maintainance</a></li>
            <li><a href="tenantbase.php">Notices</a></li>

        </ul>
    </div>

    <div class="content-section">
        <div class="header">
            <h1>Welcome</h1>
            <span class="name"><?php echo $name; ?> <?php echo $lastName; ?></span><span class="roomno">Room No: <?php echo $roomNo; ?></span>
        </div>
        <div class="boxes">
            <div class="date-booking">
                <h2>Checkin-Date</h2>
                <p><?php echo $checkin; ?></p>
            </div>

            <div class="balance">
                <h2>Amount-due</h2>
                <p><?php echo $balance; ?></p>
            </div>

            <div class="credentials">
                <h2>Login Credentials</h2>
                <p>Username: <?php echo $Username; ?></p>
                <p>Password: <?php echo $Password; ?></p>
            </div>
        </div>
        <div class="notices">
            <h2>Notices</h2>
                <div class="notices-border">
                     <p>Notices will be displayed here</p>
                </div>
            
        </div>
    </div>
</div>
    


</body>
</html>
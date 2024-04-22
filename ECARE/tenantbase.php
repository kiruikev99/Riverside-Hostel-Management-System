<?php

include("connection.php");
session_start();

include('set.php');


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
    $_SESSION['RoomNo'] = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $balance = $row['MonthBalance'];
    $university = $row['University'];
    $dateofbirth = $row['D-O-B'];
    $checkin = $row['Checkin'];
    $_SESSION['Num'] = $row["PhoneNumber"];





    session_abort();

    $date = date("Y-m-d");

    $formattedDate = date("M", strtotime($date));


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
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        
    .main{
        background-image: url("images/bg3.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
        .name,
        .roomno {
            font-size: x-large;
            padding-left: 5px;
            ;
        }
        .header{
            font-size: x-large;
            text-align: center;
            color: white;
            font-family: "Cormorant Garamond", serif;
            font-weight: 700;
            font-style: italic;
        }
        .date-booking,
        .balance,
        .credentials {
            background-image: url("images/bg.jpg");
            color: white;
            width: 170px;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }
        .notices-border {
            background-image: url("images/ll.jpg");
            border-radius: 10px;

            padding: 70px;
            width: 60%;

        }
        .notices{
            padding-bottom: 50px;
        }


    </style>

</head>

<body>

<marquee scrollamount="15" style="color:white; background-color: green; padding: 10px;"  direction="left" > If you have an issue with your portal, please contact  0743928989! </marquee>

       

    <div class="main">
    <?php include("base.php"); ?>


        <div class="content-section">
            <div class="header">
                <h1>Welcome,
                    <?php echo $name; ?>
                </h1>
                <span class="name"> </span><span class="roomno">Room No:
                    <?php echo $_SESSION['RoomNo']; ?>
                </span>
            </div>
            <div class="boxes">
                <div class="date-booking">
                    <h2>Checkin-Date</h2>
                    <p>
                        <?php echo $checkin; ?>
                    </p>
                </div>

                <div class="balance">
                    <h2>
                        <?php echo $formattedDate ?> Balance
                    </h2>
                    <p>
                        <?php echo $balance; ?>
                    </p>
                </div>

                <div class="credentials">
                    <h2>Tenant Details</h2>
                    <p>First Name:
                        <?php echo $name; ?>
                    </p>
                    <p>Last Name:
                        <?php echo $lastName; ?>
                    </p>
                    <p>D-O-B:
                        <?php echo $dateofbirth; ?>
                    </p>
                    <p>University:
                        <?php echo $university; ?>
                    </p>
                    <p>Phone Number:
                        <?php echo $_SESSION['Num']; ?>
                    </p>



                </div>
            </div>
            <div class="notices">
                <h2>Notices</h2>
                <div class="noto">
                    <div class="notices-border">
                        <p>Notices will be displayed here</p>
                    </div>
                </div>

            </div>
        </div>
    </div>



</body>

</html>
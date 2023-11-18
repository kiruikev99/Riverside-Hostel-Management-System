<?php

include("connection.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}


$user = $_SESSION['username'];

$query = "SELECT * FROM tenantregister WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $name = $row['Name'];
    $roomNo = $row['RoomNo'];
    $amountPaid = $row['AmountPaid'];
    $totalAmount = $row['TotalAmount'];
    $university = $row['University'];
    $course = $row['Course'];
    $checkin = $row['CheckIn'];


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
    <title>Document</title>
</head>
<Style>
    header{
        padding-left: 30px;
    }
    .head-content{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .head-content h2, p{
        padding-top: 40px;
    }
    .intro{
        background-color: lightblue;
        padding: 10px;
        border-radius: 30px;
    }
    .grid{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .sec-2{
        padding-left: 400px;
    }
   .button-flex{
    text-align: center;
    border-left: 2px solid black;
   }
   .button-flex,button{
    padding: 10px;
   }
   
</Style>
<body>
    <header>
        <div class="head-content">
        <img src="ecare-logo.png" width="200" alt="Logo">

        <h2> Dashbord </h2>

        <div class="user">
            <p><?php echo $name; ?></p>
        </div>

        </div>

    </header>

    <section class="intro">
       <div class="grid">
        <div class="sec-1">
            <h3>Hi, <?php echo $name; ?></h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, odio. Dicta, dolor! Eum earum quisquam fuga, 
        </div>
        <div class="sec-2">
            <img width="300" src="student.png" alt="">
        </div>
       </div>


        </div>
        </div>
    </section>

    <section>
        <div class="overview">
            <h1>Overview</h1>
        </div>
        <div class="tenant-info">
            <div class="button-flex">
                <span class="room"><button>RoomNo<br><?PHP echo $roomNo; ?></button></span>
                <span class="room2"><button class="room">Balance<br><?PHP echo $amountPaid; ?></button></span>
                <button class="room3">Total<br><?PHP echo $totalAmount; ?></button></span>
            </div>
            <h4>Name: <?php echo $name; ?></h4> 
            <h4>RoomNo: <?php echo $roomNo; ?></h4>
            <h4>University: <?php echo $university; ?></h4>
            <h4>Course: <?php echo $course; ?></h4>
            

        </div>
    </section>
    
</body>
</html>

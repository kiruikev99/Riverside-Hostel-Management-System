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
    <link rel="stylesheet" href="styles.css">
    <title>Tenant UI</title>
</head>
<style>
    .room, .university, .course, .check, .amount, .amount-paid{
        display: flex;
        border-top: 1px solid black;
        font-size: larger;
        
    }
    .amounts h5{
        padding-left: 20px;
    }
    .amounts{
        background-color: beige;
       
        box-shadow: 10px 10px;
    }
    .amounts button{
        padding: 5px;
        background-color: paleturquoise;
        border-radius: 10px;
    }
    </style>

<body>
    <div class="dashboard">
        <h1>Welcome, <?php echo $name   ?>  </h1>

        <div class="credentials">
            <h5>Here are your credentials</h5>

            <div class="amounts">
                <div class="room">
               <h5> Room NO: <h5> <button> <?php echo $roomNo ?> </button>
               </div>
               <div class="university">
               <h5>Univerity: <h5> <button> <?php echo $university ?> </button>
               </div>
               <div class="course">
                <h5>Course:</h5> <h5> <button> <?php echo $course ?> </button>
               </div>
               <div class="check">
                <h5> Check In:</h5> <h5> <button> <?php echo $checkin ?> </button>
               </div>
            <div class="amount">
                <h5>Room Amount</h5> <h5> <button> <?php echo $totalAmount ?> </button>
               </div>
               <div class="amount-paid">
                <h5>Amount Paid</h5> <h5> <button> <?php echo $totalAmount ?> </button>
               </div>
            </div>
            </div>
           
        </div>
    </div>

</body>
</html>

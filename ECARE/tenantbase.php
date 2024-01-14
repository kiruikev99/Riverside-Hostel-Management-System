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
    <title>Student Page</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .student-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .student-details {
            margin-top: 20px;
            text-align: left;
        }

        .detail-label {
            color: #555;
            font-weight: bold;
        }

        .detail-value {
            color: #333;
        }

        .balance {
            font-size: 20px;
            color: #4caf50;
        }
    </style>
</head>
<body>

<div class="student-container">
    <h2>Welcome, John Doe!</h2>
    <div class="student-details">
        <p class="detail-label">University:</p>
        <p class="detail-value">University of Example</p>

        <p class="detail-label">First Name:</p>
        <p class="detail-value">John</p>

        <p class="detail-label">Last Name:</p>
        <p class="detail-value">Doe</p>

        <p class="detail-label">Balance:</p>
        <p class="balance">$500.00</p>
    </div>
</div>

</body>
</html>

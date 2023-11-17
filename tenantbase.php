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
 Hey <?php echo $name; ?>  <br> Room No: <?php echo $roomNo; ?> <br> University:  <?php echo $university; ?> 
 <br> Course:  <?php echo  $course; ?> <br> Amount Paid:  <?php echo $amountPaid; ?> <br> Total Amount:  <?php echo $totalAmount; ?> <br> Checkin:  <?php echo $checkin; ?>
</head>
<body>
    
</body>
</html>

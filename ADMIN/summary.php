<?php
include ('connection.php');


$male_count = 0; // Initialize male_count variable

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS male_count FROM tenantaccount WHERE Gender = 'Male'";

// Execute query
$result = $conn->query($sql);

if ($result> 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $male_count = $row["male_count"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riverside Summary</title>

    <style>
        .container{
        }
        .middle-part{
            text-align: center;
        }
        .card-section{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include ('base.php'); ?>

    <div class="container">
       <div class="middle-part">
        <img width="200" src="images/riverside-logo.png" alt="">
        <h4>RIVERSIDE TENANTS SUMMARY</h4>
       </div>

       <div class="card-section">
        <h3>Total Tenants: </h3>
        <h3>Total Avialable Rooms: </h3>
        <h3>Total Admins: </h3>
        <h3>Total Male: <?php echo $male_count; ?> </h3>
        <h3>Total Female: </h3>
       </div>
    </div>
</body>
</html>

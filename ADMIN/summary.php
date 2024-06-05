<?php
include ('connection.php');


$male_count = 0; // Initialize male_count variable

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS male_count FROM tenantaccount WHERE Gender = 'Male'";

// Execute query
$result = $conn->query($sql);


        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $male_count = $row["male_count"];
        }

//FEMALE 

$female_count = 0; // Initialize male_count variable

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS female_count FROM tenantaccount WHERE Gender = 'Female'";

// Execute query
$result = $conn->query($sql);


        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $female_count = $row["female_count"];
        }

//ADMINS
        $sql = "SELECT COUNT(*) AS NO FROM loginform";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $admin = $row["NO"] ;
            }
        } else {
            echo "0 results";
        }     

//ROOMS

$sql = "SELECT COUNT(*) AS RoomNo FROM tenantaccount";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $roomNo = $row["RoomNo"] ;

        //AVAILABLE ROOM
        $availableRoom = (18 - $roomNo);
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
        <h3>Total Tenants:<?php echo $roomNo ?> </h3>
        <h3>Total Avialable Rooms: <?php echo  $availableRoom ?> </h3>
        <h3>Total Admins:<?php echo $admin; ?> </h3>
        <h3>Total Male: <?php echo $male_count; ?> </h3>
        <h3>Total Female:<?php echo  $female_count; ?> </h3>
       </div>
    </div>
</body>
</html>

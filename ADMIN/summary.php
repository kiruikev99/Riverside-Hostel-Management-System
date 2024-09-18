c<?php
include ('connection.php');

// Fetching data for male tenants
$sql = "SELECT COUNT(*) AS male_count FROM tenantaccount WHERE Gender = 'Male'";
$result = $conn->query($sql);
$male_count = $result->fetch_assoc()['male_count'];

// Fetching data for female tenants
$sql = "SELECT COUNT(*) AS female_count FROM tenantaccount WHERE Gender = 'Female'";
$result = $conn->query($sql);
$female_count = $result->fetch_assoc()['female_count'];

// Fetching data for admins
$sql = "SELECT COUNT(*) AS NO FROM loginform";
$result = $conn->query($sql);
$admin = $result->fetch_assoc()['NO'];

// Fetching data for rooms and calculating available rooms
$sql = "SELECT COUNT(*) AS RoomNo FROM tenantaccount";
$result = $conn->query($sql);
$roomNo = $result->fetch_assoc()['RoomNo'];
$availableRoom = 30 - $roomNo;

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .middle-part {
            text-align: center;
            margin-bottom: 20px;
        }

        .middle-part img {
            margin-bottom: 15px;
        }

        .middle-part h4 {
            color: #3498db;
            font-size: 24px;
            margin: 0;
            font-weight: bold;
        }

        .card-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 15px;
        }

        .card {
            background-color:green;
            color: white;
            border-radius: 10px;
            padding: 20px;
            width: calc(50% - 15px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            font-size: 22px;
            margin: 0 0 10px;
        }

        .card p {
            font-size: 18px;
            margin: 0;
        }

        @media (max-width: 600px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include('base.php'); ?>

    <div class="container">
        <div class="middle-part">
            <img width="150" src="images/riverside-logo.png" alt="Riverside Logo">
            <h4>RIVERSIDE TENANTS SUMMARY</h4>
        </div>

        <div class="card-section">
            <div class="card">
                <h3>Total Tenants</h3>
                <p><?php echo $roomNo; ?></p>
            </div>
            <div class="card">
                <h3>Available Rooms</h3>
                <p><?php echo $availableRoom; ?></p>
            </div>
            <div class="card">
                <h3>Total Admins</h3>
                <p><?php echo $admin; ?></p>
            </div>
            <div class="card">
                <h3>Total Male Tenants</h3>
                <p><?php echo $male_count; ?></p>
            </div>
            <div class="card">
                <h3>Total Female Tenants</h3>
                <p><?php echo $female_count; ?></p>
            </div>
        </div>
    </div>
</body>
</html>

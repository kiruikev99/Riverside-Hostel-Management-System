<?php
include 'connection.php';
session_start();

$firstName = "";
$lastName = "";
$roomNo = "";
$username = "";
$password = "";

if (isset($_GET['roomno'])) {
    $roomno = $_GET['roomno'];

    $sql = "SELECT * FROM tenantaccountblocka WHERE RoomNo = '$roomno'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $roomNo = $row['RoomNo'];
        $username = $row['Username'];
        $password = $row['Password'];
        $phonenumber = $row['PhoneNumber'];
        $university = $row['University'];
        $checkin = $row['Checkin'];
        $birth = $row['D-O-B'];
        $gender = $row['Gender'];
        $FatherName = $row['FatherName'];
        $Fathernumber = $row['FatherNumber'];
        $Disease = $row['Disease'];
        $Doctor = $row['Doctor'];
        $Blood = $row['BloodGroup'];
        $Email = $row['Email'];
        $amountPaid = $row['MonthBalance'];

        $checkin_date = DateTime::createFromFormat('Y-d-m', $checkin);

        if ($checkin_date === false) {
            echo "Invalid date format for check-in.";
        } else {
            $current_date = new DateTime();
            $interval = $current_date->diff($checkin_date);
            $currentday = $interval->format('%a');
        }
    } else {
        echo "No tenant found for Room No: $roomno";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: orange;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            height: 50px;
        }

        .container {
            display: flex;
            margin: 20px auto;
            max-width: 1200px;
            gap: 20px;
        }

        .front-image {
            background-color: orange;
            width: 30%;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
        }

        .front-image img {
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .details {
            background-color: white;
            width: 70%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-top: 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .section p {
            margin: 5px 0;
        }

        .section h3 {
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>

<body>
    <header>
        <a href="http://localhost/Admin-RIVERSIDE/PROJECT%20WORK/ADMIN/addtenant.php"><img src="images/previous.png" alt="Back"></a>
        <img src="images/riverside-logo.png" alt="Logo">
    </header>

    <div class="container">
        <div class="front-image">
            <img src="images/user (1).png" alt="Tenant Image" width="100">
            <h1>Tenant Details</h1>
        </div>

        <div class="details">
            <div class="section">
                <h3>Tenant Personal Info</h3>
                <p><strong>First Name:</strong> <?php echo $firstName ?></p>
                <p><strong>Last Name:</strong> <?php echo $lastName ?></p>
                <p><strong>Gender:</strong> <?php echo $gender ?></p>
                <p><strong>Birthday:</strong> <?php echo $birth ?></p>
                <p><strong>Phone Number:</strong> <?php echo $phonenumber ?></p>
                <p><strong>University:</strong> <?php echo $university ?></p>
                <p><strong>Days Stayed:</strong> <?php echo $currentday ?></p>
                <p><strong>Email:</strong> <?php echo $Email ?></p>
            </div>

            <div class="section">
                <h3>Tenant Guardian Info</h3>
                <p><strong>Father Name:</strong> <?php echo $FatherName ?></p>
                <p><strong>Father Number:</strong> <?php echo $Fathernumber ?></p>
            </div>

            <div class="section">
                <h3>Medical Record</h3>
                <p><strong>Disease:</strong> <?php echo $Disease ?></p>
                <p><strong>Doctor:</strong> <?php echo $Doctor ?: 'Not Available' ?></p>
                <p><strong>Blood Group:</strong> <?php echo $Blood ?></p>
            </div>

            <div class="section">
                <h3>Login Details</h3>
                <p><strong>Username:</strong> <?php echo $username ?></p>
                <!-- <p><strong>Password:</strong> <?php echo $password ?></p> -->
            </div>

            <div class="section">
                <h3>Payment Details</h3>
                <p><strong>Amount Paid:</strong> <?php echo $amountPaid ?></p>
            </div>

            <div class="section">
                <h3>Transaction PDF</h3>
                
    <a style="font-size: 20px; " href="pdftransaction.php?roomno=<?php echo urlencode($row['RoomNo']); ?>"> PDF </a>

                </div>
        </div>
    </div>
</body>

</html>

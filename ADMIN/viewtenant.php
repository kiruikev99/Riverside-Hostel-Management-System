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

    $sql = "SELECT * FROM tenantaccount WHERE RoomNo = '$roomno'";
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

        $checkin_date = DateTime::createFromFormat('Y-m-d', $checkin);

        // Check if conversion was successful
        if ($checkin_date === false) {
            // Handle error if conversion fails
            echo "Invalid date format for check-in.";
        } else {
            // Get the current date
            $current_date = new DateTime();
        
            // Calculate the difference
            $interval = $current_date->diff($checkin_date);
        
            // Get the difference in days
            $currentday = $interval->format('%a');
        }
}else {
        // Handle case where no tenant is found for the given room number
        echo "No tenant found for Room No: $roomno";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .front-image {
            background-color: orange;
            height: 70vh;
            padding: 100px;
        }

        .ttext-1 {
            padding-top: 80%;
        }

        .credentials {
            border: 2px solid black;
            padding: 80px;
            border-radius: 20px;
        }

        h3 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        p {
            font-family: Verdana, sans-serif;
            font-size: 13px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Details</title>
</head>

<body>
    <header style="display: flex; gap: 580px;" class="header">
        <div style="float: left" class="back">
            <a href="http://localhost/Admin-RIVERSIDE/PROJECT%20WORK/ADMIN/addtenant.php"><img src="images/previous.png"
                    width="70" alt="Logo"></a>
        </div>
        <div style="float: right" class="logo">
            <img src="images/riverside-logo.png" width="200" alt="Logo">
        </div>
        </div>
    </header>

    <div style="display: flex; gap: 100px;" class="flex-display">
        <div class="front-image">

            <img src="images/user (1).png" width="200" alt="Logo">
            <div class="ttext-1">
                <h1>Tenant Details</h1>
            </div>

        </div>
        <div style="display: flex; gap: 200px" class="credentials">
            <div class="personal-info">
                <span class="info">
                    <h3>Tenant Personal Info</h3>
                    <p>First Name:
                        <?php echo $firstName ?>
                    </p>
                    <p>Last Name:
                        <?php echo $lastName ?>
                    </p>
                    <p>Gender:
                        <?php echo $gender ?>
                    </p>
                    <p>Birthday:
                        <?php echo $birth ?>
                    </p>
                    <p>Phone Number:
                        <?php echo $phonenumber ?>
                    </p>
                    <p>University:
                        <?php echo $university ?>
                    </p>
                    <p>Days Stayed:
                        <?php echo $currentday ?>
                    </p>
                    <p>Email:
                        <?php echo $Email ?>
                    </p>
                </span>
                <br><br><br><br><br>

                <div class="GurdianInfo">
                    <h3>Tenant Gurdian Info</h3>
                    <p>Father Name:
                        <?php echo $FatherName ?>
                    </p>
                    <p>Father Number:
                        <?php echo $Fathernumber ?>
                    </p>
                </div>
            </div>

            <div class="mediacal-record">
                <h3>Medical Record</h3>
                <p>Disease:
                    <?php echo $Disease ?>
                </p>
                <p>Doctor:
                    <?php if ($Doctor == "") {
                        echo "Not Available";
                    } ?>
                </p>
                <p>Blood Group:
                    <?php echo $Blood ?>
                </p>

                <br><br><br><br><br>

                <div class="login-detail">
                    <h3>Login Details</h3>
                    <p>Username:
                        <?php echo $username ?>
                    </p>
                    <p>Password:
                        <?php echo $password ?>
                    </p>
                </div>

                <br><br><br><br><br>

                <div class="payment">
                    <h3>Payment Details</h3>
                    <p>Amount Paid:
                        <?php echo $amountPaid ?>
                    </p>

                </div>
            </div>
            .
        </div>
    </div>
</body>

</html>
`
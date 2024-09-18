<?php

include("connection.php");
session_start();

if (!isset($_SESSION['username'])) {
    header('location: ecare.php');
}

$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row['FirstName'];
    $lastName = $row['LastName'];
    $room = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $balance = $row['MonthBalance'];
    $university = $row['University'];
    $dateofbirth = $row['D-O-B'];
    $checkin = $row['Checkin'];
    $gender = $row['Gender'];
    $FatherName = $row['FatherName'];
    $Fathernumber = $row['FatherNumber'];
    $Disease = $row['Disease'];
    $PhoneNumber = $row['PhoneNumber'];
    $Email = $row['Email'];
    $Doctor = $row['Doctor'];
    $Blood = $row['BloodGroup'];
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);

// Fetch the current notice from the database
$noticeQuery = "SELECT Detail FROM record LIMIT 1";
$noticeResult = mysqli_query($conn, $noticeQuery);
$currentNotice = "No current notices.";

if ($noticeResult && mysqli_num_rows($noticeResult) > 0) {
    $noticeRow = mysqli_fetch_assoc($noticeResult);
    $currentNotice = $noticeRow['Detail'];
}

mysqli_close($conn);

$date = date("Y-m-d");
$formattedDate = date("M", strtotime($date));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        body {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            background: #f0f4f8;
            color: #333;
        }

        .main {
            background: #e0f7fa;
            padding: 20px;
            min-height: 100vh;
        }

        .header {
            text-align: left;
            color: #00796b;
            font-weight: 700;
            font-style: bold;
            padding-top: 40px;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 3.5rem;
        }

        .header span {
            display: block;
            font-size: 3.5rem;
            margin-top: 10px;
        }

        .boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-bottom: 20px;
        }

        .box {
            background-color: #4db6ac;
            color: white;
            width: 250px;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: black;
        }

        .box p {
            margin: 5px 0;
            font-family: Arial, Helvetica, sans-serif;
            color: aliceblue;
        }

        .notices {
            text-align: center;
            margin-top: 20px;
        }

        .notices h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #00796b;
        }

        .notices-border {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 60%;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notices-border p {
            margin: 0;
            color: green;
            font-family: Arial;
        }

        marquee {
            color: white;
            background-color: #00796b;
            padding: 10px;
            font-size: 1rem;
        }
        .BTN{
            padding: 20px 100px;; background: greenyellow; color: grey; border: none

        }
         .BTN:hover{
            background-color: green;
            color: white;
            transition: color 0.3s, background-color 0.3s;
            cursor: pointer;
        }
    </style>
     <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <marquee scrollamount="15" direction="left">If you have an issue with your portal, please contact 0743928989!</marquee>

    <div class="main">
        <?php include("base.php"); ?>

        <div class="header">
            <h1>Welcome, <?php echo $name; ?></h1>
        </div>
        <div class="notices">
            <h2>Notice</h2>
            <div class="notices-border">
                <p><?php echo htmlspecialchars($currentNotice); ?></p>
            </div>
        </div>
        <br><br>
        <div class="boxes">
            <div class="box">
                <img width="80" src="images/key.png">
                <h2>Room No</h2>
                <p><b><?php echo $room; ?></b></p>
            </div>
           
            <div class="box">
            <img width="80" src="images/dex.png">
                <h2>Tenant Details</h2>
                <p>First Name: <?php echo $name; ?></p>
                <p>Last Name: <?php echo $lastName; ?></p>
                <p>D-O-B: <?php echo $dateofbirth; ?></p> 
                <p>Gender: <?php echo $gender; ?></p>
            </div>
            <div class="box">
                <img width="80" src="images/user1.png">
                <h2>Contact Information</h2>
                <p>Phone Number: <?php echo $PhoneNumber; ?></p>
                <p>Email: <?php echo $Email; ?></p>
            </div>
            <div class="box">
            <img width="80" src="images/user.png">
                <h2>Guardian Information</h2>
                <p>Father's Name: <?php echo $FatherName; ?></p>
                <p>Father's Number: <?php echo $Fathernumber; ?></p>
            </div>
            <div class="box">
            <img width="80" src="images/doctor.png">
                <h2>Health Information</h2>
                <p>Disease: <?php echo $Disease; ?></p>
                <p>Doctor: <?php echo $Doctor; ?></p>
                <p>Blood Group: <?php echo $Blood; ?></p>
          r/div>
        </div>
        <div style="text-align: center; " class="BUTTON">
        <button id="myBtn" class="BTN" style="">View More</button>
        </div>
        <script>
        document.getElementById("myBtn").addEventListener("click", function () {
            Swal.fire({
                title: 'Additional Information',
                html: `
                    <div style="text-align: left; list-style-type: disc; padding-left: 20px;">
                        <ul>
                            <li><strong>University:</strong> <?php echo $university; ?></li>
                            <li><strong>Username:</strong> <?php echo $Username; ?></li>
                            <li><strong>Password:</strong> <?php echo $Password; ?></li>
                            <li><strong>Check-in Date:</strong> <?php echo $checkin; ?></li>
                            <li><strong>Month Balance:</strong> <?php echo $balance; ?></li>
                        </ul>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });
        </script>
       
    </div>
</body>

</html>

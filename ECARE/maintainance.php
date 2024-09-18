<?php

include("connection.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row['FirstName'];
    $lastName = $row['LastName'];
    $roomNo = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $university = $row['University'];
    $checkin = $row['Checkin'];

    $_SESSION['RRRR'] = $row['RoomNo'];
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>ECARE - Maintenance</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap');

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
            text-align: center;
            color: #00796b;
            font-weight: 700;
            padding-top: 40px;
            margin-bottom: 40px;
        }

        .header h2 {
            margin: 0;
            font-size: 2.5rem;
        }

        .services {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .service-box {
            background-color: white;
            width: 300px;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .service-box:hover {
            transform: translateY(-10px);
        }

        .service-box img {
            width: 100px;
            margin-bottom: 10px;
        }

        .service-box h3 {
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .service-box button {
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .service-box button:hover {
            background-color: #004d40;
        }

        .hidden-box {
            display: none;
            margin-top: 20px;
        }

        .hidden-box textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .hidden-box button {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .hidden-box button:hover {
            background-color: #004d40;
        }

        .hidden-box .cancel-btn {
            background-color: #e57373;
            margin-top: 10px;
        }

        .hidden-box .cancel-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php include('base.php'); ?>

        <div class="header">
            <h2>Having Room Issues?</h2>
        </div>

        <div class="services">
            <div class="service-box">
                <img src="images/plumber.png" alt="Plumber">
                <h3>Plumbing Related?</h3>
                <button onclick="toggleBox('plumberBox')">Inquire</button>
                <div id="plumberBox" class="hidden-box">
                    <h4>Room No: <?php echo $roomNo; ?></h4>
                    <form method="post" action="/Riverside-Hostel-Management-System/ECARE/MaintainanceDB/plumbingdb.php">
                        <label for="message"><b>Explain Issue:</b></label>
                        <textarea id="message" name="message" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <button class="cancel-btn" onclick="toggleBox('plumberBox')">Cancel</button>
                </div>
            </div>

            <div class="service-box">
                <img src="images/electian.png" alt="Electrician">
                <h3>Electricity Related?</h3>
                <button onclick="toggleBox('electricBox')">Inquire</button>
                <div id="electricBox" class="hidden-box">
                    <h4>Room No: <?php echo $roomNo; ?></h4>
                    <form method="post" action="/Riverside-Hostel-Management-System/ECARE/MaintainanceDB/electricdb.php">
                        <label for="message"><b>Explain Issue:</b></label>
                        <textarea id="message" name="message" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <button class="cancel-btn" onclick="toggleBox('electricBox')">Cancel</button>
                </div>
            </div>

            <div class="service-box">
                <img src="images/painter.png" alt="Painter">
                <h3>Wall Painting Related?</h3>
                <button onclick="toggleBox('wallBox')">Inquire</button>
                <div id="wallBox" class="hidden-box">
                    <h4>Room No: <?php echo $roomNo; ?></h4>
                    <form method="post" action="/Riverside-Hostel-Management-System/ECARE/MaintainanceDB/walldb.php">
                        <label for="message"><b>Explain Issue:</b></label>
                        <textarea id="message" name="message" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <button class="cancel-btn" onclick="toggleBox('wallBox')">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleBox(boxId) {
            var box = document.getElementById(boxId);
            if (box.style.display === 'none' || box.style.display === '') {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        }
    </script>
</body>

</html>

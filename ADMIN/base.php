<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: adminportal.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <!--  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f9;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #1a202c;
            width: 260px;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            box-shadow: 3px 0 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .sidebar a {
            display: block;
            color: #a0aec0;
            padding: 12px 18px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            margin-bottom: 12px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #4a5568;
            color: #fff;
        }

        .sidebar a.active {
            background-color: #3182ce;
            color: #fff;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .toggle-btn {
            display: none;
            background-color: #1a202c;
            color: white;
            padding: 12px;
            cursor: pointer;
            border: none;
            width: 100%;
            text-align: left;
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo img {
            width: 140px;
            border-radius: 8px;
        }

        .admin-info {
            text-align: center;
            color: #edf2f7;
            margin-bottom: 25px;
        }

        .logout-btn {
            background-color: #e53e3e;
            padding: 12px;
            color: white;
            border-radius: 6px;
            text-align: center;
            display: block;
            width: 100%;
            text-decoration: none;
            margin-top: 20px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #c53030;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .toggle-btn {
                display: block;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="logo">
            <a href="adminportal.php"><img src="images/riverside-logo.png" alt="Logo"></a>
        </div>
        <div class="admin-info">
            <h3>Admin: <?php echo $_SESSION['username'] ?></h3>
            <div id="datetime">
                <h5>Date & Time: </h5>
                <span id="date"></span>
            </div>
        </div>

        <nav>
            <a href="summary.php" class="active">Summary</a>
            <a href="booking.php">Single Bed Bookings</a>
            <a href="addtenant.php">Current Tenants</a>
            <a href="Pricesummary.php">Prices</a>
            <a href="issues.php">Issues</a>
            <a href="cashpayment.php">Cash Payment</a>
            <a href="inquiries.php">Inquiries</a>
            <a href="notices.php">Tenant Notices</a>
            <a href="newadmin.php">Add Admin</a>
        </nav>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

    <div class="content">
        <!-- Your content here -->
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('open');
        }

        function updateDateTime() {
            var dateElement = document.getElementById('date');
            var currentTime = new Date();
            var formattedDateTime = currentTime.getFullYear() + '-' + (currentTime.getMonth() + 1) + '-' + currentTime.getDate() +
                ' ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds();
            dateElement.innerHTML = formattedDateTime;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

</body>

</html>

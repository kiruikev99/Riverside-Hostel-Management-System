<?php
session_start();

// If session variable is not set, redirect to login page
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
    <style>
        body {
            background-color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #2d3748;
            width: 250px;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            display: block;
            color: #a0aec0;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 4px;
            margin-bottom: 10px;
            transition: background-color 0.2s, color 0.2s;
        }

        .sidebar a:hover {
            background-color: #4a5568;
            color: #ffffff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .toggle-btn {
            display: none;
            background-color: #2d3748;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            width: 100%;
            text-align: left;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 140px;
        }

        .admin-info {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color: #e53e3e;
            padding: 10px 20px;
            color: white;
            border-radius: 4px;
            text-align: center;
            display: block;
            width: 100%;
            margin-top: 20px;
            text-decoration: none;
            transition: background-color 0.2s;
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
            <a href="summary.php">Summary</a>
            <a href="booking.php">Single Bed Bookings</a>
           
            <a href="addtenant.php">Tenants</a>
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

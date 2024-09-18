<?php

require_once 'connection.php'; // Database configuration file
session_start();

// Initialize variables for Rent Dashboard
$totalAmountBookings = 0;
$averageBookings = 0;
$fromDateBooking = '';
$toDateBooking = '';

// Initialize Mpesa and Cash total amounts for Rent Dashboard
$totalMpesaAmount = 0;
$totalCashAmount = 0;
$queryMpesa = "SELECT SUM(`AmountPaid`) as totalMpesa FROM tenanttransactions WHERE `Method` = 'Mpesa'";
$resultMpesa = $conn->query($queryMpesa);

if ($resultMpesa && $resultMpesa->num_rows > 0) {
    $row = $resultMpesa->fetch_assoc();
    $totalMpesaAmount = $row['totalMpesa'];
}

$queryCash = "SELECT SUM(`AmountPaid`) as totalCash FROM tenanttransactions WHERE `Method` = 'Cash'";
$resultCash = $conn->query($queryCash);

if ($resultCash && $resultCash->num_rows > 0) {
    $row = $resultCash->fetch_assoc();
    $totalCashAmount = $row['totalCash'];
}

// Handle Rent Dashboard form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $fromDateBooking = $_POST['from_date'];
    $toDateBooking = $_POST['to_date'];

    if (!empty($fromDateBooking) && !empty($toDateBooking)) {
        $fromDateBooking = date('Y-m-d', strtotime($fromDateBooking));
        $toDateBooking = date('Y-m-d', strtotime($toDateBooking));

        $query = "SELECT SUM(`AmountPaid`) as total FROM tenanttransactions WHERE `Date` BETWEEN ? AND ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $fromDateBooking, $toDateBooking);
            $stmt->execute();
            $stmt->bind_result($totalAmountBookings);
            $stmt->fetch();
            $stmt->close();
        }
    }
}

// Total Bookings Query for Rent Dashboard
$sql = "SELECT SUM(AmountPaid) AS TotalAmount FROM tenanttransactions";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $initialTotalBookings = $row['TotalAmount'];
}

// Average for Rent Dashboard
$sql = "SELECT AVG(MonthBalance) AS summary FROM tenantaccount";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $averageBookings = $row['summary'];
}

// Initialize variables for Online Booking Dashboard
$totalAmountRent = 0;
$initialTotalRentBookings = 0;
$initialTotalOnlineBookings = 0;
$averageRent = 0;
$fromDateRent = '';
$toDateRent = '';

// Handle Online Booking Dashboard form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromDateRent = $_POST['fromdate'];
    $toDateRent = $_POST['todate'];

    if (!empty($fromDateRent) && !empty($toDateRent)) {
        $fromDateRent = date('Y-m-d', strtotime($fromDateRent));
        $toDateRent = date('Y-m-d', strtotime($toDateRent));

        $query = "SELECT SUM(`AmountPaid`) as total FROM riversidebookings WHERE `Date` BETWEEN ? AND ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $fromDateRent, $toDateRent);
            $stmt->execute();
            $stmt->bind_result($totalAmountRent);
            $stmt->fetch();
            $stmt->close();
        }
    }
}

// Total Bookings Query for Online Booking Dashboard
$sql = "SELECT SUM(AmountPaid) AS TotalAmount FROM riversidebookings";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $initialTotalRentBookings = $row['TotalAmount'];
}


// Average for Online Booking Dashboard
$sql = "SELECT AVG(AmountPaid) AS average FROM riversidebookings";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $averageRent = $row['average'];
}

// Get the two most recent records for Rent Dashboard
$tableQuery = "SELECT `FirstName`, `LastName`, MonthBalance FROM tenantaccount ORDER BY MonthBalance DESC LIMIT 2";
$tableResultBookings = $conn->query($tableQuery);

// Get the two most recent records for Online Booking Dashboard
$tableQueryRent = "SELECT `First Name`, `Last Name`, AmountPaid FROM riversidebookings ORDER BY Date DESC LIMIT 2";
$tableResultRent = $conn->query($tableQueryRent);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Amount Calculation</title>
    <style>
            body {
                background-color: #f7f9fc;
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
            .top{
                background-color: white;
            }

            nav {
            
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                margin-bottom: 20px;
            }

            nav h1 {
                padding: 20px;
                font-size: 24px;
                font-weight: bold;
                color: #2d3748;
            }

            .categories ul {
                list-style: none;
                display: flex;
                padding: 0;
                margin: 0 20px 20px 20px;
            }

            .categories ul li {
                cursor: pointer;
                padding: 10px 20px;
                background-color: #3498db;
                color: white;
                border-radius: 4px;
                margin-right: 10px;
            }

            .categories ul li:hover {
                background-color: #2980b9;
            }

            .categories ul li.active {
                background-color: #2980b9;
            }

            .tab-content {
                display: none;
            }

            .tab-content.active {
                display: block;
            }

            .dashboard-header {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }

            .dashboard-header h2 {
                font-size: 24px;
                font-weight: bold;
                color: #2d3748;
            }

            .dashboard-header img {
                margin-left: 20px;
            }

            .cards {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }

            .card {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                flex: 1;
            }

            .card h3 {
                font-size: 18px;
                font-weight: bold;
                color: #2d3748;
            }

            .card p {
                font-size: 14px;
                color: #718096;
            }

            .container h2 {
                font-size: 20px;
                font-weight: bold;
                color: #2d3748;
                margin-bottom: 10px;
            }

            .form-container {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .form-container form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .form-container label {
                font-size: 14px;
                color: #718096;
            }

            .form-container input {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-container button {
                padding: 10px;
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .form-container button:hover {
                background-color: #2980b9;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th,
            table td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
            }

            table th {
                background-color: #f7f9fc;
            }
        </style>
</head>
<body>
    <div style="display: flex" class="flex">
        <div class="side">
            <?php include ('base.php') ?>
        </div>

        <div class="container">
            <nav class="top">
                <h1>Finance Dashboard</h1>
                <div class="categories">
                    <ul>
                        <li id="bookings-tab" class="active" onclick="showTab('bookings')">Rent Dashboard</li>
                        <li id="rent-payment-tab" onclick="showTab('rent-payment')">Online Booking</li>
                    </ul>
                </div>
            </nav>

            <div style="width: 120vh" id="bookings" class="tab-content active">
                <div class="dashboard-header">
                    <h2>Rent Dashboard</h2>
                </div>

                <div class="cards">
                    <div class="card">
                        <h3><?php echo "KSH " . number_format($initialTotalBookings, 2); ?></h3>
                        <p>Total Amount</p>
                    </div>
                    <div class="card">
                        <h3><?php echo "KSH " . number_format($averageBookings, 2); ?></h3>
                        <p>Total Summary</p>
                    </div>
                    <div class="card">
                        <h3><?php echo "KSH " . number_format($totalMpesaAmount, 2); ?></h3>
                        <p>Mpesa</p>
                    </div>
                    <div class="card">
                        <h3><?php echo "KSH " . number_format($totalCashAmount, 2); ?></h3>
                        <p>Cash</p>
                    </div>
                </div>

                <div class="form-container">
                    <h2>Finance Duration</h2>
                    <form method="post" action="">
                        <label for="from_date">From Date:</label>
                        <input type="date" id="from_date" name="from_date" required>
                        <label for="to_date">To Date:</label>
                        <input type="date" id="to_date" name="to_date" required>
                        <button type="submit">View Total</button>
                    </form>
                    <?php if (!empty($fromDateBooking) && !empty($toDateBooking)) { ?>
                        <h3>Total Amount from <?php echo date('d-m-Y', strtotime($fromDateBooking)); ?> to <?php echo date('d-m-Y', strtotime($toDateBooking)); ?>: <?php echo "KSH " . number_format($totalAmountBookings, 2); ?></h3>
                    <?php } ?>
                </div>
            </div>

            <div style="width: 120vh" id="rent-payment" class="tab-content">
                <div class="dashboard-header">
                    <h2>Online Booking Dashboard</h2>
                </div>

                <div class="cards">
                    <div class="card">
                        <h3><?php echo "KSH " . number_format( $initialTotalRentBookings, 2); ?></h3>
                        <p>Total Amount</p>
                    </div>
                    <div class="card">
                        <h3><?php echo "KSH " . number_format($averageRent, 2); ?></h3>
                        <p>Total Summary</p>
                    </div>
                </div>

                <div class="form-container">
                    <h2>Finance Duration</h2>
                    <form method="post" action="">
                        <label for="from_date">From Date:</label>
                        <input type="date" id="from_date" name="fromdate" required>
                        <label for="to_date">To Date:</label>
                        <input type="date" id="to_date" name="todate" required>
                        <button type="submit">View Total</button>
                    </form>
                    <?php if (!empty($fromDateRent) && !empty($toDateRent)) { ?>
                        <h3>Total Amount from <?php echo date('d-m-Y', strtotime($fromDateRent)); ?> to <?php echo date('d-m-Y', strtotime($toDateRent)); ?>: <?php echo "KSH " . number_format($totalAmountRent, 2); ?></h3>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }
            document.getElementById(tabId).classList.add('active');

            const tabs = document.querySelectorAll('.categories ul li');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            document.getElementById(tabId + '-tab').classList.add('active');
        }
    </script>
</body>
</html>


    
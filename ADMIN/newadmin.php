<?php
session_start();
include 'connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM loginform";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        nav {
            background-color: #2c3e50;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #555;
            color: #fff;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input[type="submit"] {
            background-color: blue;
            color: #fff;
            cursor: pointer;
            padding: 12px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
        }
        main {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .section{
            display: grid;
            grid-template-columns: auto auto;
        }
        .registration{
            border-left: 2px solid black;
            padding-left: 20px;
        }
        .display{
            padding-left: 40px;
        }
        .border{
            padding: 300px;
        }
    </style>
</head>
<body>

<header>
<button><img  width="140px" src="images/riverside-logo.png"></button>
    <h1>RIVESIDE ADMIN</h1>
</header>

<nav>
<a href="booking.php">Bookings</a>
    <a href="addtenant.php">Tenants</a>
    <a href="#">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="inquiries.php">Tenant Notices</a>
    <a href="newadmin.php">Add Admin</a>
</nav>
<main>
    
<div class="section">
    <div class="display">
   <H4>CURRENT ADMIN: 
    <?php 
   echo  $_SESSION["username"]  ?>

   </H4>

        <span class="border"></spa>


   <H4>Current of Admins:</H4>
   <?php
    // Output the data in an HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>ADMIN Name</th><th>Username</th></tr>"; // Adjust headers based on your table columns

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['NO'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";



        // Add more cells for other columns as needed
        echo "</tr>";
    }

    echo "</table>";


?>

    </div>
    <div class="registration">
        <form autocomplete="off" action="process_formadmin.php" method="post">
                <label for="adminName">Admin Name:</label>
                <input autocomplete="false" type="text" id="adminName" name="adminName" required>

                <label for="adminEmail">Admin Username:</label>
                <input autocomplete="false" type="text" id="adminEmail" name="adminusername" required>

                <label for="adminPassword">Admin Password:</label>
                <input autocomplete="false" type="password" id="adminPassword" name="Password" required>

                <label for="confirmPassword">Confirm Password:</label>
                <input autocomplete="false" type="password" id="confirmPassword" name="confirmPassword" required>
                <br><br>
                <input type="submit" value="Create Admin">
        </form>
     
       
    </div>

    <div style="padding-left: 150px" class="adminrecords">
        <button id="adminrecords">Admin Login Records</button>
    </div>
        <?php
    $sql = "SELECT * FROM adminloginrecords";
    $result = $conn->query($sql);
    // Output the data in an HTML table
    echo "<table>";
    echo "<tr><<th>ADMINName</th><th>Login Date&Time</th></tr>"; // Adjust headers based on your table columns

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['AdminName'] . "</td>";
        echo "<td>" . $row['RecordTime'] . "</td>";
       



        // Add more cells for other columns as needed
        echo "</tr>";
    }

    echo "</table>";
    ?>
    </div>
</div>
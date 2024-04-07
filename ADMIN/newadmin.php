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
</head>

<?php include('base.php'); ?>
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
        <h2><b>Create New Admin</b></h2>
                <label for="adminName">Admin Name:</label>
                <input autocomplete="false" type="text" id="adminName" name="adminName" required>
                    <br><br><br>
                <label for="adminEmail">Admin Username:</label>
                <input autocomplete="false" type="text" id="adminEmail" name="adminusername" required>
                <br><br><br>
                <label for="adminPassword">Admin Password:</label>
                <input autocomplete="false" type="password" id="adminPassword" name="Password" required>
                <br><br><br>
                <label for="confirmPassword">Confirm Password:</label>
                <input autocomplete="false" type="password" id="confirmPassword" name="confirmPassword" required>
                <br><br>
                <input type="submit" value="Create Admin">
        </form>
     
       
    </div>

    <div style="text-align:center" class="adminrecords">
       <h2>Admin Login Records</h2>
    </div>
        <?php
    $sql = "SELECT * FROM adminloginrecords";
    $result = $conn->query($sql);
    // Output the data in an HTML table
    echo "<table>";
    echo "<tr><<th>ADMINName</th><th>Login Date&Time</th></tr>";  

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
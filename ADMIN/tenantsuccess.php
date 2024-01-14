<?php
include ('connection.php');
session_start();
// tenantsuccess.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    
    $room = $_POST["room"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $university = $_POST["University"];
    $checkinDate = $_POST["Date"];
    
    $fname =  $_SESSION["fname"];
    $lname =  $_SESSION["lname"];
    $paid = $_SESSION["paid"];
    $balance =  $_SESSION["balance"];
    

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the "tenantaccount" table
    $insertQuery = "INSERT INTO tenantaccount (RoomNo, FirstName, LastName, Username, Password, University, Checkin, AmountPaid, Balance) VALUES ('$room', '$fname', '$lname', '$username', '$hashedPassword', '$university', '$checkinDate', '$paid', '$balance')";

    if ($conn->query($insertQuery) === TRUE) {
        echo '<script>alert('.$fname.'s Account is made )</script>';
        header("Location: booking.php");
        echo "<p>Data has been inserted into the tenantaccount table.</p>";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If someone tries to access this page directly without submitting the form, you can redirect them.
    header("Location: index.php"); // Replace index.php with the actual name of your main page.
    exit();
}
?>
?>

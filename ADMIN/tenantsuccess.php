

<?php
include ('connection.php');
session_start();
// tenantsuccess.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form


    // Check if session variables are set
    if (!isset($_SESSION["no"]) || !isset($_SESSION["fname"]) || !isset($_SESSION["lname"])) {
        echo "Session variables are not set.";
        exit;
    }

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind statement
    

    // Retrieve data from the form
    $no = $_SESSION["no"];
    $dateofbirth = $_POST["D-O-B"];
    $room = $_POST["room"];
    $user= $_POST["Username"];
    $password = $_POST["Password"];
    $university = $_POST["University"];
    $checkinDate = $_POST["Date"];

    $number = $_POST["phoneNumber"];
    $fname =  $_SESSION["fname"];
    $lname =  $_SESSION["lname"];

    $insertQuery = "INSERT INTO tenantaccount (RoomNo, FirstName, LastName, PhoneNumber, Username, Password, University, Checkin, `D-O-B`) VALUES ('$room', '$fname', '$lname', '$number', '$user', '$password', '$university', '$checkinDate', '$dateofbirth')";
    $stmt = $conn->prepare($insertQuery);

    // Execute the statement
    if ($stmt->execute()) {
        // Success
        $sql = "DELETE FROM riversidebookings WHERE No =  '$no'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo '<script>alert("Success")
            window.location.href = "addtenant.php";</script>';
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // Error
        if ($conn->errno == 1062) {
            echo '<script>alert("'.$room.' has already been assigned to a tenant")
            window.location.href = "addtenant.php";</script>';
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


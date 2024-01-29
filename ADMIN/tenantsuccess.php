<?php
include ('connection.php');
session_start();
// tenantsuccess.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form

    $no = $_SESSION["no"];
    
    $room = $_POST["room"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $university = $_POST["University"];
    $checkinDate = $_POST["Date"];
    
    $fname =  $_SESSION["fname"];
    $lname =  $_SESSION["lname"];
    $paid = $_SESSION["paid"];
    $balance =  $_SESSION["balance"];
    

    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the "tenantaccount" table

   

    $insertQuery = "INSERT INTO tenantaccount (RoomNo, FirstName, LastName, Username, Password, University, Checkin, AmountPaid, Balance) VALUES ('$room', '$fname', '$lname', '$username', '$password', '$university', '$checkinDate', '$paid', '$balance')";

    if ($conn->query($insertQuery) === TRUE) {
        $sql = "DELETE FROM riversidebooking WHERE No = $no";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
            alert("Success")
            window.location.href = "booking.php";

            </script>';
           }

    }
     else {
        if ($conn->errno == 1062) {
            echo '<script>
        alert("'.$room.' Has already been assigned to a tenant")
        </script>';
        } 
        echo '<script>
        window.location.href = "booking.php";

        </script>';
    }

    // Close the database connection
    $conn->close();
} 

?>


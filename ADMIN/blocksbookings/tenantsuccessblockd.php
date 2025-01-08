

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
    $room =  $_SESSION["roomno"];
    $user= $_POST["Username"];
    $password = $_POST["Password"];
    $university = $_SESSION["university"];
    $checkinDate = $_POST["Date"];


    //new
    $gender = $_SESSION["gender"];
    $fathername = $_POST["father"];
    $fathernumber = $_POST["fatherno"];
    $disease = $_POST["disease"];
    $doctor = $_POST["doctor"];
    $blood = $_POST["blood"];
    $email = $_POST["useremail"];
    

    

    $number = $_SESSION["phone"];
    $fname =  $_SESSION["fname"];
    $lname =  $_SESSION["lname"];

    $insertQuery = "INSERT INTO tenantaccountblocka (RoomNo, FirstName, LastName, PhoneNumber, Username, Password, University, Checkin, `D-O-B`, Gender, FatherName, FatherNumber, Disease, Doctor, BloodGroup, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssssssssssss", $room, $fname, $lname, $number, $user, $password, $university, $checkinDate, $dateofbirth, $gender, $fathername, $fathernumber, $disease, $doctor, $blood, $email);
    
                                                        

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


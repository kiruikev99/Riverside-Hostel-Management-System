<?php
include ('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate session variables
    if (!isset($_SESSION["no"]) || !isset($_SESSION["fname"]) || !isset($_SESSION["lname"])) {
        echo "Session variables are not set.";
        exit;
    }

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data
    $no = $_SESSION["no"];
    $room = $_SESSION["roomno"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $number = $_SESSION["phone"];
    $university = $_SESSION["university"];
    $gender = $_SESSION["gender"];

    $dateofbirth = $_POST["D-O-B"];
    $user = $_POST["Username"];
    $password = $_POST["Password"];
    $checkinDate = $_POST["Date"];
    $fathername = $_POST["father"];
    $fathernumber = $_POST["fatherno"];
    $disease = $_POST["disease"];
    $doctor = $_POST["doctor"];
    $blood = $_POST["blood"];
    $email = $_POST["useremail"];

    // Insert query
    $insertQuery = "INSERT INTO tenantaccountblocka (RoomNo, FirstName, LastName, PhoneNumber, Username, Password, University, Checkin, `D-O-B`, Gender, FatherName, FatherNumber, Disease, Doctor, BloodGroup, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssssssssssss", $room, $fname, $lname, $number, $user, $password, $university, $checkinDate, $dateofbirth, $gender, $fathername, $fathernumber, $disease, $doctor, $blood, $email);

    // if ($stmt->execute()) {
    //     // Delete from blockabooking
    //     $deleteQuery = "DELETE FROM blockabooking WHERE RoomNo = ?";
    //     $deleteStmt = $conn->prepare($deleteQuery);
    //     $deleteStmt->bind_param("s", $room);
    //     if ($deleteStmt->execute()) {
    //         echo '<script>alert("Success"); window.location.href = "addtenant.php";</script>';
    //     } else {
    //         echo "Error deleting record: " . $deleteStmt->error;
    //     }
    //     $deleteStmt->close();
    // } else {
    //     echo "Error: " . $stmt->error;
    // }

    $stmt->close();
    $conn->close();
}
?>

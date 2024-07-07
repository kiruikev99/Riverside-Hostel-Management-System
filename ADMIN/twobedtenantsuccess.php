<?php
include('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form


    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $dof = $_POST['d-o-b'];
    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];
    $university = $_POST['university'];
    $checkin_date = $_POST['checkin_date'];
    $fathername = $_POST['fathername'];
    $fathernumber = $_POST['fathernumber'];
    $disease = $_POST['disease'];
    $bloodtype = $_POST['bloodtype'];
    $doctor = $_POST['doctor'];
    $roomatefname = $_SESSION['roomatefname'];
    $roomatelname = $_SESSION['roomatelname'];
    $roomatedof = $_POST['roomated-o-b'];
    $roomatephonenum = $_POST['roomatephonenum'];
    $roomateemail = $_POST['roomateemail'];
    $roomateuniversity = $_POST['roomateuniversity'];
    $roomatecheckin_date = $_POST['roomatecheckin_date'];
    $roomatefathername = $_POST['roomatefathername'];
    $roomatefathernumber = $_POST['roomatefathernumber'];
    $roomatedisease = $_POST['roomatedisease'];
    $roomatebloodtype = $_POST['roomatebloodtype'];
    $roomatedoctor = $_POST['roomatedoctor'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $insertQuery = "INSERT INTO twobedaccount (`FirstName`, `LastName`, `D-O-B`, `PhoneNumber`, `Email`, `Check-in Date`, `FatherName`, `FatherNumber`, `Disease`, `BloodType`, `Doctor`, `RoommateName`, `RoommateLname`, `RoommateD-O-B`, `RoommatePhoneNumber`, `RoomateEmail`, `RoommateUniversity`, `RoommateCheck-in Date`, `RoommateFatherName`, `RoommateFatherNumber`, `RoomateDisease`, `RoomateBloodType`, `RoommateDoctor`, `Username`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssssssssssssssssssssss", $fname, $lname, $dof, $phonenum, $email, $checkin_date, $fathername, $fathernumber, $disease, $bloodtype, $doctor, $roomatefname, $roomatelname, $roomatedof, $roomatephonenum, $roomateemail, $roomateuniversity, $roomatecheckin_date, $roomatefathername, $roomatefathernumber, $roomatedisease, $roomatebloodtype, $roomatedoctor, $username, $password);

    if ($stmt->execute()) {
        
        // Delete the original tenant and roommate data from the database
        $deleteTenantQuery = "DELETE FROM  twobedaccount WHERE FirstName = ? AND LastName = ?";
        $deleteRoommateQuery = "DELETE FROM  twobedaccount WHERE RoommateName = ? AND RoommateLname = ?";
        
        $stmtDelete = $conn->prepare($deleteTenantQuery);
        $stmtDelete->bind_param("ss", $fname, $lname);
        $stmtDelete->execute();
        $stmtDelete->close();

        $stmtDeleteRoommate = $conn->prepare($deleteRoommateQuery);
        $stmtDeleteRoommate->bind_param("ss", $roomatefname, $roomatelname);
        $stmtDeleteRoommate->execute();
        $stmtDeleteRoommate->close();

        // Optionally, you can clear the session variables
     
        echo "<script> alert('Added')</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

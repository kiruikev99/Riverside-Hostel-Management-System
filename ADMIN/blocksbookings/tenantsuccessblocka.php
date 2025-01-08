<?php
include ('connection.php');
session_start();
echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

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
    $status = 'Pending';

    // Calculate Rent_Deadline_Date (one month from Checkin)
    $checkinDateObject = new DateTime($checkinDate);
    $checkinDateObject->modify('+1 month');
    $rentDeadlineDate = $checkinDateObject->format('Y-m-d'); // Format the date for SQL

    // Insert query
    $insertQuery = "INSERT INTO tenantaccountblocka (RoomNo, FirstName, LastName, PhoneNumber, Username, Password, University, Checkin, RentStatus, Rent_Deadline_Date, `D-O-B`, Gender, FatherName, FatherNumber, Disease, Doctor, BloodGroup, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssssssssssssss", $room, $fname, $lname, $number, $user, $password, $university, $checkinDate, $status, $rentDeadlineDate, $dateofbirth, $gender, $fathername, $fathernumber, $disease, $doctor, $blood, $email);

    if ($stmt->execute()) {
        echo '
        <script>
            Swal.fire({
                title: "Success",
                text: "Tenant Account Has Been Created",
                icon: "success",
                confirmButtonText: "Okay"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "booking.php"; // Redirects to riverside.php
                }
            });
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

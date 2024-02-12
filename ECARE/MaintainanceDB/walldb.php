<?php

include "connection.php";

// date_default_timezone_set('Africa/Nairobi');
session_start();

$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $roomNo = $row['RoomNo'];


}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["message"];
    $date = date('Y-d-m');
    $fname = $_SESSION['wame'];



    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO walldb (FirstName, RoomNo, Issue, Date)
VALUES ('$fname', '$roomNo', '$name', '$date')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("You will be Contacted by the admin the Date Painter will come. Thank You")
    window.location.href = "/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/tenantbase.php";</script>';
  } 
  else {
    // Error
    if ($conn->errno == 1062) {
        echo '<script>alert("'.$roomNo.' has already been assigned to a Painting Issue. ")
        window.location.href = "/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/tenantbase.php";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
}

}


?>
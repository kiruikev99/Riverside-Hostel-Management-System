<?php
include("connection.php");

if (isset($_GET['issuedelete'])) {
    $no = $_GET['issuedelete'];

 // Attempt to delete the record
 $sql = "DELETE FROM electricdb WHERE RoomNo = $no";
 $result = mysqli_query($conn, $sql);

 if ($result) {
     echo '<script>alert("Deleted successfully")
   window.location.href = "booking.php";</script>';
 } else {
     echo "Error: " . mysqli_error($conn);
 }
}

// Close the database connection if needed
mysqli_close($conn);
?>
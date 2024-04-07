<?php
include("connection.php");


if (isset($_GET['tenantid'])) {
    $ID = $_GET['tenantid'];

    // Attempt to delete the record
    $sql = "DELETE FROM riversidebookings WHERE No = $ID";
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

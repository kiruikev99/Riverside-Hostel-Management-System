<?php
include("connection.php");


if (isset($_GET['deleteid'])) {
    // Sanitize input to prevent SQL injection
    $ID = mysqli_real_escape_string($conn, $_GET['deleteid']);

    // Attempt to delete the record
    $sql = "DELETE FROM riversidebooking WHERE ID=$ID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:booking.php');
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection if needed
mysqli_close($conn);
?>

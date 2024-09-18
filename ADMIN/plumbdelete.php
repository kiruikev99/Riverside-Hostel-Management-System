<?php
include("connection.php");

if (isset($_GET['issuedelete'])) {
    $no = $_GET['issuedelete'];

    // Ensure $no is an integer (assuming RoomNo is numeric)
    $no = intval($no);

    // Use a prepared statement to safely execute the deletion
    $stmt = $conn->prepare("DELETE FROM plumbingdb WHERE RoomNo = ?");
    $stmt->bind_param("i", $no);
    $result = $stmt->execute();

    if ($result) {
        echo '<script>alert("Deleted successfully"); window.location.href = "booking.php";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>

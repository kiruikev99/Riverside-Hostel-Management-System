<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';


    // Get room number from POST data
    $roomno = $_POST['roomno'];

    // Delete from tenantaccountblocka
    $delete_sql = "DELETE FROM tenantaccountblocka WHERE RoomNo = ?";
    $delete_stmt = $conn->prepare($delete_sql);

    // Update blockabooking
    $update_sql = "INSERT INTO blockabooking (RoomNo, Status, Name, LastName, StudentPhoneNumber, Gender, University, NumberPaid) 
                   VALUES (?, 'Available', '', '', '', '', '', '')";
    $update_stmt = $conn->prepare($update_sql);

    if ($delete_stmt && $update_stmt) {
        // Bind and execute DELETE query
        $delete_stmt->bind_param("s", $roomno);
        $delete_result = $delete_stmt->execute();

        // Bind and execute UPDATE query
        $update_stmt->bind_param("s", $roomno);
        $update_result = $update_stmt->execute();

        if ($delete_result && $update_result) {
            http_response_code(200); // OK
            echo "Success";
        } else {
            http_response_code(500); // Internal Server Error
        }

        $delete_stmt->close();
        $update_stmt->close();
    } else {
        http_response_code(500); // Internal Server Error
    }
    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
}
?>

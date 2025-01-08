<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';


    // Get room number from POST data
    $roomno = $_POST['roomno'];

    // Delete from tenantaccountblocka
    $delete_sql = "DELETE FROM blockabooking WHERE RoomNo = ?";
    $delete_stmt = $conn->prepare($delete_sql);


    if ($delete_stmt) {
        // Bind and execute DELETE query
        $delete_stmt->bind_param("s", $roomno);
        $delete_result = $delete_stmt->execute();


        if ($delete_result) {
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

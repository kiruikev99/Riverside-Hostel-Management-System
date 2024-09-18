<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomNo = $_POST['roomNo'];
    $cashAmount = $_POST['cashAmount'];

    // Fetch current balance
    $query = "SELECT MonthBalance, FirstName, LastName FROM tenantaccount WHERE RoomNo = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $roomNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentBalance = $row['MonthBalance'];
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];

        // Calculate new balance
        $newBalance = $currentBalance - $cashAmount;

        // Update tenant balance
        $updateQuery = "UPDATE tenantaccount SET MonthBalance = ? WHERE RoomNo = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'ds', $newBalance, $roomNo);
        mysqli_stmt_execute($updateStmt);
        $type = "Cash";
        $date = date("Y-m-d");

        // Insert transaction record
        $insertQuery = "INSERT INTO tenanttransactions (RoomNo, FirstName, LastName, AmountPaid, Balance, Method, Date) VALUES (?, ?, ?, ?, ?, ?,?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, 'sssssss', $roomNo, $firstName, $lastName, $cashAmount, $newBalance, $type, $date);
        mysqli_stmt_execute($insertStmt);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

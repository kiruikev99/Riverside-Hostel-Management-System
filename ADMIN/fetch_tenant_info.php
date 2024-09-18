<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomNo = $_POST['roomNo'];

    $query = "SELECT FirstName, LastName, MonthBalance FROM tenantaccount WHERE RoomNo = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $roomNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['FirstName'] . ' ' . $row['LastName'];
        $balance = $row['MonthBalance'];

        echo json_encode(['success' => true, 'name' => $name, 'balance' => $balance]);
    } else {
        echo json_encode(['success' => false]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

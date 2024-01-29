<?php
include("connection.php");

if (isset($_GET['tenantid'])) {
    $no = $_GET['tenantid'];

    $sql = "DELETE FROM contact WHERE ID=$ID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
       header('location:inquiries.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

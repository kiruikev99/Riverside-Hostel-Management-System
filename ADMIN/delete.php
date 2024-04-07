<?php
include("connection.php");

if (isset($_GET['deleteid'])) {
    $no = $_GET['deleteid'];      

    $sql = "DELETE FROM contact WHERE ID = $no";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo '<script>alert("Deleted successfully")
      window.location.href = "inquiries.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

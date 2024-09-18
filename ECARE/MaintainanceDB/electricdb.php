<?php

include "connection.php";

session_start();

$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $roomNo = $row['RoomNo'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["message"];
    $date = date('Y-d-m');
    $fname = $_SESSION['wame'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Enable exception mode for mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $sql = "INSERT INTO electricdb (FirstName, RoomNo, Issue, Date)
                VALUES ('$fname', '$roomNo', '$name', '$date')";
        $conn->query($sql);

        echo '<script>
            swal({
                title: "Issue Reported!",
                text: "You will be contacted by the admin. Thank you!",
                icon: "success"
            }).then(function() {
                window.location.href = "/Riverside-Hostel-Management-System/ECARE/tenantbase.php";
            });
        </script>';

    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo '<script>
                swal({
                    title: "Duplicate Entry",
                    text: "You have already reported this issue.",
                    icon: "error"
                }).then(function() {
                    window.location.href = "/Riverside-Hostel-Management-System/ECARE/tenantbase.php";
                });
            </script>';
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>

<!-- Your HTML form and other content here -->

</body>
</html>

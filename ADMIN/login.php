<?php
include("connection.php");
date_default_timezone_set('Africa/Nairobi');
$loginTime = date('Y-m-d H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["TIME"] = $loginTime;

    $query = "SELECT * FROM loginform WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            // Insert login details into adminloginrecords
            $insertQuery = "INSERT INTO adminloginrecords (AdminName, RecordTime) VALUES (?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);

            if ($insertStmt) {
                mysqli_stmt_bind_param($insertStmt, 'ss', $username, $loginTime);
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);
            } else {
                echo "Insert Statement Error: " . mysqli_error($conn);
            }

            // Redirect to booking.php
            echo '<script>
                    window.location.href = "booking.php";
                    alert("Welcome ' . $username . '!");
                  </script>';
        } else {
            echo '<script>
                    alert("Wrong credentials");
                  </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

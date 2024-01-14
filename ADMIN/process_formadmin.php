<?php
include 'connection.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// The following block should not be inside the above if statement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["adminName"];
    $username = $_POST["adminusername"];
    $password = $_POST["Password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password !== $confirmPassword) {
        echo  '<script>
        window.location.href = "newadmin.php";
        alert("Password Not Matching")
        </script>';;
        
        exit;
    } else {
    

        // SQL query to insert data into the table
        $sql = "INSERT INTO loginform (Name, Username, Password) VALUES ('$name', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {;

           echo  '<script>
        window.location.href = "newadmin.php";
        alert("Success")
        </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>

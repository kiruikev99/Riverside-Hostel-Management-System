<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $numpaid = $_POST["mpesanum"];
    $amount = $_POST["amount"];
    
    $errors = array();

    // Validation
    if (strlen($fname) < 5) {
        $errors[] = "First Name must be at least 5 characters long.";
    }

    if (strlen($lname) < 5) {
        $errors[] = "Last Name must be at least 5 characters long.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (!preg_match("/^[0-9]{10}$/", $numpaid)) {
        $errors[] = "Number Paid must be a 10 digit number.";
    }

    if (!is_numeric($amount) || $amount <= 0) {
        $errors[] = "Amount must be a positive number.";
    }

    if (count($errors) > 0) {
        echo '<script>';
        foreach ($errors as $error) {
            echo "Swal.fire('Error', '$error', 'error');";
        }
        echo '</script>';
    } else {
        $query = "INSERT INTO riversidebookings (`First Name`, `Last Name`, Gender, NumberPaid, AmountPaid) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $gender, $numpaid, $amount);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>
                        Swal.fire({
                            title: "Success!",
                            text: "Thank You For Trusting Us. We will Reach Out To You Soon",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../RIVERSIDE/Riverside.php";
                            }
                        });
                      </script>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

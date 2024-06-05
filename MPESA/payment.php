
<?php
include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $numpaid = $_POST["mpesanum"];
    $amount = $_POST["amount"];


    $query = "INSERT INTO riversidebookings (`First Name`, `Last Name`, Gender, NumberPaid, AmountPaid) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $gender, $numpaid, $amount);
    
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo  '<script>
                    window.location.href = "../RIVERSIDE/Riverside.php";
                    alert("Thank You For Trusting Us. We will Reach Out To You Soon");
                    </script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

?>
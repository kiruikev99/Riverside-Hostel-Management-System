<?php
include("connection.php");

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if(!empty($message)){
        $query = "INSERT INTO contact (Name, Number, Email, Message) VALUES (?, ?, ?, ?)";
        
            $stmt = mysqli_prepare($conn, $query);
            
            if($stmt){
                mysqli_stmt_bind_param($stmt, 'ssss', $name, $tel, $email, $message);
            if(mysqli_stmt_execute($stmt)){
                echo "<script type='text/javascript'> alert(Successfull')</script>";
            } else {
                echo "<script type='text/javascript'> alert('Error: " . mysqli_error($conn) . "')</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo '<script type="text/javascript"> alert("Enter some info")
        window.location.href = "contact.php";</script>';
    }
}
?>

<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $roomno = $_POST['roomno'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password =($_POST['password']);
    $university = $_POST['university'];
    $course = $_POST['course'];
    $checkin = $_POST['checkin'];
    $paid = $_POST['paid'];
    $total = $_POST['total'];

    $query = "INSERT INTO tenantregister (RoomNo, Name, Username, Password, University, Course, Checkin, AmountPaid, TotalAmount)VALUES ('$roomno', '$name', '$username', '$password', '$university', '$course', '$checkin', '$paid', '$total')";
        
    $stmt = mysqli_prepare($conn, $query);
    
    if($stmt){
      
        if(mysqli_stmt_execute($stmt)){
            echo "<script type='text/javascript'> alert('Thank You')</script>";
            header("Location: addtenant.php");
        } else {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($conn) . "')</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script type='text/javascript'> alert('Error: " . mysqli_error($conn) . "')</script>";
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .mainform input {
        display: block;
        padding-top: 10px;
    }
    .mainform{
        padding-top: 50px;
    }
    .submit{
        padding-top: 17px;
        padding-left: 40px;
    }
    

    </style>
<body>
    <div class="header">
        STUDENT REGISTRATION
    </div>
    <div class="image">
    <img style="width: 180px;" src="riverside-logo.png">
    </div>
    <div class="mainform">
        <form method="post" action="">
            <label>ROOM NO<input name="roomno" type="text">
            <label>Full Name<input name="name" type="text">
            <label>Username<input name="username" required type="text">
            <label>Password<input name="password" required type="password">
            <label>University<input name="university" type="text">
            <label>Course<input name="course" type="text">
            <label>CheckIn<input name="checkin" type="number">
            <label>Amount Paid<input name="paid" type="int">

            <label>Total Amount<input name="total" type="int" placeholder="15000">
            <div class="submit">
            <input type="submit" value="Submit" name="submit">
            </div>

        </form>
    </div>
    
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit'])){
$username = $_POST["user"];
$password = $_POST["pass"]; 

session_start();
$_SESSION["username"] = $username;

$sql = "SELECT * FROM `loginform` where Username = '$username' and Password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count == 1){
    header("Location:addtenant.php");
}
else{
    echo '<script>
        window.location.href = "adminportal.php";
        alert("Login Failed Incorect Password or Usernamme")
        </script>';
    }
}
?>
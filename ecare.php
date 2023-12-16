<?php

include("connection.php");
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['nickname'];
    $_SESSION['password'] =  $_POST['pass'];





    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM tenantregister WHERE Username = ? AND Password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['username'],$_SESSION['password']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
       echo "<script>alert('Welcome " . $_SESSION['username'] . "')</script>";

       
        header("Location: tenantbase.php");
       

        exit();
    } else {
        // Invalid username or password
        echo "<script>
            alert('Incorrect Information');
            </script>";
    }

    mysqli_stmt_close($stmt);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIVERSIDE ADMIN</title>
</head>

<style>
 @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');

.BOX {
    height: 60vh;
    width: 50vh;
    text-align: center;
    display: block;
    justify-content: center;
    align-items: center;
    border: 3px solid blue;
    margin: 0 auto; /* Center horizontally */
    margin-top: 10vh; /* Adjust the top margin as needed */
    filter: blur(0%);
    border-radius: 10px;
    color: white;
    backdrop-filter: blur(5px);
    background: transparent;
    border: 2px solid rgb(255, 255, 255, .2);
    
    
}
.input{
    background: transparent;
    border-radius: 10px;
}

.background-image{
   background-image:url(background-image.png);
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center;
   height: 100%;
   
  
  
    
}
.navlink button{
    background-color: rgb(255, 255, 255);
    
    
}
.navlink{
    display: flex;
    color: rgb(255, 255, 255);
    justify-content: space-evenly;
    
}
.navlink li{
    font-family: 'Oxygen', sans-serif;
    padding-top: 60px;
    
    list-style: none;
}
.navlink li:hover{
    border-top: 2px solid gray;
    cursor: pointer;
    color: cadetblue;
}
.admin-grid{
    text-align: center;
    padding-bottom: 350px;
    
    
}
.content{
    text-align: center;
    padding-top: 70px;
    font-size: large;
    
}
input{
    padding: 10px;
}
.password, .submit{
    padding-top: 25px;
}
.header, .welcome{
    font-family: 'Playfair Display', serif;
}
.header{
    color: greenyellow;
}
.credentials{
    font-family: 'Abel', sans-serif;
    
}
label{
    font-family: 'Abel', sans-serif;
    color: skyblue;
    
}
.info{
    font-family: 'Playfair Display', serif;

}
.submit input{
    background: transparent;
    font-family: 'Playfair Display', serif;
    font-size: large;
    color: white;
    border-radius: 10px;
    border: 1px solid greenyellow;
    cursor: pointer;

}
.submit input:hover{
    background-color: greenyellow;
    color: black;
}
.username input, .password input{
    background: transparent;
    border-radius: 10px;
    

}



    </style>
    <body>
        
    
<div class="background-image">
      <nav>
      <div class="navlink">
      <a href="riverside.html"> <button><img width="100px" src="riverside-logo.png"></button></a>
      <li class="current"><a href="Riverside.php">HOME</a></li>
      <li><a>ABOUT US</a></li>
      <li><a>ROOMS</a></li>
      <li><a>IMAGES</a></li>
      <li><a href="adminportal.php">ADMIN</a></li>
      <li><a href="ecare.php">ECARE</a></li>
    </div>
      </nav>

    <div class="BOX">
        <div class="header">
            <h2>STUDENT ECARE</h2>
        </div>
        <div class="welcome">
          <h3>  WELCOME</h3>
        </div>
        <div class="credentials">
            <p>Please Enter your credentials
        </div>
        <div class="from-section">
            <div class="username">
            <form method="post" action="">
               <label>Username <input name="nickname" autocomplete="off" type="text"></label>
               </div>
            <div class="password">
                <label>Password&nbsp;<input name="pass" type="password"></label>
            </div>
        </div>
            <div class="submit">
                <input name="submit" type="submit">
            </div>
            <div class="info">
                <b><h6>Please Note</h6></b><p>If you are a tenant and you dont have your credentials please visit the Admin</p>
            </div>

            </form>
        
        
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>

    
</body>
</html>
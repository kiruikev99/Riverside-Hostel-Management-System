<?php

    include("connection.php");
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



.background-image{
   background-image:url(background-image2.png);
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



    </style>
<div  class="background-image">
      <nav>
      <div class="navlink">
       <button><img width="100px" src="riverside-logo.png"></button> 
      <li class="current"><a href="Riverside.html">HOME</a></li>
      <li><a>ABOUT US</a></li>
      <li><a>ROOMS</a></li>
      <li><a>IMAGES</a></li>
      <li><a>ADMIN</a></li>
      <li><a href="ecare.php">ECARE</a></li>
    </div>
<div id="form">
    <div class="admin-grid">
        <div class="content">
           
                <h2>Welcome Admin</h2>
                <button> <img width="100px" src="riverside-logo.png"></button>
                <p>Login Admin to see updates</p>
                <form name="form" action="login.php" method="POST">
                    <input type="text" id="user" name="user" autocomplete="off" placeholder="Username"><br><br><br>
                    <input type="password" id="pass" name="pass" placeholder="Password"><br><br>
                     <input type="submit" id="btn" autocomplete="off" value="login" name="submit" placeholder="Password">
                </form>
            
        </div>
        
    </div>
</div>
    

      </nav>
<body>
    
</body>
</html>
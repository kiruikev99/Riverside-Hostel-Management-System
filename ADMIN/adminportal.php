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

.BOX {
    height: 60vh;
    width: 50vh;
    text-align: center;
    display: block;
    justify-content: center;
    align-items: center;
    border: 3px solid blue;
    margin: 0 auto; /* Center horizontally */
    margin-top: 3vh; /* Adjust the top margin as needed */
    filter: blur(0%);
    border-radius: 10px;
    color: BLACK;
    backdrop-filter: blur(5px);
    background: transparent;
    border: 2px solid rgb(255, 255, 255, .2);
    
    
}

.background-image{
   background-image:url(images/background-image2.png);
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
    
}
.logo{
    padding-left: 140px;
 }
 button img:hover{
    cursor: pointer;
    padding: 4px;
    border: 2px solid green;
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
    background-color: red;
    
    font-size: large;
    
}
.HEAD{
    padding-top: 60PX;
    padding-left: 290PX;
    
}
input{
    padding: 10px;
}



    </style>
<div  class="background-image">
      <nav>
      <div class="navlink">
        <div class="logo">
        <a href="http://localhost/Admin-RIVERSIDE/PROJECT%20WORK/RIVERSIDE/RIVERSIDE.php"><button> <img  width="140px" src="images/riverside-logo.png"></button> </a>
       </div>
      
     

    </div>
<div id="form">
    <div class="admin-grid">
    <div class="border">
        <div class="BOX">
           
                <h2>Welcome Admin</h2>
                <button> <img width="100px" src="images/riverside-logo.png"></button>
                <p>Login Admin to see updates</p>
                <form name="form" action="login.php" method="POST">
                    <input type="text" id="user" name="user" autocomplete="off" placeholder="Username"><br><br><br>
                    <input type="password" id="pass" name="pass" placeholder="Password"><br><br>
                     <input type="submit" id="btn" autocomplete="off" value="login" name="submit" placeholder="Password">
                </form>
                <div class="student">
                    <p>Are you a student?<br>
                Visit the <a href="http://localhost/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/ecare.php">StudentECARE</a>  </p>
                </div>
            
        </div>
    </div>
        
    </div>
</div>
    

      </nav>
<body>
    
</body>
</html>
<?php

include("connection.php");
session_start();

include('set.php');

if (isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['nickname'];
    $_SESSION['password'] =  $_POST['pass'];





    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM tenantaccount WHERE Username = ? AND Password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['username'],$_SESSION['password']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
       echo "<script> alert('Welcome " . $_SESSION['username'] . "')</script>";

       
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
body{
    background-color: black;
}
.BOX {
    display: block;
    align-items: center;
    margin: 0 auto; /* Center horizontally */
    margin-top: 10vh; /* Adjust the top margin as needed */
    background-color: #13274F;
    width: 40%;
    padding: 40px;
    color: black    ;
 
    
    
}
.sections{
    display: flex;
    justify-content:center;
}

.sed{
    padding-bottom: 100px;
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
 .ecare{
    font-size: large;
    padding-left: 250px;
    padding-top: 50px;
 }
    

.navlink li{
    font-family: 'Oxygen', sans-serif;
    padding-top: 60px;
    
    list-style: none;
}
button img:hover{
    cursor: pointer;
    padding: 4px;
    border: 2px solid green;
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
    width: 90%;
    color: black;
    border-bottom: 2px solid white;

    
}
.password, .submit{
    padding-top: 25px;
}
.header, .welcome{
    font-family: 'Playfair Display', serif;
}
.header{
    color: green;
}
.credentials{
    font-family: 'Abel', sans-serif;
    
}
label{
    font-family: 'Abel', sans-serif;
    color: skyblue;
    
}
.ecare h2{
    border: 2px solid black;
    padding: 20px;
    background-color: green;
    
    
   

}
.info{
    font-family: 'Playfair Display', serif;

}
.submit input{
    background: transparent;
    font-family: 'Playfair Display', serif;
    font-size: large;
    color: black;
    border-radius: 4px;
    border: 1px solid greenyellow;
    cursor: pointer;

}
.submit input:hover{
    background-color: greenyellow;
    color: black;
}
.username input, .password input{
    background: transparent;
    border-radius: 2px;
    border-top: none;
    border-left: none;
    border-right: none;
    

}
@media screen and (max-width: 1080px){
    .comps{
        display: none;
    }
    body{
        background-color: #13274F;
    }
    .sections{
        display: block;
    }
    .BOX{
        width: 67%;
    }

}



    </style>
    <body>
        
    
<div class="background-image">
<div style="float: left;" class="logo">
                <a href=" https://0127-105-163-1-153.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/RIVERSIDE/RIVERSIDE.php"><img
                            width="50px" src="images/left-arrow.png"></a>
            </div>
      <div class="sections">
                <img class="comps" src="images/portal2.jpg">
            <div class="BOX">
                <div style="text-align: center;" class="oo">
                    <img width="200" src="images/ecare-logo.png">
                </div>
               
                <div class="welcome">
                <h1 style="color: white;">  WELCOME</h1>
                </div>
                <div class="credentials">
                    <p style="color: white;" >Please Enter your credentials
                </div>
                <div class="from-section">
                    <div class="username">
                    <form method="post" action="">
                            <label>Username<br> <input name="nickname" autocomplete="off" placeholder="Username" type="text"></label>
                            </div>
                            <div class="password">
                                <label>Password <br><input placeholder="Password" name="pass" type="password"></label>
                            </div>
                        </div>
                            <div class="submit">
                                <input name="submit" type="submit">
                            </div>
                           

                    </form>    
                </div>
            </div> 
                    
         </div>
 

    
</body>
</html>
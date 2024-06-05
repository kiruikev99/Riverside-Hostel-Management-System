<?php

include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="adminportal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIVERSIDE ADMIN</title>
</head>

<div class="background-image">
    <nav>
        <div class="navlink">
            <div style="float: left;" class="logo">
                <a href=" https://0127-105-163-1-153.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/RIVERSIDE/RIVERSIDE.php"><img
                            width="50px" src="images/left-arrow.png"></a>
            </div>



        </div>
        <div id="form">
            <div class="admin-grid">
                <div class="border">
                    <div class="BOX">
                        <img width="140" src="./images/riverside-logo.png"> <h2>Login</h2>
                        
                    
                        <br>
                   
                        <form name="form" action="login.php" method="POST">
                            <label style="float: left; padding-left:15px;">Username</label>
                            <span class="username"><input type="text" id="user" name="user" autocomplete="off"
                                placeholder="Username"></span> <br><BR>
                                <label style="float: left;  padding-left:15px;">Password</label>
                            <span class="username"> <input type="password" id="pass" name="pass" placeholder="Password"></span><br><br><br>
                            <span class="submit" ><input type="submit" id="btn" autocomplete="off" value="LOGIN" name="submit"
                                placeholder="Password"></span>
                        </form>
                       

                    </div>
                </div>

            </div>
        </div>


    </nav>

    <body>

    </body>

</html>
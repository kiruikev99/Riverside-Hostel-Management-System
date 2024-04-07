<?php

include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="adminportal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIVERSIDE ADMIN</title>
</head>

<div class="background-image">
    <nav>
        <div class="navlink">
            <div class="logo">
                <a href="https://1fd8-105-163-1-171.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/RIVERSIDE/RIVERSIDE.php"><button> <img
                            width="140px" src="images/riverside-logo.png"></button> </a>
            </div>



        </div>
        <div id="form">
            <div class="admin-grid">
                <div class="border">
                    <div class="BOX">

                        <h2 class="welcome"><b>Welcome Admin</b></h2>
                        <button> <img width="100px" src="images/riverside-logo.png"></button>
                        <p><i>Login Admin to see updates</i></p>
                        <form name="form" action="login.php" method="POST">
                            <span class="username"><input type="text" id="user" name="user" autocomplete="off"
                                placeholder="Username"></span> <br><BR>
                            <span class="username"> <input type="password" id="pass" name="pass" placeholder="Password"></span><br><br>
                            <span class="submit" ><input type="submit" id="btn" autocomplete="off" value="LOGIN" name="submit"
                                placeholder="Password"></span>
                        </form>
                        <div class="student">
                            <p>Are you a student?<br>
                                Visit the <a
                                    href="https://1fd8-105-163-1-171.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/ecare.php"><b>StudentECARE</b></a>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </nav>

    <body>

    </body>

</html>
<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="adminportal.css"> <!-- Updated CSS file -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIVERSIDE ADMIN</title>
</head>

<body>
    <div class="background-image">
        <nav>
            <div class="container">
                <a href="http://localhost/Riverside-Hostel-Management-System/RIVERSIDE/Riverside.php"><img src="./images/riverside-logo.png" alt="Riverside Logo" width="140"></a> 
                <h2>Login</h2>
                <form name="form" action="login.php" method="POST">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" id="user" name="user" autocomplete="off" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btn" name="submit" value="LOGIN">
                    </div>
                </form>
            </div>
        </nav>
    </div>
</body>

</html>

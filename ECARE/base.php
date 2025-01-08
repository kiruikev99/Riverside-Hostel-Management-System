<?php



// If session variable is not set, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ecare.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE</title>
    <!-- Favicon -->
    <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Cormorant Garamond', serif;
        margin: 0;
        padding: 0;
        background: #e0f7fa;
        color: #333;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #00796b;
        padding: 10px 20px;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar img {
        width: 150px;
    }

    .navbar ul {
        list-style-type: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .navbar li {
        margin: 0 15px;
    }

    .navbar a {
        text-decoration: none;
        color: white;
        font-size: 1.2rem;
        padding: 5px 10px;
        transition: color 0.3s, background-color 0.3s;
    }

    .navbar a:hover {
        color: #00796b;
        background-color: white;
        border-radius: 5px;
    }

    .navbar .current {
        border-bottom: 2px solid #4db6ac;
    }

    .navbar .logout {
        background-color: red;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .navbar .logout a:hover {
        color: red;
        background-color: white;
    }

    .navbar-toggle {
        display: none;
        cursor: pointer;
        color: white;
        font-size: 1.5rem;
    }

    @media screen and (max-width: 768px) {
        .navbar ul {
            flex-direction: column;
            align-items: center;
            display: none;
            background: #00796b;
            width: 100%;
        }

        .navbar ul.show {
            display: flex;
        }

        .navbar-toggle {
            display: block;
        }
    }
</style>
</head>
<script>
    function toggleNavbar() {
        var navbar = document.querySelector('.navbar ul');
        navbar.classList.toggle('show');
    }
</script>

<div class="navbar">
    <a href="ecare.php"><img src="images/ecare-logo.png" alt="ECARE Logo"></a>
    <span class="navbar-toggle" onclick="toggleNavbar()">&#9776;</span>
    <ul>
        <li><a  href="tenantbase.php">Home</a></li>
        <li><a href="fiancebase.php">Finance</a></li>
        <li><a href="maintainance.php">Maintenance</a></li>
        <li class="logout"><a href="logout.php">Logout</a></li>
    </ul>
</div>

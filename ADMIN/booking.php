<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        nav {
            background-color: #2c3e50;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #555;
            color: #fff;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
<button><img  width="140px" src="images/riverside-logo.png"></button>
    <h1>RIVESIDE ADMIN</h1>
</header>

<nav>
    <a href="#">Bookings</a>
    <a href="#">Tenants</a>
    <a href="#">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="#">Add Admin</a>
</nav>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>NUMBER PAID</th>
            <th>AMOUNT PAID</th>
            <th>BALANCE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM riversidebookings";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row["ID"];
                    $balance = (1000 - $row["AmountPaid"] );
                    
                    echo '<tr>;
                     <td> '.$row["No"].' </td>
                     <td> '.$row["First Name"]. '  ' .$row["Last Name"].'</td>

                     <td> '.$row["NumberPaid"].' </td>
                     <td> '.$row["AmountPaid"].' </td>
                     <td> '.$balance.'  </td>;
                     <td> <button><a href="tenantss.php? tenantid='.$row["No"].'">Make Account</a></button>  </td>';
                    
                }
            }
            ?>
        </table>
        </div>
    
</body>
</html>
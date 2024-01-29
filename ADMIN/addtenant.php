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
            table-layout: fixed;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
        tbody::-webkit-scrollbar {
            width: 10px;
        }
        tbody::-webkit-scrollbar-track, tbody::-webkit-scrollbar-thumb {
            background: black;
            box-shadow: inset 30 0 5px rgba(0, 0, 0, 0.2);
            
        }
    </style>
</head>
<body>

<header>
<button><img  width="140px" src="images/riverside-logo.png"></button>
    <h1>RIVESIDE ADMIN</h1>
</header>

<nav>
<a href="booking.php">Bookings</a>
    <a href="addtenant.php">Tenants</a>
    <a href="#">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="newadmin.php">Add Admin</a>
</nav>

<table>
    <thead>
        <tr>
            <th>ROOM-NO</th>
            <th>TENANT</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>UNIVESITY</th>
            <th>CHECK-IN </th>
            <th>AMOUNT PAID</th>
            <th>BALANCE</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM tenantaccount";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo '<tr>;
                     <td> '.$row["RoomNo"].' </td>
                     <td> '.$row["FirstName"]. '  ' .$row["LastName"].'</td>

                     <td> '.$row["Username"].' </td>
                     <td> '.$row["Password"].' </td>
                     <td> '.$row["University"].' </td>
                     <td> '.$row["Checkin"].' </td>
                     <td> '.$row["AmountPaid"].' </td>
                     <td> '.$row["Balance"].' </td>';
                    
                }      
            }
            ?>
        </table>
        </div>
    
</body>
</html>
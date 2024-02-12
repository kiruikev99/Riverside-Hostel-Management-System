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
<button><a href="adminportal.php"><img  width="140px" src="images/riverside-logo.png"></a></button>
    <h1>RIVESIDE ADMIN</h1>
</header>

<nav>
    <a href="booking.php">Bookings</a>
    <a href="addtenant.php">Tenants</a>
    <a href="issues.php">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="notices.php">Tenant Notices</a>
    <a href="newadmin.php">Add Admin</a>
</nav>

<table>
    <thead>
        <tr>
            <th> Name</th>
            <th>Gmail</th>
           
            <th>Message</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
            <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM contact";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row["ID"];
                    
                    echo "<tr>";
                   
                    echo "<td>" .$row["Name"]. "</td>";
                    echo "<td>" .$row["Email"]. "</td>";
                    echo "<td>" .$row["Message"]. "</td>";
                    echo "<td><button class='reply'><a href = mailto:".$row["Email"].">REPLY</a></button>
                    <button class='delete'><a href ='delete.php? deleteid=".$ID."'>DELETE</a></button></td>";
                    echo "<tr>" ;
                  
                }
                
            } else {
                echo "<tr><td colspan='6'>No records found in the database.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </table>
        </div>
    
</body>
</html>
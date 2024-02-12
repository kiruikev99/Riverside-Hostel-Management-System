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
    <a href="#">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="notices.php">Tenant Notices</a>
    <a href="newadmin.php">Add Admin</a>
</nav>

<div style="text-align: center; padding-top: 10px;" class="plumbing">
    <H2>PLUMBING SECTION</H2>
</div>
<table>
    <thead>
        <tr>">
            <th>Tenant Name</th>
            <th>RoomNo</th>
            <th>Issue</th>
            <th>Date Submited</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM plumbingdb";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                   
                    echo "<td>" .$row["FirstName"]. "</td>";
                    echo "<td>" .$row["RoomNo"]. "</td>";
                    echo "<td>" .$row["Issue"]. "</td>";
                    echo "<td>" .$row["Date"]. "</td>";
                    echo "<td> <button> Delete</button> </td>";

                    echo "</tr>";
                  
                }
                
            } else {
                echo "<tr><td colspan='6'>No records found in the database.</td></tr>";
            }

            mysqli_close($conn);
            ?>

</table>
        </tbody>

    <div style="text-align: center; padding-top: 20px;" class="plumbing">
        <h2>ELECTRICITY SECTION</h2>
        </div>

        <table>
    <thead>
        <tr>
            <th>Tenant Name</th>
            <th>RoomNo</th>
            <th>Issue</th>
            <th>Date Submited</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM electricdb";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                   
                    echo "<td>" .$row["FirstName"]. "</td>";
                    echo "<td>" .$row["RoomNo"]. "</td>";
                    echo "<td>" .$row["Issue"]. "</td>";
                    echo "<td>" .$row["Date"]. "</td>";
                    echo "<td> <button> Delete</button> </td>";

                    echo "</tr>";
                  
                }
                
            } else {
                echo "<tr><td colspan='6'>No records found in the database.</td></tr>";
            }

            mysqli_close($conn);
            ?>

</table>

<div style="text-align: center; padding-top: 20px;" class="plumbing">
        <h2>PAINT SECTION</h2>
        </div>

        <table>
    <thead>
        <tr>
            <th>Tenant Name</th>
            <th>RoomNo</th>
            <th>Issue</th>
            <th>Date Submited</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM walldb";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the database results
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                   
                    echo "<td>" .$row["FirstName"]. "</td>";
                    echo "<td>" .$row["RoomNo"]. "</td>";
                    echo "<td>" .$row["Issue"]. "</td>";
                    echo "<td>" .$row["Date"]. "</td>";
                    echo "<td> <button> Delete</button> </td>";

                    echo "</tr>";
                  
                }
                
            } else {
                echo "<tr><td colspan='6'>No records found in the database.</td></tr>";
            }

            mysqli_close($conn);
            ?>

</table>


</body>
</html>
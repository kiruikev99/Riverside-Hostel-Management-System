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
    <a href="newadmin.php">Add Admin</a>
</nav>

<table>
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Room No</th>
            <th>University</th>
            <th>Number</th>
            <th>Rent Paid</th>
            <th>Rent Balance</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample data, replace with actual data from your database -->
        <tr>
            <td>John Doe</td>
            <td>C2</td>
            <td>University of Example</td>
            <td>123-456-7890</td>
            <td>$400.00</td>
            <td>$100.00</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

</body>
</html>

        <!-- <?php
        include("connection.php");

        $query = "SELECT * FROM tenantregister";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Loop through the database results
            while ($row = mysqli_fetch_assoc($result)) {
                $balance = $row["TotalAmount"] - $row["AmountPaid"];
                echo "<tr>";
                    echo "<td>" .$row["RoomNo"]. "</td>";
                    echo "<td>" .$row["Name"]. "</td>";
                    echo "<td>" .$row["Username"]. "</td>";
                    echo "<td>" .$row["Password"]. "</td>";
                    echo "<td>" .$row["AmountPaid"]. "</td>";
                    echo "<td>" .$row["TotalAmount"]. "</td>";
                    echo "<td>" .$balance. "</td>";
                    echo "<td>" .$row["University"]. "</td>";
                    echo "<td>" .$row["Course"]. "</td>";
                    echo "<td>" .$row["CheckIn"]. "</td>";

                    echo "</tr>";
            }
        }

        ?> -->

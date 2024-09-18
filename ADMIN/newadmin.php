<?php

include 'connection.php';


// SQL query to retrieve data
$sql = "SELECT * FROM loginform";
$result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        main {
            padding: 20px;
        }

        .section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .display,
        .registration,
        .adminrecords {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1 1 45%;
            margin-bottom: 20px;
        }

        .display h4,
        .registration h2,
        .adminrecords h2 {
            margin-top: 0;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div style="display: flex;">
        <div class="side">
            <?php include ("base.php") ?>

        </div>

        <div class="tabo">
            <main>
                <div class="section">
                    <div class="display">
                        <h4>CURRENT ADMIN: <?php echo $_SESSION["username"]; ?></h4>
                        <span class="border"></span>
                        <h4>Current Admins:</h4>
                        <?php
                        // Output the data in an HTML table
                        echo "<table>";
                        echo "<tr><th>ID</th><th>ADMIN Name</th><th>Username</th></tr>"; // Adjust headers based on your table columns
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['NO'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        ?>
                    </div>
                    <div class="registration">
                        <form autocomplete="off" action="process_formadmin.php" method="post">
                            <h2><b>Create New Admin</b></h2>
                            <label for="adminName">Admin Name:</label>
                            <input autocomplete="false" type="text" id="adminName" name="adminName" required>
                            <label for="adminEmail">Admin Username:</label>
                            <input autocomplete="false" type="text" id="adminEmail" name="adminusername" required>
                            <label for="adminPassword">Admin Password:</label>
                            <input autocomplete="false" type="password" id="adminPassword" name="Password" required>
                            <label for="confirmPassword">Confirm Password:</label>
                            <input autocomplete="false" type="password" id="confirmPassword" name="confirmPassword"
                                required>
                            <input type="submit" value="Create Admin">
                        </form>
                    </div>
                    <div class="adminrecords">
                        <h2>Admin Login Records</h2>
                        <?php
                        $sql = "SELECT * FROM adminloginrecords";
                        $result = $conn->query($sql);
                        // Output the data in an HTML table
                        echo "<table>";
                        echo "<tr><th>ADMIN Name</th><th>Login Date & Time</th></tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['AdminName'] . "</td>";
                            echo "<td>" . $row['RecordTime'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        ?>
                    </div>
                </div>
            </main>
        </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
        }

        .tabo {
            flex: 1;
            padding: 20px;
            padding-top: 20px;
            background-color: #ffffff;
            margin-left: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            text-align: left;
        }

        table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        table th, table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .edit, .delete2 {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit {
            background-color: #4CAF50;
            color: white;
        }

        .edit a {
            color: white;
            text-decoration: none;
        }

        .delete2 {
            background-color: #f44336;
            color: white;
        }

        .delete2 a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="side">
            <?php include("base.php"); ?>
        </div>
        
        <div class="tabo">
            <h1>Single Room Booking </h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>NUMBER PAID</th>
                        <th>GENDER</th>
                        <th>ACTION</th>
                        <th>DELETE</th>
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
                            $gender = $row["Gender"];
                            $balance = (50 - $row["AmountPaid"]);

                            echo '<tr>
                                <td>' . $row["No"] . '</td>
                                <td>' . $row["First Name"] . ' ' . $row["Last Name"] . '</td>
                                <td>' . $row["NumberPaid"] . '</td>
                                <td>' . $row["Gender"] . '</td>
                                <td class="action"><button class="edit"><a href="tenantss.php?tenantid=' . $row["No"] . '">Make Account</a></button></td>
                                <td class="delete"><button class="delete2"><a href="deletebooking.php?tenantid=' . $row["No"] . '">Delete</a></button></td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

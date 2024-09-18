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
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table thead {
            background-color: #009879;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        .action {
            display: flex;
            justify-content: space-between;
        }

        .action button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .action button:hover {
            background-color: #0056b3;
        }

        .delete button {
            background-color: #dc3545;
        }

        .delete button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div  class="side">
            <?php include ('base.php'); ?>

        </div>
        <div style="width: 100%" class="tabo">
        <h1>WEBSITE CONTACT US</h1>


            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ("connection.php");

                    // Query to retrieve data from the database
                    $query = "SELECT * FROM contact";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["ID"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Message"] . "</td>";
                            echo "<td class='action'>
                                <button class='reply'><a href='mailto:" . $row["Email"] . "' style='color: white; text-decoration: none;'>REPLY</a></button>
                                <span class='delete'><button><a href='delete.php?deleteid=" . $row["ID"] . "' style='color: white; text-decoration: none;'>DELETE</a></button></span>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found in the database.</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
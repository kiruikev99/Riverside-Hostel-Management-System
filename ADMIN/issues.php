<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
        }

        .side {
            /* Your existing styles for the side column */
        }

        .tabo {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            margin-left: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
        }

        table th,
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
            text-align: center;
        }

        table thead {
            background-color: #009879;
            color: #ffffff;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .delete button {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete button:hover {
            background-color: darkred;
        }

        .plumbing {
            text-align: center;
            padding-top: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="side">
            <!-- Include your side content, such as navigation or other elements -->
            <?php include("base.php"); ?>
        </div>

        <div class="tabo">
            <h1>TENTANT ISSUES INQUIRIES</h1>
            <div class="plumbing">PLUMBING SECTION</div>
            <table>
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>RoomNo</th>
                        <th>Issue</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the plumbingdb table
                    $query = "SELECT * FROM plumbingdb";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["FirstName"] . "</td>";
                            echo "<td>" . $row["RoomNo"] . "</td>";
                            echo "<td>" . $row["Issue"] . "</td>";
                            echo "<td>" . $row["Date"] . "</td>";
                            echo '<td class="delete"><button><a href="plumbdelete.php?issuedelete=' . $row["RoomNo"] . '">Delete</a></button></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="5">No records found in the database.</td></tr>';
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>

            <div class="plumbing">ELECTRICITY SECTION</div>
            <table>
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>RoomNo</th>
                        <th>Issue</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the electricdb table
                    $query = "SELECT * FROM electricdb";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["FirstName"] . "</td>";
                            echo "<td>" . $row["RoomNo"] . "</td>";
                            echo "<td>" . $row["Issue"] . "</td>";
                            echo "<td>" . $row["Date"] . "</td>";
                            echo '<td class="delete"><button><a href="electricdelete.php?issuedelete=' . $row["RoomNo"] . '">Delete</a></button></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="5">No records found in the database.</td></tr>';
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>

            <div class="plumbing">PAINT SECTION</div>
            <table>
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>RoomNo</th>
                        <th>Issue</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the walldb table
                    $query = "SELECT * FROM walldb";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["FirstName"] . "</td>";
                            echo "<td>" . $row["RoomNo"] . "</td>";
                            echo "<td>" . $row["Issue"] . "</td>";
                            echo "<td>" . $row["Date"] . "</td>";
                            echo '<td class="delete"><button><a href="paintdelete.php?issuedelete=' . $row["RoomNo"] . '">Delete</a></button></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="5">No records found in the database.</td></tr>';
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

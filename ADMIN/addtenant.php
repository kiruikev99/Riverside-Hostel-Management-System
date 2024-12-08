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
            margin: 25px 0;
            font-size: 16px;
        }

        table th, table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        table thead {
            background-color: #009879;
            color: #ffffff;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .drop-in-button {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .drop-in-button:hover {
            background-color: black;
        }

        .drop-in-content {
            display: none;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            margin-top: 5px;
            border-radius: 6px;
        }

        .expanded {
            display: block;
        }
        .tabo > p {
            opacity: 0.5;
        }
        .tabo > h1 {
            font-family: Tahoma;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="side">
            <!-- Include your side content, such as navigation or other elements -->
            <?php include("base.php"); 
              $month = date('F');?>
        </div>

        <div class="tabo">
            <h1>CURRENT TENANTS</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At aperiam aliquid ducimus corporis debitis voluptates aliquam minima eum. Vero perferendis ipsam odit odio at ex eligendi minus ea doloremque laborum?</p>
            <input type="text" id="searchInput" placeholder="Search for tenant names.." onkeyup="searchTable()" style="margin-bottom: 20px; padding: 10px; width: 100%; font-size: 16px; border: 1px solid #ddd; border-radius: 4px;">

            <table id="tenantTable">
                <thead>
                    BLOCK A
                    <tr>
                        <th>ROOM-NO</th>
                        <th>TENANT</th>
                        <th>GENDER</th>
                        <th>PHONE NUMBER</th>
                        <th>CHECK-IN</th>
                        <th> <?php echo $month?> BALANCE</th>
                      
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the database
                    $query = "SELECT * FROM tenantaccountblocka";
                    $result = mysqli_query($conn, $query);
                  

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $row["RoomNo"] . '</td>
                                    <td>' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>
                                    <td>' . $row["Gender"] . '</td>
                                    <td>' . $row["PhoneNumber"] . '</td>
                                    <td>' . $row["Checkin"] . '</td>
                                    <td>' . $row["MonthBalance"] . '</td>
                                    <td>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="viewtenantblocka.php?roomno=' . $row["RoomNo"] . '"> View More </a></button> <br>
                                          <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="roomavailableblocka.php?roomno=' . $row["RoomNo"] . '"> Make Room Available </a></button>
                                    </td>
                                    
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>



            <table id="tenantTable">
                <thead>
                    BLOCK B
                    <tr>
                        <th>ROOM-NO</th>
                        <th>TENANT</th>
                        <th>GENDER</th>
                        <th>PHONE NUMBER</th>
                        <th>CHECK-IN</th>
                        <th> <?php echo $month?> BALANCE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the database
                    $query = "SELECT * FROM tenantaccountblockb";
                    $result = mysqli_query($conn, $query);
                  

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $row["RoomNo"] . '</td>
                                    <td>' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>
                                    <td>' . $row["Gender"] . '</td>
                                    <td>' . $row["PhoneNumber"] . '</td>
                                    <td>' . $row["Checkin"] . '</td>
                                    <td>' . $row["MonthBalance"] . '</td>
                                    <td>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="viewtenantblockb.php?roomno=' . $row["RoomNo"] . '"> View More </a></button>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="roomavailableblockb.php?roomno=' . $row["RoomNo"] . '"> Make Room Available </a></button>

                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>


            <table id="tenantTable">
                <thead>
                    BLOCK C
                    <tr>
                        <th>ROOM-NO</th>
                        <th>TENANT</th>
                        <th>GENDER</th>
                        <th>PHONE NUMBER</th>
                        <th>CHECK-IN</th>
                        <th> <?php echo $month?> BALANCE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the database
                    $query = "SELECT * FROM tenantaccountblockc";
                    $result = mysqli_query($conn, $query);
                  

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $row["RoomNo"] . '</td>
                                    <td>' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>
                                    <td>' . $row["Gender"] . '</td>
                                    <td>' . $row["PhoneNumber"] . '</td>
                                    <td>' . $row["Checkin"] . '</td>
                                    <td>' . $row["MonthBalance"] . '</td>
                                    <td>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="viewtenantblockc.php?roomno=' . $row["RoomNo"] . '"> View More </a></button>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="roomavailableblockc.php?roomno=' . $row["RoomNo"] . '"> Make Room Available </a></button>

                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>


            <table id="tenantTable">
                <thead>
                    BLOCK D
                    <tr>
                        <th>ROOM-NO</th>
                        <th>TENANT</th>
                        <th>GENDER</th>
                        <th>PHONE NUMBER</th>
                        <th>CHECK-IN</th>
                        <th> <?php echo $month?> BALANCE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    // Query to retrieve data from the database
                    $query = "SELECT * FROM tenantaccountblockd";
                    $result = mysqli_query($conn, $query);
                  

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the database results
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $row["RoomNo"] . '</td>
                                    <td>' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>
                                    <td>' . $row["Gender"] . '</td>
                                    <td>' . $row["PhoneNumber"] . '</td>
                                    <td>' . $row["Checkin"] . '</td>
                                    <td>' . $row["MonthBalance"] . '</td>
                                    <td>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="viewtenantblockd.php?roomno=' . $row["RoomNo"] . '"> View More </a></button>
                                        <button class="drop-in-button"><a style="color: white; text-decoration: none;" href="roomavailableblockd.php?roomno=' . $row["RoomNo"] . '"> Make Room Available </a></button>

                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('tenantTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[1];
                if (td) {
                    const textValue = td.textContent || td.innerText;
                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }

        // JavaScript to handle drop-in content toggle
        document.querySelectorAll('.drop-in-button').forEach(button => {
            button.addEventListener('click', function () {
                const content = this.nextElementSibling;
                content.classList.toggle('expanded');
            });
        });
    </script>
</body>

</html>

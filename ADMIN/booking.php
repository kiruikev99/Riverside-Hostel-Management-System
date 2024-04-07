<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>


<?php include("base.php")?>
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
                    $balance = (50 - $row["AmountPaid"] );
                    
                    echo '<tr>;
                     <td> '.$row["No"].' </td>
                     <td> '.$row["First Name"]. '  ' .$row["Last Name"].'</td>

                     <td> '.$row["NumberPaid"].' </td>
                     <td> '.$row["Gender"].' </td>;
                     <td class="action"> <button class="edit"><a href="tenantss.php? tenantid='.$row["No"].'">Make Account</a></button>  </td>
                     <td class="delete"> <button class="delete2"><a href="deletebooking.php? tenantid='.$row["No"].'">Delete</a></button>  </td>';
                    
                }
            }
            ?>
        </table>
        </div>
    
</body>
</html>
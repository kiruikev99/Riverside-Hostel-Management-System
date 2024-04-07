<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<?php include('base.php'); ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
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
                    echo "<td>" .$row["ID"]. "</td>";
                    echo "<td>" .$row["Name"]. "</td>";
                    echo "<td>" .$row["Email"]. "</td>";
                    echo "<td>" .$row["Message"]. "</td>";
                    echo "<td class='action' ><button class='reply'><a href = mailto:".$row["Email"].">REPLY</a></button>
                    <span class='delete'> <button class='delete'><a href ='delete.php? deleteid=".$row["ID"]."'>DELETE</a></button></td></span>";
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
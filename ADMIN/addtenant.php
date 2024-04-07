<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php include('base.php'); ?>
<table>
    <thead>
        <tr>
            <th>ROOM-NO</th>
            <th>TENANT</th>
            <th>GENDER</th>
            <th>PHONE NUMBER</th>
            <th>CHECK-IN </th>
            <th>MONTH BALANCE</th>
            <th>ACTION</th>
            
        </tr>
    </thead>
    <tbody>
    <style>
    /* CSS for drop-in content */
    .drop-in-content {
        display: none;
        transition: max-height 0.5s ease-out;
        overflow: hidden;
    }

    /* Button style */
    .drop-in-button {
        cursor: pointer;
    }

    /* Expanded drop-in content */
    .expanded {
        max-height: 1000px; /* Adjust as needed */
    }
</style>
        <?php
            include("connection.php");


            // Query to retrieve data from the database
           
            $query = "SELECT * FROM tenantaccount";
            $result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through the database results
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$row["RoomNo"].'</td>
                <td>'.$row["FirstName"].' '.$row["LastName"].'</td>
                <td>'.$row["Gender"].'</td>
                <td>'.$row["PhoneNumber"].'</td>
                <td>'.$row["Checkin"].'</td>
                <td>'.$row["MonthBalance"].'</td>
                
                <td>
                    <button class="drop-in-button"><a href="viewtenant.php? roomno='.$row["RoomNo"].'">View More</button>
                    </div>
                </td>
            </tr>';
    }      
}
?>
<script>
    // JavaScript to handle drop-in effect
    document.querySelectorAll('.drop-in-button').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            content.classList.toggle('expanded');
            if (content.classList.contains('expanded')) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    });
</script>

            ?>
        </table>
        </div>
    
</body>
</html>
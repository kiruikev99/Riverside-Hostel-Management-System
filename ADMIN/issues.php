<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
    <?php include('base.php'); ?>

<div style="text-align: center; padding-top: 10px;" class="plumbing">
    <H2>PLUMBING SECTION</H2>
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
                    echo "<td class='delete'> <button> Delete</button> </td>";

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
                    
                    echo '<tr>;
                   
                    "<td> '.$row["FirstName"].' </td>
                    <td> '.$row["RoomNo"].' </td>
                    <td> '.$row["Issue"].' </td>
                    <td> '.$row["Date"].' </td>
                    <td class="delete"> <button><a href="electricdelete.php? issuedelete='.$row["RoomNo"].'">Delete</a></button> </td>

                    </tr>';
                  
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
                  echo "<td>" . $row["FirstName"] . "</td>";
                  echo "<td>" . $row["RoomNo"] . "</td>";
                  echo "<td>" . $row["Issue"] . "</td>";
                  echo "<td>" . $row["Date"] . "</td>";
                  echo "<td class='delete'> <button type='button' onclick=\"window.location.href='https://www.upwork.com/freelancers'\">Delete</button> </td>";
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
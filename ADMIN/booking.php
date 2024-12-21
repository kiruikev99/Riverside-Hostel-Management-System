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
        .side {
            /* Sidebar styling can go here */
        }
        .content1 {
            padding: 20px;
            background-color: #ffffff;
            margin-left: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: calc(100% - 40px);
        }
        h1 {
            color: #333;
        }
        .description {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .section-title {
            text-align: left;
            font-size: 1.5em;
            font-weight: bold;
            color: #009879;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            margin-bottom: 20px;
        }
        table thead {
            background-color: #009879;
            color: #ffffff;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #dddddd;
            text-align: center;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .action-button {
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .action-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="side">
           <?php include("base.php"); ?>
        </div>
        
        <div class="content1">
           <h1>Single Room Bookings</h1>
           <div class="description">
               <p>This dashboard provides an overview of room bookings across different blocks. You can view tenant details and take necessary actions for each booking.</p>
           </div>
           <?php include("connection.php"); ?>

           <!-- Block A Booking Table -->
           <div class="section-title">BLOCK A</div>
           <table>
               <thead>
                   <tr>
                       <th>Room No</th>
                       <th>Tenant Name</th>
                       <th>Gender</th>
                       <th>Student Phone Number</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $query = "SELECT * FROM `blockabooking` WHERE RoomNo IN ('A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10') AND Status = 'Booked';";
                   $result = mysqli_query($conn, $query);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr>
                                   <td>{$row['RoomNo']}</td>
                                   <td>{$row['Name']}</td>
                                   <td>{$row['Gender']}</td>
                                   <td>{$row['StudentPhoneNumber']}</td>
                                   <td><a class='action-button' href='blocksbookings/blockabooking.php?tenantid={$row['RoomNo']}'>Make Account</a></td>
                               </tr>";
                       }
                   } else {
                       echo '<tr><td colspan="5">No records found.</td></tr>';
                   }
                   ?>
               </tbody>
           </table>

           <!-- Block B Booking Table -->
           <div class="section-title">BLOCK B</div>
           <table>
               <thead>
                   <tr>
                       <th>Room No</th>
                       <th>Tenant Name</th>
                       <th>Gender</th>
                       <th>Student Phone Number</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $query = "SELECT * FROM `blockabooking` WHERE RoomNo IN ('B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B9', 'B10') AND Status = 'Booked';";
                   $result = mysqli_query($conn, $query);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr>
                                   <td>{$row['RoomNo']}</td>
                                   <td>{$row['Name']}</td>
                                   <td>{$row['Gender']}</td>
                                   <td>{$row['StudentPhoneNumber']}</td>
                                   <td><a class='action-button' href='blocksbookings/blockbbooking.php?tenantid={$row['RoomNo']}'>Make Account</a></td>
                               </tr>";
                       }
                   } else {
                       echo '<tr><td colspan="5">No records found.</td></tr>';
                   }
                   ?>
               </tbody>
           </table>

           <!-- Block C Booking Table -->
           <div class="section-title">BLOCK C</div>
           <table>
               <thead>
                   <tr>
                       <th>Room No</th>
                       <th>Tenant Name</th>
                       <th>Gender</th>
                       <th>Student Phone Number</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $query = "SELECT * FROM `blockabooking` WHERE RoomNo IN ('C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10') AND Status = 'Booked';";
                   $result = mysqli_query($conn, $query);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr>
                                   <td>{$row['RoomNo']}</td>
                                   <td>{$row['Name']}</td>
                                   <td>{$row['Gender']}</td>
                                   <td>{$row['StudentPhoneNumber']}</td>
                                   <td><a class='action-button' href='blocksbookings/blockcbooking.php?tenantid={$row['RoomNo']}'>Make Account</a></td>
                               </tr>";
                       }
                   } else {
                       echo '<tr><td colspan="5">No records found.</td></tr>';
                   }
                   ?>
               </tbody>
           </table>

           <!-- Block D Booking Table -->
           <div class="section-title">BLOCK D</div>
           <table>
               <thead>
                   <tr>
                       <th>Room No</th>
                       <th>Tenant Name</th>
                       <th>Gender</th>
                       <th>Student Phone Number</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>

                   <?php
                   $query = "SELECT * FROM `blockabooking` WHERE RoomNo IN ('D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10') AND Status = 'Booked';";
                   $result = mysqli_query($conn, $query);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr><td>{$row['RoomNo']}</td><td>{$row['Name']}</td><td>{$row['Gender']}</td><td>{$row['StudentPhoneNumber']}</td><td><a class='action-button' href='blocksbookings/blockdbooking.php?tenantid={$row['RoomNo']}'>Make Account</a></td></tr>";
                       }
                   } else {
                       echo '<tr><td colspan="5">No records found.</td></tr>';
                   }
                   ?>
               </tbody>

           </table>

       </div> 
    </div> 
</body>

</html>
                   
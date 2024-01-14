<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body{
        background-color:  rgb(143, 179, 197);
    }
    header{
        background-color: rgb(0, 89, 113);
        padding: 30px;
        colour:white
    }
    .header{
        display: flex;
        justify-content: space-around;
        font-size: 30px;
    }
    button{
        padding: 10px;
        font-size: large;
    }
    .tenantadd, .adminadd, .issue, .Inquiries, .allTenant,.tenantadd, .freeroom {
        padding-top: 40px;
        color: white;
       
    }
    .navsection{
        float: left;
        padding: 10px;
        justify-content: space-around;
        padding-left: 30px;
        background-color:rgb(0, 89, 113);
        
    }
    .navsection a{
        color: white;
        text-decoration: none;
    }
    .tenantadd:hover {
        border-bottom: 4px solid red;
    }
    .adminadd:hover {
        border-bottom: 4px solid red;
    }
    .issue:hover {
        border-bottom: 4px solid red;
    }
    .Inquiries:hover {
        border-bottom: 4px solid red;
    }
    .allTenant:hover {
        border-bottom: 4px solid red;
    }
    .freeroom:hover {
        border-bottom: 4px solid red;
    }
    #current{
        border-bottom: 4px solid red;
    }
    .main{
        text-align: center;
    }
    .title{
        padding-top: 60px;
    }
    table{
        background-color: white;
        padding: 20px;
        
    }
    .add-btn{
        padding-top: 20px;
    }
    table td, th{
        padding-left: 32px;
    }
    table th{
        border-bottom: 2px solid black;
        border-top: 2px solid black;
    }
    table td{
        padding-top: 20px;
        border-right: 2px solid blue;
        
    }

    
    
    </style>
<body>
    <header>
        <div class="header">
        <div class="name">
            Welcome Kevin
        </div>
        <div class="logout">
            <button><a href="adminportal.php">LOGOUT</a></button>
        </div>
        </div>
    </header>
    <nav>
    <div class="mainsection">
        <div class="navsection">
            <div id="current" style="display: flex;" class="tenantadd">
                <img width="50" src="images/sleeping.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Add Tenant</h4></a>
            </div>

            <div style="display: flex;" class="adminadd">
                <img width="50" src="images/user.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Add Admin</h4></a>
            </div>

            <div style="display: flex;" class="issue">
                <img width="50" src="images/repairing-service.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Tenant Issue</h4></a>
            </div>

            <div style="display: flex;" class="Inquiries">
                <img width="50" src="images/contract.png" alt=""><a href="inquiries.php"><h4 style="padding-left: 10px;">Inquiries</h4></a>
            </div>

            <div style="display: flex;" class="allTenant">
                <img width="50" src="images/tenants.png" alt=""><a href="booking.php"><h4 style="padding-left: 10px;">Bookings</h4></a>
            </div>

            <div style="display: flex;" class="freeroom">
                <img width="50" src="images/bed.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Free Rooms</h4></a>
            </div>

            
        </div>
    </div>
    </nav>
    <section>
    <div class="main">
        <div class="add-btn">
            <button><a href="registertenant.php">Add Student</a></button>
        </div>
    <div class="title">
        <h3>LOGIN CREDENTIALS TENANTS</h3>
    </div>
    <div class="table">

    <table>
    
        <tr>
            <th>Room No</th>
            <th> Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fee Paid</th>
            <th>Out of</th>
            <th>Balance</th>
            <th>University<th>
            <th>Course</th>
        </tr>

        <?php
        include("connection.php");

        $query = "SELECT * FROM tenantregister";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Loop through the database results
            while ($row = mysqli_fetch_assoc($result)) {
                $balance = $row["TotalAmount"] - $row["AmountPaid"];
                echo "<tr>";
                    echo "<td>" .$row["RoomNo"]. "</td>";
                    echo "<td>" .$row["Name"]. "</td>";
                    echo "<td>" .$row["Username"]. "</td>";
                    echo "<td>" .$row["Password"]. "</td>";
                    echo "<td>" .$row["AmountPaid"]. "</td>";
                    echo "<td>" .$row["TotalAmount"]. "</td>";
                    echo "<td>" .$balance. "</td>";
                    echo "<td>" .$row["University"]. "</td>";
                    echo "<td>" .$row["Course"]. "</td>";
                    echo "<td>" .$row["CheckIn"]. "</td>";

                    echo "</tr>";
            }
        }

        ?>
    </div>
    </table>
</body>
</html>
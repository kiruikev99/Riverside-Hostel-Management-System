<?php

include("connection.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}


$user = $_SESSION['username'];

$query = "SELECT * FROM tenantaccount WHERE Username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Display the credentials of the logged-in tenant
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $name = $row['FirstName'];
    $lastName = $row['LastName'];
    $roomNo = $row['RoomNo'];
    $Username = $row['Username'];
    $Password = $row['Password'];
    $balance = $row['Balance'];
    $totalAmount = $row['AmountPaid'];
    $university = $row['University'];

    $checkin = $row['Checkin'];


    // Add other fields as needed
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);




?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECARE</title>

    <style>
        .main {
            display: grid;
            grid-template-columns: 25% 1fr;

        }
       
        ul{
            list-style-type: none;
            
            
        }
        li{
            padding-top: 30px;
            font-size: x-large;
            
            
        }
        .sidebar{
            background-image: linear-gradient(green, blue);
            width: 300px;
            
        }
        a{
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: black;
        }
        .current{
            border-bottom: 2px solid blue;
        }
        table{
            padding-left: 100px;
            font-size: x-large;
        }
        
        
        </style>


</head>
<body>
<div class="main">
    <div class="sidebar">
        <img width="210" src="images/ecare-logo.png" alt="">
        <ul>
            <li><a href="tenantbase.php">Home</a></li>
            <li><a  href="fiancebase.php">Finance</a></li>
            <li><a href="transactionpdf.php">Transaction PDF</a></li>
            <li><a class="current" href="maintainance.php">Maintainance</a></li>
            <li><a href="tenantbase.php">Notices</a></li>

        </ul>
    </div>

    <!-- <div style="text-align: center" class="dd">
        <h1> <span id='Date'><?php echo date("H:i:s Y--d "); ?></span></h1>
        <script>
        function updateDateTime() {
            var datetimeElement = document.getElementById('Date');
            var currentTime = new Date();
            var formattedDateTime =  
                ' ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds() + '<br> ' + ' ' + ' ' +  currentTime.getFullYear() + '-' + (currentTime.getMonth() + 1) + '-' + currentTime.getDate();

            datetimeElement.innerHTML = formattedDateTime;
        }

        // Update every second (1000 milliseconds)
        setInterval(updateDateTime, 1000);

        // Initial update
        updateDateTime();
        </script>
    </div> -->

    <div style="padding-top: 60px;"  class="MAIN">
        <h2>Having Room Issues,</h2>
        <div style="display: flex; gap: 100px" class="servives">
            <div style="background-color: orangered; padding: 40px" class="PLUMBER">
                <img width="200" src="images/plumber.png" alt="">
                <h4>Is it Plumbing Related?</h4>
                <button>Inquire</button>
                <div class="electichide">
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>
                    <form>
                    <label  style="  display: block;
                                                    margin-bottom: 8px;
                                                    color: #333;" for="message"><b>Explain Issue:</b></label>
                                                <textarea style=" width: 100%;
                                                    padding: 10px;
                                                    margin-bottom: 16px;
                                                    box-sizing: border-box;
                                                    border: 1px solid #ccc;
                                                    border-radius: 4px;" id="message" name="message" required></textarea>
                    <button value="Submit">Submit</button>
                    </form>
                </div>
            </div>
            <div style="background-color: yellow; padding: 40px" class="ELECTRICIAN">
                <img width="200" src="images/electian.png" alt="">
                <h2>Is it Electricity Related?</h2>
                <button>Inquire</button>
                <div class="electichide">
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>
                    <form>
                    <label  style="  display: block;
                                                    margin-bottom: 8px;
                                                    color: #333;" for="message"><b>Explain Issue:</b></label>
                                                <textarea style=" width: 100%;
                                                    padding: 10px;
                                                    margin-bottom: 16px;
                                                    box-sizing: border-box;
                                                    border: 1px solid #ccc;
                                                    border-radius: 4px;" id="message" name="message" required></textarea>
                    <button value="Submit">Submit</button>
                    </form>
                </div>
            </div>
            <div style="background-color: green; padding: 40px" class="PAINTER">
                <img width="200" src="images/painter.png" alt="">
                <h4>Is it Wall Painting Related?</h4>
                <button>Inquire</button>
                <div class="electichide">
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>
                    <form>
                    <label  style="  display: block;
                                                    margin-bottom: 8px;
                                                    color: #333;" for="message"><b>Explain Issue:</b></label>
                                                <textarea style=" width: 100%;
                                                    padding: 10px;
                                                    margin-bottom: 16px;
                                                    box-sizing: border-box;
                                                    border: 1px solid #ccc;
                                                    border-radius: 4px;" id="message" name="message" required></textarea>
                    <button value="Submit">Submit</button>
                    </form>
                </div>
            </div>

    </div>
    </div>

    

</body>
</html>
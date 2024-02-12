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
    $university = $row['University'];

    $checkin = $row['Checkin'];

    $_SESSION['RRRR'] = $row['RoomNo'];


    // Add other fields as needed
} else {
    echo "Error fetching tenant information.";
}

mysqli_stmt_close($stmt);




?> 
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .plumberhide{
            display: none;
        }
        .electichide{
            display: none;
        }
        .wallhide{
            display: none;
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
                <img width="100" src="images/plumber.png" alt="">
                <h3>Is it Plumbing Related?</h4>
                <button onclick="plumberdisplay()">Inquire</button>
                <div id="plumberhide" class="plumberhide">
                <i class="fa-solid fa-xmark"></i>
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>



                    <form method="post" action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/plumbingdb.php">
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
                    <br>
                    <button onclick="plumbercancel()">CANCEL</button>
                </div>
            </div>

            
            <div style="background-color: yellow; padding: 40px" class="ELECTRICIAN">
                <img width="100" src="images/electian.png" alt="">
                <h3>Is it Electricity Related?</h2>
                <button onclick='electicdisplay()'>Inquire</button>
                <div id="electichide" class="electichide">
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>




                    <form method="post" action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/electricdb.php">
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
                    <br>
                    <button onclick='electriccancel()'>CANCEL</button>
                </div>

               
            </div>
            <div style="background-color: green; padding: 40px" class="PAINTER">
                <img width="100" src="images/painter.png" alt="">
                <h3>Is it Wall Painting Related?</h4>
                <button onclick="walldisplay()">Inquire</button>
                <div id="wallhide" class="wallhide">
                    
                    <h4 style="text-align: center;">RoomNo: <?php echo $roomNo; ?></h4>



                    <form method="post" action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/walldb.php">
                    <label  style="  display: block;
                                                    margin-bottom: 8px;
                                                    color: #333;" for="message"><b>Explain Issue:</b></label>
                                                <textarea style=" width: 100%;
                                                    padding: 10px;
                                                    margin-bottom: 16px;
                                                    box-sizing: border-box;
                                                    border: 1px solid #ccc;
                                                    border-radius: 4px;" id="message" name="message" required></textarea>
                    <button  value="Submit">Submit</button>
                    </form>
                    <button onclick='wallcancel()'>CANCEL</button>
                </div>
            </div>

    </div>
    </div>
        <script>

            function plumberdisplay() {

                var plumber = document.getElementById('plumberhide');
                plumber.style.display = 'block';
            }
            function plumbercancel(){
                var cancel = document.getElementById('plumberhide');
                cancel.style.display = 'none';
            }

            function electicdisplay(){
                var electric = document.getElementById('electichide');
                electric.style.display = 'block';
            }

            function electriccancel(){
                var cancel = document.getElementById('electichide');
                cancel.style.display = 'none';
            }

            function walldisplay(){

                var wall = document.getElementById('wallhide');
                wall.style.display = 'block';
            }
            function wallcancel(){
                var cancel = document.getElementById('wallhide');
                cancel.style.display = 'none';
            }
            </script>
    

</body>
</html>
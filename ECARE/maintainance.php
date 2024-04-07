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
        @import url('https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap');

        h3{
            font-family: "Darker Grotesque", sans-serif;
  font-optical-sizing: auto;
  font-weight: 300;
  font-style: normal;
  font-size: 30px;
        }
        .plumberhide {
            display: none;
        }

        .electichide {
            display: none;
        }

        .wallhide {
            display: none;
        }

        .MAIN {
            text-align: center;
        }
        .main{
            background-image: url("images/bg3.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        }
       
    </style>


</head>

<body>

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
    <div class="main">
        <?php include('base.php'); ?>

        <div style="padding-top: 60px;" class="MAIN">
            <h2>Having Room Issues,</h2>
            <div style="display: flex; padding-bottom: 150px; gap: 100px" class="servives">




                <div style="background-color: orangered; padding: 40px" class="PLUMBER">
                    <img width="100" src="images/plumber.png" alt="">
                    <h3>Is it Plumbing Related?</h4>
                        <button style="background-color: white; color: black; border-radius: 10px; border: none; padding: 5px; width: 100px" onclick="plumberdisplay()"><b>Inquire</b></button>
                        <div id="plumberhide" class="plumberhide">
                            <i class="fa-solid fa-xmark"></i>
                            <h4 style="text-align: center;">RoomNo:
                                <?php echo $roomNo; ?>
                            </h4>



                            <form method="post"
                                action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/plumbingdb.php">
                                <label style="  display: block;
                                                        margin-bottom: 8px;
                                                        color: #333;" for="message"><b>Explain Issue:</b></label>
                                <textarea style=" width: 100%;
                                                        padding: 10px;
                                                        margin-bottom: 16px;
                                                        box-sizing: border-box;
                                                        border: 1px solid #ccc;
                                                        border-radius: 4px;" id="message" name="message"
                                    required></textarea>
                                <button style="background-color: skyblue; color: white; border: none; padding: 10px; border-radius: 10px; width: 90px;" value="Submit">Submit</button>
                            </form>
                            <br>
                            <button style="background-color: red; color: white; border-radius: 10px; border: 2px solid white; padding: 5px; width: 100px;"  onclick="plumbercancel()">CANCEL</button>
                        </div>
                </div>


                <div style="background-color: yellow; padding: 40px" class="ELECTRICIAN">
                    <img width="100" src="images/electian.png" alt="">
                    <h3>Is it Electricity Related?</h2>
                        <button style="background-color: white; color: black; border-radius: 10px; border: none; padding: 5px; width: 100px"  onclick='electicdisplay()'><b>Inquire</b></button>
                        <div id="electichide" class="electichide">
                            <h4 style="text-align: center;">RoomNo:
                                <?php echo $roomNo; ?>
                            </h4>




                            <form method="post"
                                action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/electricdb.php">
                                <label style="  display: block;
                                                        margin-bottom: 8px;
                                                        color: #333;" for="message"><b>Explain Issue:</b></label>
                                <textarea style=" width: 100%;
                                                        padding: 10px;
                                                        margin-bottom: 16px;
                                                        box-sizing: border-box;
                                                        border: 1px solid #ccc;
                                                        border-radius: 4px;" id="message" name="message"
                                    required></textarea>
                                <button style="background-color: skyblue; color: white; border: none; padding: 10px; border-radius: 10px; width: 90px;" value="Submit">Submit</button>
                            </form>
                            <br>
                            <button style="background-color: red; color: white; border-radius: 10px; border: none; padding: 5px; width: 100px;"  onclick='electriccancel()'>CANCEL</button>
                        </div>


                </div>
                <div style="background-color: green; padding: 40px" class="PAINTER">
                    <img width="100" src="images/painter.png" alt="">
                    <h3>Is it Wall Painting Related?</h4>
                        <button style="background-color: white; color: black; border-radius: 10px; border: none; padding: 5px; width: 100px"  onclick="walldisplay()"><b>Inquire</b></button>
                        <div id="wallhide" class="wallhide">

                            <h4 style="text-align: center;">RoomNo:
                                <?php echo $roomNo; ?>
                            </h4>



                            <form method="post" action="/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/MaintainanceDB/walldb.php">
                                <label style="  display: block;
                                                        margin-bottom: 8px;
                                                        color: #333;" for="message"><b>Explain Issue:</b></label>
                                <textarea style=" width: 100%;
                                                        padding: 10px;
                                                        margin-bottom: 16px;
                                                        box-sizing: border-box;
                                                        border: 1px solid #ccc;
                                                        border-radius: 4px;" id="message" name="message"
                                    required></textarea>
                                <button style="background-color: skyblue; color: white; border: none; padding: 10px; border-radius: 10px; width: 90px;" value="Submit">Submit</button>
                            </form>
                            <br>
                            <button style="background-color: red; color: white; border-radius: 10px; border: none; padding: 5px; width: 100px;" onclick='wallcancel()'>CANCEL</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
    <script>

        function plumberdisplay() {

            var plumber = document.getElementById('plumberhide');
            plumber.style.display = 'block';
        }
        function plumbercancel() {
            var cancel = document.getElementById('plumberhide');
            cancel.style.display = 'none';
        }

        function electicdisplay() {
            var electric = document.getElementById('electichide');
            electric.style.display = 'block';
        }

        function electriccancel() {
            var cancel = document.getElementById('electichide');
            cancel.style.display = 'none';
        }

        function walldisplay() {

            var wall = document.getElementById('wallhide');
            wall.style.display = 'block';
        }
        function wallcancel() {
            var cancel = document.getElementById('wallhide');
            cancel.style.display = 'none';
        }
    </script>


</body>

</html>
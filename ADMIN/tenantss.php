<?php
include 'connection.php';
session_start();

if (isset($_GET['tenantid'])) {
    $no = $_GET['tenantid'];
    $no = $_GET['tenantid'];

    $_SESSION["no"] = $_GET['tenantid'];






    $sql = "SELECT * FROM riversidebookings WHERE No = $no";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $firstName = $row["First Name"];
            $lastName = $row["Last Name"];
            $gender = $row["Gender"];
            $paid = $row["AmountPaid"];
            $balance = (50 - $row["AmountPaid"]);
            // Add more lines for other columns as needed


            $_SESSION["fname"] = $firstName;
            $_SESSION["lname"] = $lastName;
            $_SESSION["paid"] = $paid;
            $_SESSION["balance"] = $balance;
            $_SESSION["gender"] = $gender;




        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Registration</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .formregister {
            background-color: #fff;

            padding: 30px;
            width: 300px;
            text-align: center;

        }

        .registration-form {
            background-color: #fff;

            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {

            .section {
                flex-direction: column;
                height: 100%;
            }

        }
    </style>
</head>

<body>
    <header style=" justify-content: center; text-align: center;">
        <div class="image">
            <img src="images/riverside-logo.png" width="200" alt="Logo">
        </div>

    </header>
    <div style="display: flex; padding-left: 100px; " class="section">
        <div class="registration-form">
            <h2 style="">
                <?php echo $firstName; ?>'s Information
            </h2>

            <label for="firstName">First Name</label>
            <h3>
                <?php echo $firstName; ?>
            </h3>
            <br><br>
            <label for="lastName">Last Name</label>
            <h3>
                <?php echo $lastName; ?>
            </h3>
            <br><br>
            <label for="gender">Gender</label>
            <h3>
                <?php echo $gender; ?>
            </h3>
            <br><br>
            <label for="email">
                <?php echo $firstName; ?> Room Fee
            </label>
            <h3>10,000/per Month</h3>
            <br><br>


        </div>

        <div class="formregister">

            <form action="tenantsuccess.php" method="post">
                <h2 style="">
                    <?php echo $firstName; ?>'s Contact/Medical Info
                </h2>
                <label for="firstName">Father/Guardian Full Name</label>
                <input required name="father" placeholder="Father Name" type="text">

                <label for="firstName"> Phone Number</label>
                <input required name="fatherno" placeholder="Number" type="number">

                <hr>
                <h4><b>Medical Info </h4></b>

                <label for="number">Diseases(if any)</label>
                <input name="disease" placeholder="Optional" type="text">

                <label for="lastName">Doctor</label>
                <input name="doctor" placeholder="Optional" type="text">

                <label for="blood"> Blood Group </label>
                <input name="blood" placeholder="Optional" type="text">

                <hr>
                <h4><b>Personal Info </h4></b>


                <label for="firstName">Date-of-Birth</label>
                <input required name="D-O-B" placeholder="e.g C3, C5" type="date">

                <label for="password">
                    <?php echo $firstName; ?>'s Phone Number
                </label>
                <input required name="userphone" type="number">

                <label for="password">
                    <?php echo $firstName; ?>'s Email
                </label>
                <input placeholder="Optional" name="useremail" type="email">


                <label for="university">University</label>
                <select required style="width: 100%; font-size: 18px" id="univerity" name="University">
                    <option value="Kabianga Univerity">Kabianga Univerity</option>
                    <option value="Kapkatet Univerity">Kapkatet University</option>

                </select>





                </div>


                <br>

                <div class="formregister">
                    <h2 style="">
                        <?php echo $firstName; ?>'s Room Info
                    </h2>


                    <br>
                    <label for="firstName">ROOM NO</label>
                    <input required name="room" placeholder="e.g C3, C5" type="text">

                    <label for="lastName">Username</label>
                    <input required name="Username" type="text">

                    <label for="email"> Password </label>
                    <input required name="Password" type="password">

                    <label for="password">Checkin Date</label>
                    <input required name="Date" type="date">

                    <input  type="submit" value="Register">
                    
            </form>


        </div>
    </div>

</body>

</html>
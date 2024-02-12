<?php
include 'connection.php';
session_start();

if (isset($_GET['tenantid'])) {
    $no = $_GET['tenantid'];
    $no = $_GET['tenantid'];

    $_SESSION["no"] =   $_GET['tenantid'];



   


    $sql = "SELECT * FROM riversidebookings WHERE No = $no";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $firstName = $row["First Name"];
            $lastName = $row["Last Name"];
            $paid = $row["AmountPaid"];
            $balance = (50 - $row["AmountPaid"]);
            // Add more lines for other columns as needed

            
            $_SESSION["fname"] = $firstName;
            $_SESSION["lname"] = $lastName;
            $_SESSION["paid"] = $paid;
            $_SESSION["balance"] = $balance;


           

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Registration Form</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .formregister{
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;

        }

        .registration-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <div style="display: grid; grid-template-columns: auto auto;" class="section">
        <div class="registration-form">
            <h2> <?php echo $firstName; ?>'s Information</h2>
            
                <label for="firstName">First Name</label>
                <h3><?php echo $firstName; ?></h3>
                <br><br>
                <label for="lastName">Last Name</label>
                <h3><?php echo $lastName; ?></h3>
                <br><br>
                <label for="email"><?php echo $firstName; ?> Room Fee </label>
                <h3>10,000/per Month</h3>
                <br><br>
               
            
        </div>

        <div class="formregister">

        <form action="tenantsuccess.php"  method="post" >
        <h2> <?php echo $firstName; ?>'s Credentials</h2>
                <label for="firstName">ROOM NO</label>
                <input required name="room" placeholder="e.g C3, C5" type="text">

                <label for="firstName">Date-of-Birth</label>
                <input required name="D-O-B" placeholder="e.g C3, C5" type="date">

                <label for="number">Phone Number</label>
                <input required name="phoneNumber" placeholder="07...." type="number">

                <label for="lastName">Username</label>
                <input required name="Username" type="text">

                <label for="email"> Password </label>
                <input required name="Password" type="password">

                <label for="password">University</label>
                <input required name="University" type="text">
                
                <label for="password">Checkin Date</label>
                <input required name="Date" type="date">

                <input onclick="date()" type="submit" value="Register">
            </form>

        </div>
    </div>

</body>
</html>

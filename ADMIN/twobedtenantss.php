<?php
include 'connection.php';
session_start();

if (isset($_GET['tenant'])) {
    $no = $_GET['tenant'];
    $_SESSION["no"] = $no;

    $sql = "SELECT * FROM twobedroomhostel WHERE Id = $no";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            $gender = $row["Gender"];
            $paid = $row["NumberPaid"];
            $balance = (50 - $row["NumberPaid"]);

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
            font-family: Arial, sans-serif;
            background-color: #ffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        form {
         
            padding: 50px;
            border-radius: 8px;
         

           
        }

        h1,
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 30vh;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 20px);
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #444;
        }
    </style>
</head>

<body>
<form action="twobedtenantsuccess.php" method="post">
        <div style="display: flex; width: 100vh; justify-content: center; gap: 200px;" class="flex">
            <div class="tenant">
                <div class="section tenant1-info">
                    <h1>Tenant Information</h1>
                    <label>First Name: <?php echo $_SESSION["fname"]; ?></label>
                    <label>Last Name: <?php echo $_SESSION["lname"]; ?></label>
                    <label>D-O-B</label>
                    <input name="d-o-b" type="date">
                    <label>Phone Number</label>
                    <input name="phonenum" type="number">
                    <label>Email</label>
                    <input name="email" type="text">
                    <label>University</label>
                    <input name="university" type="text">
                    <label>Check-in Date</label>
                    <input name="checkin_date" type="date">
                </div>

                <div class="section parent">
                    <h2>Guardian Information</h2>
                    <label>Father Name</label>
                    <input name="fathername" type="text">
                    <label>Father Number</label>
                    <input name="fathernumber" type="number">
                </div>

                <div class="section medical">
                    <h2>Medical Information</h2>
                    <label>Disease</label>
                    <input name="disease" type="text">
                    <label>Blood Type</label>
                    <input name="bloodtype" type="text">
                    <label>Doctor</label>
                    <input name="doctor" type="text">
                </div>


            </div>

            <div class="roomamte">
                <div class="section other-user">
                    <h2>Roommate Info</h2>
                    <label>Roommate Name</label>
                    <select>
    <option value="">Select a Roommate</option>
    <?php
    include ("dbconnect.php");

    session_start();

    $currentTenantId = $_SESSION["no"];
    $sql = "SELECT * FROM twobedroomhostel WHERE Id <> $currentTenantId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['roomatefname'] = $row["FirstName"];
            $_SESSION['roomatelname'] = $row["LastName"];
            $firstName = $_SESSION['roomatefname'];
            $lastName = $_SESSION['roomatelname'];
            echo "<option value='{$firstName} {$lastName}'>{$firstName} {$lastName}</option>";
        }
    } else {
        echo "<option value=''>No roommates found</option>";
    }

    $conn->close();
    ?>
</select>


                    <div class="section personal">
                        <h2>Roommate Information</h2>
                        <label>D-O-B</label>
                        <input name="roomated-o-b" type="date">
                        <label>Phone Number</label>
                        <input name="roomatephonenum" type="number">
                        <label>Email</label>
                        <input name="roomateemail" type="text">
                        <label>University</label>
                        <input name="roomateuniversity" type="text">
                        <label>Check-in Date</label>
                        <input name="roomatecheckin_date" type="date">
                    </div>

                    <div class="section parent">
                        <h2>Roommate Guardian Information</h2>
                        <label>Father Name</label>
                        <input name="roomatefathername" type="text">
                        <label>Father Number</label>
                        <input name="roomatefathernumber" type="number">
                    </div>

                    <div class="section medical">
                        <h2>Roommate Medical Information</h2>
                        <label>Disease</label>
                        <input name="roomatedisease" type="text">
                        <label>Blood Type</label>
                        <input name="roomatebloodtype" type="text">
                        <label>Doctor</label>
                        <input name="roomatedoctor" type="text">
                    </div>
                </div>


            </div>
            <div class="login">
            <div class="section parent">
                        <h2>LOGIN DETAILS</h2>
                        <label>Username</label>
                        <input name="username" type="text">
                        <label>Password</label>
                        <input name="password" type="number">
                    </div>
            </div>


        </div>



        <input type="submit" value="Submit">
    </form>
</body>

</html>
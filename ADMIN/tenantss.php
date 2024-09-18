<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: adminportal.php");
    exit;
}

if (isset($_GET['tenantid'])) {
    $no = $_GET['tenantid'];

    $_SESSION["no"] = $_GET['tenantid'];

    $sql = "SELECT * FROM riversidebookings WHERE No = $no";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $firstName = $row["First Name"];
            $lastName = $row["Last Name"];
            $gender = $row["Gender"];

            $_SESSION["fname"] = $firstName;
            $_SESSION["lname"] = $lastName;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-R1P5Zhs1Dh65NLVtioHJ0btST5NvJIS6TcxWTEGfP0HEQWzGt6QfaCw7Ihrw3N5ID5V1svDwPY4FgCq5K5yekg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="logo">
            <img src="images/riverside-logo.png" width="150" alt="Logo">
        </header>

        <div class="form-group">
            <h2><?php echo $firstName ?>'s Information</h2>
            <label for="firstName">First Name</label>
            <input type="text" value="<?php echo $firstName ?>" disabled>
            <label for="lastName">Last Name</label>
            <input type="text" value="<?php echo $lastName ?>" disabled>
            <label for="gender">Gender</label>
            <input type="text" value="<?php echo $gender ?>" disabled>
        </div>

        <hr>

        <form id="registrationForm" action="tenantsuccess.php" method="post">
            <div class="form-group">
                <h2><?php echo $firstName ?>'s Contact/Medical Info</h2>
                <label for="father">Father/Guardian Full Name</label>
                <input type="text" name="father" id="father" placeholder="Enter Father's Name" required>
                <label for="fatherno">Phone Number</label>
                <input type="tel" name="fatherno" id="fatherno" placeholder="Enter Phone Number" required>
            </div>

            <div class="form-group">
                <h4>Medical Info</h4>
                <label for="disease">Diseases (if any)</label>
                <input type="text" name="disease" id="disease" placeholder="Enter Diseases">
                <label for="doctor">Doctor</label>
                <input type="text" name="doctor" id="doctor" placeholder="Enter Doctor's Name">
                <label for="blood">Blood Group</label>
                <input type="text" name="blood" id="blood" placeholder="Enter Blood Group">
            </div>

            <div class="form-group">
                <h4>Personal Info</h4>
                <label for="D-O-B">Date-of-Birth</label>
                <input type="date" name="D-O-B" id="D-O-B" required>
                <label for="userphone"><?php echo $firstName ?>'s Phone Number</label>
                <input type="tel" name="userphone" id="userphone" required>
                <label for="useremail"><?php echo $firstName ?>'s Email</label>
                <input type="email" name="useremail" id="useremail" placeholder="Optional">
                <label for="university">University</label>
                <select name="University" id="university" required>
                    <option value="Kabianga University">Kabianga University</option>
                    <option value="Kapkatet University">Kapkatet University</option>
                </select>
            </div>

            <div class="form-group">
                <h2><?php echo $firstName ?>'s Room Info</h2>
                <label for="room">Room No</label>
                <input type="text" name="room" id="room" placeholder="Enter Room No" required>
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" placeholder="Enter Username" required>
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" placeholder="Enter Password" required>
                <label for="Date">Checkin Date</label>
                <input type="date" name="Date" id="Date" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to validate form inputs
        function validateForm() {
            var father = document.getElementById('father').value.trim();
            var fatherno = document.getElementById('fatherno').value.trim();
            var dob = document.getElementById('D-O-B').value.trim();
            var userphone = document.getElementById('userphone').value.trim();
            var room = document.getElementById('room').value.trim();
            var username = document.getElementById('Username').value.trim();
            var password = document.getElementById('Password').value.trim();
            var date = document.getElementById('Date').value.trim();

            // Simple validation
            if (father === '' || fatherno === '' || dob === '' || userphone === '' || room === '' || username === '' || password === '' || date === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill in all required fields!',
                });
                return false;
            }

            return true;
        }

        // Event listener for form submission
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>
</body>

</html>

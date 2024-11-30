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

    $sql = "SELECT * FROM `blockabooking` WHERE RoomNo = '$no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $firstName = $row["Name"];
            $lastName = $row["LastName"];
            $gender = $row["Gender"];
            $phone = $row["StudentPhoneNumber"];
            $roomNo = $row["RoomNo"];
            $university = $row["University"];

            $_SESSION["fname"] = $firstName;
            $_SESSION["lname"] = $lastName;
            $_SESSION["gender"] = $gender;
            $_SESSION["roomno"] = $roomNo;
            $_SESSION["university"] = $university;
            $_SESSION["phone"] = $phone;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --background-color: #f8fafc;
            --border-color: #e2e8f0;
            --text-color: #1e293b;
            --success-color: #059669;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .logo img {
            max-width: 200px;
            height: auto;
        }

        .logo h1 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        .section {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .section h2 {
            color: var(--primary-color);
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group input:disabled {
            background-color: #f1f5f9;
            cursor: not-allowed;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
        }

        .alert-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        hr {
            margin: 2rem 0;
            border: none;
            border-top: 2px solid var(--border-color);
        }

        @media (max-width: 768px) {
            .container {
                margin: 1rem;
                padding: 1rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="logo">
            <img src="images/riverside-logo.png" alt="Riverside Logo">
            <h1>BLOCK A ROOM BOOKING</h1>
        </header>

        <form id="registrationForm" action="tenantsuccessblocka.php" method="post">
            <div class="section">
                <h2><?php echo $firstName ?>'s Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" value="<?php echo $firstName ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" value="<?php echo $lastName ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" value="<?php echo $gender ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="gender">RoomNo</label>
                        <input type="text" value="<?php echo  $roomNo ?>" disabled>
                    </div>
                    <div class="form-group">
                       
                    </div>
                </div>
            </div>

            <div class="section">
                <h2><?php echo $firstName ?>'s Contact/Medical Info</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father">Parent/Guardian Full Name</label>
                        <input type="text" name="father" id="father" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                    <label for="lastName">Parent/Guardian Number</label>
                    <input type="text" name="fatherno" required>
                    </div>
                </div>
                <br>

                <h3 class="sub-heading">Medical Information</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="disease">Allergies/Known Condition</label>
                        <input type="text" name="disease" id="disease" placeholder="Optional">
                    </div>
                    <div class="form-group">
                        <label for="doctor">Doctor</label>
                        <input type="text" name="doctor" id="doctor" placeholder="Enter Doctor's Name">
                    </div>
                    <div class="form-group">
                        <label for="blood">Blood Group</label>
                        <input type="text" name="blood" id="blood" placeholder="Enter Blood Group">
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Personal Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="D-O-B">Date of Birth</label>
                        <input type="date" name="D-O-B" id="D-O-B" required>
                    </div>
                    <div class="form-group">
                    <label for="firstName">Phone Number</label>
                    <input type="text" value="<?php echo $phone ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="useremail">Email Address</label>
                        <input type="email" name="useremail" id="useremail" placeholder="Optional">
                    </div>
                    <div class="form-group">
                    <label for="gender">University</label>
                    <input type="text" value="<?php echo  $university ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Room Information</h2>
                <div class="form-row">
                    <!-- <div class="form-group">
                        <label for="room">Room Number</label>
                        <input type="text" name="room" id="room" placeholder="Enter Room No" required>
                    </div> -->
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" name="Username" id="Username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="Password" id="Password" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="Date">Check-in Date</label>
                        <input style="width: 200%;" type="date" name="Date" id="Date" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">Complete Registration</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateForm() {
            var father = document.getElementById('father').value.trim();
            var fatherno = document.getElementById('fatherno').value.trim();
            var dob = document.getElementById('D-O-B').value.trim();
            var userphone = document.getElementById('userphone').value.trim();
            var room = document.getElementById('room').value.trim();
            var username = document.getElementById('Username').value.trim();
            var password = document.getElementById('Password').value.trim();
            var date = document.getElementById('Date').value.trim();

            if (father === '' || fatherno === '' || dob === '' || userphone === '' || room === '' || username === '' || password === '' || date === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Required Fields Missing',
                    text: 'Please fill in all required fields to complete the registration.',
                    confirmButtonColor: '#2563eb'
                });
                return false;
            }

            return true;
        }

        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
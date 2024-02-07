

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        nav {
            background-color: #2c3e50;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #555;
            color: #fff;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
    </style>
</head>
<body>

<header>
<button><img  width="140px" src="images/riverside-logo.png"></button>
    <h1>RIVESIDE ADMIN</h1>
</header>

<nav>
<a href="booking.php">Bookings</a>
    <a href="addtenant.php">Tenants</a>
    <a href="#">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="inquiries.php">Tenant Notices</a>
    <a href="newadmin.php">Add Admin</a>
</nav>

<div style="text-align:center" class="tittle">
    <h1>Tenant Notices</h1>
</div>

<div style="text-align:center" class="textarea">
    <p>Notice</p>

    <?php
    session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $inputValue = $_POST["record"]; 
    $save = $_POST["save"];
    $delete = $_POST["delete"];
    $update = $_POST["update"];
    $admin =  $_SESSION["username"];

    $date = date("Y-m-d H:i:s");
 

    $query = "INSERT INTO record (Detail, Admin, Date ) VALUES ($record, $admin, $date)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $name, $email,  $message);

        if (mysqli_stmt_execute($stmt)) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);



    
}
?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <textarea name="record" id="" cols="70" rows="10">No Record..</textarea><br>
        <button name="save" type="submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button  name="delete" type="submit">Delete</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button  name="update" type="submit">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</div>
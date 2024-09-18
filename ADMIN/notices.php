<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
        }

        .side {
            width: 20%;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
        }

        .tabo {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            margin-left: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .tittle h1 {
            color: #333;
        }

        .textarea {
            text-align: center;
            margin-top: 20px;
        }

        .textarea p {
            font-size: 18px;
            margin-bottom: 10px;
            color: #555;
        }

        .textarea textarea {
            width: 80%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }

        .textarea button {
            padding: 10px 20px;
            border: none;
            background-color: #009879;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .textarea button:hover {
            background-color: #007f6a;
        }

        .action {
            margin-top: 10px;
        }

        .action button {
            margin-right: 10px;
        }
    </style>
</head>

<body style="display: flex;">

    <div class="side">
        <?php include ('base.php'); ?>
    </div>

    <div class="tabo">
        <div class="tittle">
            <h1>Tenant Notices</h1>
        </div>

        <div class="textarea">
            <p>Current Notice</p>

            <?php
            include('connection.php');
      
            $currentNotice = '';

            // Fetch current notice from the database
            $query = "SELECT Detail FROM record LIMIT 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $currentNotice = $row['Detail'];
            }

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Process the form data
                $inputValue = $_POST["record"];
                $admin = $_SESSION["username"];
                $date = date("Y-m-d H:i:s");

                // Update the notice in the database
                $query = "UPDATE record SET Detail = ?, Admin = ?, Date = ? WHERE 1";
                $stmt = mysqli_prepare($conn, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sss', $inputValue, $admin, $date);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "Notice updated successfully!";
                        $currentNotice = $inputValue;
                    } else {
                        echo "Error: " . mysqli_stmt_error($stmt);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <textarea name="record" id="" cols="70" rows="10"><?php echo htmlspecialchars($currentNotice); ?></textarea><br>
                <div class="action">
                    <button name="save" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

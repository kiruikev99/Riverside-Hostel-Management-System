

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<?php include('base.php'); ?>

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
        <span class="action"> <button name="save" type="submit">Save</button></span>&nbsp;&nbsp;&nbsp;&nbsp;
        
    </form>
</div>
<?php

$servername = "localhost";
$username = "root";
$password = "kiprono04";
$dbname = "login";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Faailed". $conn->connect_error);
}
echo"";



?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "riversidedb";
$conn = new mysqli($servername, $username, $password, $dbname);
    
if ($conn->connect_error) {
    die("Faailed". $conn->connect_error);
}
echo"";



?>
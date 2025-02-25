<?php

$servername = "192.168.50.100:3306";
$username = "antonin";
$password = "root";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection estabilished";

?>

<?php

$servername = "127.0.0.1:3306";
$username = "antoninsonka";
$password = "JoHingo6Oo";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection estabilished";

?>

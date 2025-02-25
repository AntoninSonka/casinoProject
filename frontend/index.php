<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: login_page.php");
    exit();
}
else{
    echo "Wazuuuuupppp" . $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

</body>
</html>

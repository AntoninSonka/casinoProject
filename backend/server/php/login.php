<?php

include "connector.php";

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $USERNAME = trim($_POST["username"] ?? "");
    $PASS = trim($_POST["pass"] ?? "");
    if(empty($USERNAME) || empty($PASS)){
        echo "chybne login udaje\n";
    }
    else{
        $stmt = $conn->prepare("SELECT username FROM user_test WHERE username = ?");
        $stmt->bind_param("s", $USERNAME);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $stmt = $conn->prepare("SELECT password FROM user_test WHERE username = ?");
            $stmt->bind_param("s", $USERNAME);
            $stmt->execute();
            $result = $stmt->get_result();


            if($row = $result->fetch_assoc()){
                $HASHED_PASS = $row["password"];
            }
            if(password_verify($PASS, $HASHED_PASS)){
                $stmt = $conn->prepare("SELECT id FROM user_test WHERE username = ?");
                $stmt->bind_param("s", $USERNAME);
                $stmt->execute();
                $result = $stmt->get_result();

                if($row = $result->fetch_assoc()){
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $USERNAME;

                    header("Location: index.php");
                    exit();

                }
            }

        }else{
            echo "chybny udaje\n";
            header("Location: login_page.php");
            exit();
            echo "mrdka\n";
        }
    }
}

?>

<?php

class Database {
    public function __construct($host, $user, $pass, $db){
        try {
            $this->conn = new mysqli($host, $user, $pass, $db);
            if($this->conn->connect_error){
                throw new Exception("Chyba tvorby conn " . $this->conn->connect_error);
            }
            else{
                echo "conn succ\n";
            }
        }
        catch(Exception $e){
            die("Error code: " . $e->getMessage());
        }//konec catch
    }//konec constructoru

    public function query($stmt){
        try {
            $result = $this->conn->query($stmt);

            if(!$result){
                throw new Exception("Chyba vytvoreni vysledku pro dotaz na DB " . $this->conn->error);
                
            }
            return $result;
        }
        catch (Exception $e){
            echo "Error code: " . $e->getMessage();
        }
    }
    public function __destruct(){
        if($this->conn){
            $this->conn->close();
        }
    }
    private $conn;
}//konec db class

try{
    $db = new Database("127.0.0.1:3306", "antoninsonka", "JoHingo6Oo", "antoninsonka");
    $result = $db->query("select * from user");
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "User: " . $row["username"];
            //echo "<br>";
            echo "\n";
        }
    }
}
catch(Exception $e){
    die("Error code " . $e->getMessage());
}
die();
?>

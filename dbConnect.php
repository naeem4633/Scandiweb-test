<?php

define('SERVER', "localhost");
define('USERNAME', 'id18944185_naeem');
define('PASSWORD', 'LT=2YBpJH~j&vC9t');
define('DATABASE', 'id18944185_products');
// $username = "id18944185_naeem";
// $password = "LT=2YBpJH~j&vC9t";
// $database = "id18944185_products";

class DbConnect{
    
    public function connect(){
        $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        if(!$conn){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        return $conn;
    }
}
?>
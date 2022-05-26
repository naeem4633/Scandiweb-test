<?php

define('SERVER', "localhost");
define('USERNAME', 'id18996769_naeem');
define('PASSWORD', 'Uy5-a)kK&f?z!ZHE');
define('DATABASE', 'id18996769_products');
// $username = "id18996769_naeem";
// $password = "Uy5-a)kK&f?z!ZHE";
// $database = "id18996769_products";

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
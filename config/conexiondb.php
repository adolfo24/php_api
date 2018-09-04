<?php
Class dbObj{
    var $servername = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "test";
    var $conn;
  
    function get_conexion() {
        $con = new mysqli($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
        $con->set_charset("utf8");
        if (mysqli_connect_errno()) {
            printf("La conexión a la base de datos ha fallado: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
    return $this->conn;
    }
}
?>
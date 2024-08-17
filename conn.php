<?php
$server = "localhost";
$user = "root";
$password = "root";
$dbname = "crud";

$conn = new mysqli($server, $user, $password, $dbname);

if($conn->connect_error){
    die("fallo la conexion". $conn->connect_error);
}else{
    // echo"exito la conexion";
}

?>
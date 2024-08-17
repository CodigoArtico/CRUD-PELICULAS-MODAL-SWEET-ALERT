<?php
include '../conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM peliculas Where id = $id";

if($conn->query($sql) === TRUE){
    header("Location: read.php");
}

?>
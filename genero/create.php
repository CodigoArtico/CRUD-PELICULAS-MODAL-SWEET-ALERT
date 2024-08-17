<?php 
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO generos (nombre) VALUES ('$nombre')";

    if($conn->query($sql) === TRUE){
        // echo"AGREGADO CON EXITO";
        header("Location: read.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Genero</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center"> Agregar Genero</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>

            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="read.php" class="btn btn-dark">Ir a Listas</a>
        </form>

    </div>
    
</body>
</html>
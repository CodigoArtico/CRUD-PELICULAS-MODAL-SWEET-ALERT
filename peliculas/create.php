<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $año_lanzamiento = $_POST['año_lanzamiento'];
    $calificacion_personal = $_POST['calificacion_personal'];
    
    $sql = "INSERT INTO peliculas (nombre, imagen, descripcion, genero, año_lanzamiento, calificacion_personal) VALUES ('$nombre', '$imagen', '$descripcion', '$genero', '$año_lanzamiento', '$calificacion_personal')";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Nueva película creada con éxito";
        header("Location: read.php?message=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Película</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/16454e4b22.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Agregar Película</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen (URL):</label>
            <input type="text" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="form-group">
            <label for="genero">Género:</label>
            <select class="form-control" id="genero" name="genero">
                <?php
                $sql = "SELECT * FROM generos";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="año_lanzamiento">Año de Lanzamiento:</label>
            <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento" required>
        </div>
        <div class="form-group">
            <label for="calificacion_personal">Calificación Personal:</label>
            <input type="number" step="0.1" class="form-control" id="calificacion_personal" name="calificacion_personal" max="10" min="0" required>
        </div>
        <a href="read.php" class="btn btn-dark"><i class="fa-solid fa-arrow-rotate-right"></i> Regresar</a>
        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-square-check"></i> Agregar</button>
    </form>
</div>
</body>
</html>

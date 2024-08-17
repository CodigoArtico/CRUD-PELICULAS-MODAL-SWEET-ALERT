<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $año_lanzamiento = $_POST['año_lanzamiento'];
    $calificacion_personal = $_POST['calificacion_personal'];
    
    $sql = "UPDATE peliculas SET nombre='$nombre', imagen='$imagen', descripcion='$descripcion', genero='$genero', año_lanzamiento='$año_lanzamiento', calificacion_personal='$calificacion_personal' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Película actualizada con éxito";
        header("Location: read.php?message=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM peliculas WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Película</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/16454e4b22.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Actualizar Película</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen (URL):</label>
            <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $row['imagen']; ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $row['descripcion']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="genero">Género:</label>
            <select class="form-control" id="genero" name="genero">
                <?php
                $sql = "SELECT * FROM generos";
                $result = $conn->query($sql);
                while ($gen_row = $result->fetch_assoc()) {
                    $selected = ($gen_row['id'] == $row['genero']) ? 'selected' : '';
                    echo "<option value='".$gen_row['id']."' $selected>".$gen_row['nombre']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="año_lanzamiento">Año de Lanzamiento:</label>
            <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento" value="<?php echo $row['año_lanzamiento']; ?>" required>
        </div>
        <div class="form-group">
            <label for="calificacion_personal">Calificación Personal:</label>
            <input type="number" step="0.1" class="form-control" id="calificacion_personal" name="calificacion_personal" value="<?php echo $row['calificacion_personal']; ?>" max="10" min="0" required>
        </div>
        <a href="read.php" class="btn btn-dark"><i class="fa-solid fa-arrow-rotate-right"></i></a>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
    </form>
</div>
</body>
</html>

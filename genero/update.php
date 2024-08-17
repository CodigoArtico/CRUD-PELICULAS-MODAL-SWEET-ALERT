<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE generos SET nombre='$nombre' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // echo "Gnero Actualizado";
        header("Location: read.php");
        exit();
    }else{
        echo "error: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM generos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Género</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="text-center">Actualizar Género</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="read.php" class="btn btn-dark">Regresar</a>
    </form>
</div>
</body>
</html>

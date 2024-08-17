<?php
include '../conn.php';

// $message = '';
// if (isset($_GET['message']) && $_GET['message'] == 'success') {
//     $message = 'Operación realizada con éxito.';
// }


$sql = "SELECT peliculas.*, generos.nombre AS genero_nombre FROM peliculas JOIN generos ON peliculas.genero = generos.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Películas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/16454e4b22.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Lista de Películas</h2>
    <br>
    <a href="create.php" class="btn btn-info"> <i class="fa-solid fa-plus"></i> Añadir Pelicula</a>
    <a href="../genero/create.php" class="btn btn-success"><i class="fa-solid fa-plus"></i> Nuevo Genero</a>
    <br>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: 'Operación realizada con éxito.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    <?php } ?>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Género</th>
                <th>Año de Lanzamiento</th>
                <th>Calificación Personal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><img src="<?php echo $row['imagen']; ?>" alt="Imagen" style="width: 100px;"></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['genero_nombre']; ?></td>
                    <td><?php echo $row['año_lanzamiento']; ?></td>
                    <td><?php echo $row['calificacion_personal']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

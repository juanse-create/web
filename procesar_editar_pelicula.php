<?php
include('conexion.php');

// Obtener los datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$genero = $_POST['genero'];
$imagen = $_POST['imagen'];
$horario_ids = $_POST['horario_id'];
$horario_fechas = $_POST['horario_fecha'];

// Actualizar la película
$sql = "UPDATE peliculas SET
            titulo = '$titulo',
            descripcion = '$descripcion',
            duracion = '$duracion',
            genero = '$genero',
            imagen = '$imagen'
        WHERE id = $id";
mysqli_query($conn, $sql);

// Actualizar los horarios
foreach ($horario_ids as $index => $horario_id) {
    $fecha = $horario_fechas[$index];
    if ($horario_id) {
        // Actualizar horario existente
        $sql_horario = "UPDATE horarios SET fecha = '$fecha' WHERE id = $horario_id";
        mysqli_query($conn, $sql_horario);
    } else {
        // Insertar nuevo horario
        $sql_horario = "INSERT INTO horarios (pelicula_id, fecha) VALUES ($id, '$fecha')";
        mysqli_query($conn, $sql_horario);
    }
}

// Eliminar horarios que no están en el formulario
$horario_ids_existentes = implode(',', array_map('intval', $horario_ids));
$sql_eliminar = "DELETE FROM horarios WHERE pelicula_id = $id AND id NOT IN ($horario_ids_existentes)";
mysqli_query($conn, $sql_eliminar);

mysqli_close($conn);
header('Location: panel_admin.php');
?>

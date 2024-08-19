<!-- procesar_editar_horario.php -->
<?php
include('conexion.php');

$id = (int)$_POST['id'];
$pelicula_id = (int)$_POST['pelicula_id'];
$fecha = $_POST['fecha'];

$sql = "UPDATE horarios
        SET pelicula_id = $pelicula_id, fecha = '$fecha'
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Horario actualizado exitosamente.";
} else {
    echo "Error al actualizar el horario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<a href="ver_horarios.php">Volver a Ver Horarios</a>

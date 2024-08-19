<!-- procesar_eliminar_horario.php -->
<?php
include('conexion.php');

// Validar y sanitizar el parámetro 'id'
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID no válido');
}

$horario_id = (int)$_GET['id'];

// Eliminar el horario
$sql = "DELETE FROM horarios WHERE id = $horario_id";

if (mysqli_query($conn, $sql)) {
    echo "Horario eliminado exitosamente.";
} else {
    echo "Error al eliminar el horario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<a href="ver_horarios.php">Volver a Ver Horarios</a>

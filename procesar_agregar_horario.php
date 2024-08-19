<!-- procesar_agregar_horario.php -->
<?php
include('conexion.php');

$pelicula_id = (int)$_POST['pelicula_id'];
$fecha = $_POST['fecha'];

$sql = "INSERT INTO horarios (pelicula_id, fecha)
        VALUES ($pelicula_id, '$fecha')";

if (mysqli_query($conn, $sql)) {
    echo "Horario agregado exitosamente.";
} else {
    echo "Error al agregar el horario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<a href="formulario_agregar_horario.php">Volver a Agregar Horario</a>

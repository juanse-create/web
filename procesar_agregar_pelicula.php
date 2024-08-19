<?php
include('conexion.php');

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$duracion = (int)$_POST['duracion'];
$genero = $_POST['genero'];
$imagen = $_POST['imagen'];
$horarios = $_POST['horarios']; // Horarios en formato texto

$sql = "INSERT INTO peliculas (titulo, descripcion, duracion, genero, imagen)
        VALUES ('$titulo', '$descripcion', $duracion, '$genero', '$imagen')";

if (mysqli_query($conn, $sql)) {
    $pelicula_id = mysqli_insert_id($conn); // Obtener el ID de la película insertada
    
    // Procesar los horarios
    $horarios_array = explode(',', $horarios);
    foreach ($horarios_array as $horario) {
        $horario = trim($horario);
        $sql_horario = "INSERT INTO horarios (pelicula_id, fecha) VALUES ($pelicula_id, '$horario')";
        mysqli_query($conn, $sql_horario);
    }

    echo "Película y horarios agregados exitosamente.";
} else {
    echo "Error al agregar la película: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<a href="formulario_agregar_pelicula.php">Volver a Agregar Película</a>

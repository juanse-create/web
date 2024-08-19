<?php
include('conexion.php');

$pelicula_id = $_GET['pelicula_id'];

// Obtener los horarios para la película seleccionada
$sql = "SELECT * FROM horarios WHERE pelicula_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $pelicula_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$horarios = [];
while ($horario = mysqli_fetch_assoc($result)) {
    $horarios[] = $horario;
}

echo json_encode($horarios);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

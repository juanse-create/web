<!-- historial_compras.php -->
<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion_usuario.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
// Obtener el historial de compras
$sql = "SELECT * FROM boletos WHERE usuario_id = '$usuario_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras</title>
</head>
<body>
    <h1>Historial de Compras</h1>
    <?php while ($boleto = mysqli_fetch_assoc($result)) { ?>
        <div>
            <h2>Película ID: <?php echo htmlspecialchars($boleto['pelicula_id']); ?></h2>
            <p>Asientos: <?php echo htmlspecialchars($boleto['asientos']); ?></p>
            <p>Fecha: <?php echo htmlspecialchars($boleto['fecha']); ?></p>
        </div>
    <?php } ?>
    <a href="peliculas_disponibles.php">Volver a películas</a>
</body>
</html>

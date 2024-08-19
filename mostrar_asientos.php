<?php
session_start();
include('conexion.php');

// Verificar si el usuario está conectado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion_usuario.php');
    exit();
}

$pelicula_id = $_POST['pelicula_id'];

// Obtener los asientos disponibles para la película seleccionada
$sql_asientos = "SELECT * FROM asientos WHERE pelicula_id = ?";
$stmt = mysqli_prepare($conn, $sql_asientos);
mysqli_stmt_bind_param($stmt, "i", $pelicula_id);
mysqli_stmt_execute($stmt);
$result_asientos = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Asientos</title>
    <link rel="stylesheet" type="text/css" href="user_styles.css">
</head>
<body>
    <div class="container">
        <h1>Seleccionar Asientos</h1>
        <form action="procesar_compra_boleto.php" method="POST">
            <input type="hidden" name="pelicula_id" value="<?php echo htmlspecialchars($pelicula_id); ?>">

            <label for="asientos">Selecciona tus Asientos:</label><br>
            <?php while ($asiento = mysqli_fetch_assoc($result_asientos)) { ?>
                <input type="checkbox" name="asientos[]" value="<?php echo htmlspecialchars($asiento['asiento']); ?>" <?php echo $asiento['ocupado'] ? 'disabled' : ''; ?>>
                <?php echo htmlspecialchars($asiento['asiento']); ?><br>
            <?php } ?>
            
            <input type="submit" value="Comprar Boleto">
        </form>
        <a href="comprar_boleto.php">Volver</a>
    </div>
</body>
</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

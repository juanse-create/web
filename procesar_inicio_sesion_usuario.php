<!-- procesar_inicio_sesion_usuario.php -->
<?php
session_start();
include('conexion.php');

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Verificar si el correo existe
$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $usuario = mysqli_fetch_assoc($result);

    // Verificar la contraseña
    if (password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $usuario['nombre_completo'];
        header('Location: peliculas_disponibles.php');
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo electrónico no registrado.";
}

mysqli_close($conn);
?>
<a href="inicio_sesion_usuario.php">Volver al formulario de inicio de sesión</a>

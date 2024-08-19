<?php
session_start();
include('conexion.php');

$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];

// Consultar el administrador por nombre de usuario
$sql = "SELECT * FROM administradores WHERE nombre_usuario = '$nombre_usuario'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row && password_verify($contrasena, $row['contrasena'])) {
    // Guardar datos en la sesión
    $_SESSION['admin_id'] = $row['id'];
    $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
    $_SESSION['nombre_completo'] = $row['nombre_completo']; // Guardar el nombre completo
    header('Location: panel_admin.php');
} else {
    // Mostrar mensaje de error con CSS en línea
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error de Inicio de Sesión</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .error-container {
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                padding: 20px;
                width: 300px;
                text-align: center;
            }
            .error-container h2 {
                margin-bottom: 20px;
                color: #333;
            }
            .error-container p {
                color: red;
                font-size: 16px;
                margin-top: 10px;
            }
            .error-container a {
                display: inline-block;
                margin-top: 10px;
                color: #28a745;
                text-decoration: none;
                font-weight: bold;
            }
            .error-container a:hover {
                text-decoration: underline;
            }
                  body {
            background-image: url(cinel.webp);
            background-size: cover; /* Esto hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Hace que la imagen se mantenga fija al hacer scroll */
        }

        /* Opcional: estiliza el contenedor de la caja de inicio de sesión */
        .login-box {
            background-color: white; /* Mantén el fondo blanco para la caja */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 100px auto;
        }

                
        </style>
    </head>
    <body>
        <div class="error-container">
            <h2>Error de Inicio de Sesión</h2>
            <p>Nombre de usuario o contraseña incorrectos.</p>
            <a href="inicio_sesion_usuario.php">Volver al formulario de inicio de sesión</a>
        </div>
    </body>
    </html>';
}

mysqli_close($conn);
?>
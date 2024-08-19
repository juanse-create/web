<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: formulario_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('fondo_admin.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 26px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 15px 0;
        }
        ul li a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }
        ul li a:hover {
            background-color: #020202;
            color: #fff;
        }
        body {
            background-image: url('cinel.webp');
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
    <div class="container">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></h1>
        <ul>
            <li><a href="formulario_agregar_editar_pelicula.php">Añadir Nueva Película</a></li>
            <li><a href="editar_peliculas.php">Editar Películas</a></li>
            <li><a href="ver_boletos.php">Ver Boletos Vendidos</a></li>
            <li><a href="formulario_agregar_admin.php">Agregar Nuevo Administrador</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
</body>
</html>
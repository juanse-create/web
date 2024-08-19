<!-- ver_boletos.php -->
<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: formulario_login.php');
    exit();
}

// Obtener todos los boletos vendidos
$sql = "SELECT boletos.id, usuarios.nombre, usuarios.apellido, peliculas.titulo, boletos.asientos, boletos.fecha
        FROM boletos
        JOIN usuarios ON boletos.usuario_id = usuarios.id
        JOIN peliculas ON boletos.pelicula_id = peliculas.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletos Vendidos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #4CAF50;
        }
        .boleto {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .boleto p {
            margin: 5px 0;
            font-size: 16px;
        }
        .boleto p strong {
            color: #4CAF50;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        a:hover {
            background-color: #45a049;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
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
        <h1>Boletos Vendidos</h1>
        <?php while ($boleto = mysqli_fetch_assoc($result)) { ?>
            <div class="boleto">
                <p><strong>Nombre del Usuario:</strong> <?php echo htmlspecialchars($boleto['nombre']) . ' ' . htmlspecialchars($boleto['apellido']); ?></p>
                <p><strong>Película:</strong> <?php echo htmlspecialchars($boleto['titulo']); ?></p>
                <p><strong>Asientos:</strong> <?php echo htmlspecialchars($boleto['asientos']); ?></p>
                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($boleto['fecha']); ?></p>
            </div>
        <?php } ?>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>
</body>
</html>
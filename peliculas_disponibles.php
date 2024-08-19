<!-- peliculas_disponibles.php -->
<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion_usuario.php');
    exit();
}

// Obtener películas de la base de datos
$sql = "SELECT * FROM peliculas";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Disponibles</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 40px;
        }
        .pelicula {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .pelicula img {
            max-width: 150px;
            border-radius: 10px;
            margin-right: 20px;
            flex-shrink: 0;
        }
        .pelicula h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }
        .pelicula p {
            margin: 10px 0;
            font-size: 16px;
        }
        .pelicula a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        .pelicula a:hover {
            background-color: #45a049;
        }
        a.cerrar-sesion {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #f44336;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a.cerrar-sesion:hover {
            background-color: #e53935;
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
        <h1>Películas Disponibles</h1>
        
        <?php while ($pelicula = mysqli_fetch_assoc($result)) { ?>
            <div class="pelicula">
                <?php if ($pelicula['imagen']) { ?>
                    <img src="<?php echo htmlspecialchars($pelicula['imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($pelicula['titulo']); ?>">
                <?php } ?>
                <div>
                    <h2><?php echo htmlspecialchars($pelicula['titulo']); ?></h2>
                    <p><?php echo htmlspecialchars($pelicula['descripcion']); ?></p>
                    <p><strong>Duración:</strong> <?php echo htmlspecialchars($pelicula['duracion']); ?> minutos</p>
                    <p><strong>Género:</strong> <?php echo htmlspecialchars($pelicula['genero']); ?></p>
                    <a href="comprar_boletos.php?pelicula_id=<?php echo $pelicula['id']; ?>">Comprar Boletos</a>
                </div>
            </div>
        <?php } ?>
        <a href="inicio_sesion_usuario.php" class="cerrar-sesion">Cerrar Sesión</a>
    </div>
</body>
</html>
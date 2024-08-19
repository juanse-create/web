<?php
include('conexion.php');

// Validar y sanitizar el parámetro 'id'
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID no válido');
}

$pelicula_id = (int)$_GET['id'];

// Eliminar boletos asociados primero
$sql = "DELETE FROM boletos WHERE pelicula_id = $pelicula_id";
mysqli_query($conn, $sql);

// Luego eliminar la película
$sql = "DELETE FROM peliculas WHERE id = $pelicula_id";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Película</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('cinel.webp');
            background-size: cover; /* Esto hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Hace que la imagen se mantenga fija al hacer scroll */
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
            margin: 15px 0;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (mysqli_query($conn, $sql)) {
            echo "<p>Película eliminada exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar la película: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
        ?>
        <a href="editar_peliculas.php">Volver a Editar Películas</a>
    </div>
</body>
</html>

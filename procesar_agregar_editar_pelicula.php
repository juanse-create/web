<!-- procesar_agregar_editar_pelicula.php -->
<?php
include('conexion.php');

// Obtener los datos del formulario
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$genero = $_POST['genero'];
$imagen = $_POST['imagen'];

if ($id > 0) {
    // Actualizar película existente
    $sql = "UPDATE peliculas 
            SET titulo = '$titulo', descripcion = '$descripcion', duracion = '$duracion', genero = '$genero', imagen = '$imagen'
            WHERE id = $id";
    $message = 'Película actualizada exitosamente.';
} else {
    // Añadir nueva película
    $sql = "INSERT INTO peliculas (titulo, descripcion, duracion, genero, imagen)
            VALUES ('$titulo', '$descripcion', '$duracion', '$genero', '$imagen')";
    $message = 'Película añadida exitosamente.';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('cinel.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
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
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
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
        <h1>Resultado</h1>
        <?php
        if (mysqli_query($conn, $sql)) {
            echo "<p>$message</p>";
        } else {
            echo "<p>Error al procesar la película: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
        ?>
        <a href="editar_peliculas.php">Volver a Editar Películas</a>
    </div>
</body>
</html>
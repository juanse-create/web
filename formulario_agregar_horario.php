<!-- formulario_agregar_horario.php -->
<?php
include('conexion.php');

// Obtener todas las películas
$sql = "SELECT id, titulo FROM peliculas";
$result = mysqli_query($conn, $sql);
$peliculas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Horario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        select, input[type="datetime-local"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #4CAF50;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 16px;
            text-align: center;
        }
        a:hover {
            background-color: #4CAF50;
            color: white;
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
        <h1>Agregar Horario</h1>
        <form action="procesar_agregar_horario.php" method="POST">
            <label for="pelicula_id">Película:</label>
            <select name="pelicula_id" required>
                <?php foreach ($peliculas as $pelicula): ?>
                    <option value="<?php echo $pelicula['id']; ?>"><?php echo htmlspecialchars($pelicula['titulo']); ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="fecha">Fecha y Hora:</label>
            <input type="datetime-local" name="fecha" required><br>

            <input type="submit" value="Agregar Horario">
        </form>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>
</body>
</html>
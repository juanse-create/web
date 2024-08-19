<!-- editar_peliculas.php -->
<?php
include('conexion.php');

// Obtener todas las películas
$sql = "SELECT * FROM peliculas";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Películas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1000px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        table img {
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 14px;
        }
        a:hover {
            background-color: #4CAF50;
            color: white;
        }
        a.eliminar {
            background-color: #f44336;
            border: 1px solid #f44336;
        }
        a.eliminar:hover {
            background-color: #e53935;
            color: white;
        }
        body {
            background-image: url('cinel.webp');
            background-size: cover; /* Esto hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Hace que la imagen se mantenga fija al hacer scroll */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Películas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Género</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pelicula = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($pelicula['id']); ?></td>
                    <td><?php echo htmlspecialchars($pelicula['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($pelicula['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($pelicula['duracion']); ?></td>
                    <td><?php echo htmlspecialchars($pelicula['genero']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($pelicula['imagen']); ?>" alt="Imagen" width="100"></td>
                    <td>
                        <a href="formulario_agregar_editar_pelicula.php?id=<?php echo htmlspecialchars($pelicula['id']); ?>">Editar</a>
                    </td>
                    <td>
                        <a href="procesar_eliminar_pelicula.php?id=<?php echo htmlspecialchars($pelicula['id']); ?>" class="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
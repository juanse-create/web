<!-- lista_peliculas.php -->
<?php
include('conexion.php');

// Obtener todas las películas
$sql = "SELECT * FROM peliculas";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Películas</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Películas</h1>
        <?php while ($pelicula = mysqli_fetch_assoc($result)) { ?>
            <div>
                <h2><?php echo htmlspecialchars($pelicula['titulo']); ?></h2>
                <p><?php echo htmlspecialchars($pelicula['descripcion']); ?></p>
                <p>Duración: <?php echo htmlspecialchars($pelicula['duracion']); ?> minutos</p>
                <p>Género: <?php echo htmlspecialchars($pelicula['genero']); ?></p>
                <?php if ($pelicula['imagen']) { ?>
                    <img src="<?php echo htmlspecialchars($pelicula['imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($pelicula['titulo']); ?>">
                <?php } ?>
                <a href="formulario_editar_pelicula.php?id=<?php echo $pelicula['id']; ?>">Editar</a>
                <a href="procesar_eliminar_pelicula.php?id=<?php echo $pelicula['id']; ?>">Eliminar</a>
            </div>
        <?php } ?>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>
</body>
</html>

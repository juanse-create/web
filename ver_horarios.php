<!-- ver_horarios.php -->
<?php
include('conexion.php');

// Obtener todos los horarios
$sql = "SELECT h.id, p.titulo, h.fecha 
        FROM horarios h
        JOIN peliculas p ON h.pelicula_id = p.id
        ORDER BY h.fecha";
$result = mysqli_query($conn, $sql);
$horarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Horarios</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <div class="container">
        <h1>Horarios de Películas</h1>
        <table>
            <thead>
                <tr>
                    <th>Película</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horarios as $horario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($horario['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($horario['fecha']); ?></td>
                        <td>
                            <a href="editar_horario.php?id=<?php echo $horario['id']; ?>">Editar</a> |
                            <a href="procesar_eliminar_horario.php?id=<?php echo $horario['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este horario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>
</body>
</html>

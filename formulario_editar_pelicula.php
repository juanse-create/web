<?php
include('conexion.php');

// Obtener el ID de la película a editar
$pelicula_id = $_GET['id'];

// Obtener los detalles de la película
$sql = "SELECT * FROM peliculas WHERE id = $pelicula_id";
$result = mysqli_query($conn, $sql);
$pelicula = mysqli_fetch_assoc($result);

// Obtener los horarios actuales de la película
$sql_horarios = "SELECT * FROM horarios WHERE pelicula_id = $pelicula_id";
$result_horarios = mysqli_query($conn, $sql_horarios);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Película</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Película</h1>
        <form action="procesar_editar_pelicula.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $pelicula['id']; ?>">
            
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($pelicula['titulo']); ?>" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo htmlspecialchars($pelicula['descripcion']); ?></textarea><br>

            <label for="duracion">Duración (en minutos):</label>
            <input type="number" name="duracion" value="<?php echo htmlspecialchars($pelicula['duracion']); ?>" required><br>

            <label for="genero">Género:</label>
            <input type="text" name="genero" value="<?php echo htmlspecialchars($pelicula['genero']); ?>" required><br>

            <label for="imagen">Imagen (URL):</label>
            <input type="text" name="imagen" value="<?php echo htmlspecialchars($pelicula['imagen']); ?>"><br>

            <h3>Horarios Disponibles:</h3>
            <div id="horarios">
                <?php while ($horario = mysqli_fetch_assoc($result_horarios)) { ?>
                    <div class="horario">
                        <input type="hidden" name="horario_id[]" value="<?php echo $horario['id']; ?>">
                        <label for="horario_fecha">Fecha y Hora:</label>
                        <input type="datetime-local" name="horario_fecha[]" value="<?php echo date('Y-m-d\TH:i', strtotime($horario['fecha'])); ?>" required>
                        <button type="button" class="eliminar_horario">Eliminar</button><br>
                    </div>
                <?php } ?>
            </div>
            <button type="button" id="agregar_horario">Agregar Horario</button><br>

            <input type="submit" value="Actualizar Película">
        </form>
        <a href="panel_admin.php">Volver al Panel de Administrador</a>
    </div>

    <script>
        document.getElementById('agregar_horario').addEventListener('click', function() {
            var horariosDiv = document.getElementById('horarios');
            var newHorarioDiv = document.createElement('div');
            newHorarioDiv.className = 'horario';
            newHorarioDiv.innerHTML = `
                <input type="hidden" name="horario_id[]" value="">
                <label for="horario_fecha">Fecha y Hora:</label>
                <input type="datetime-local" name="horario_fecha[]" required>
                <button type="button" class="eliminar_horario">Eliminar</button><br>
            `;
            horariosDiv.appendChild(newHorarioDiv);

            // Añadir funcionalidad para eliminar horarios
            newHorarioDiv.querySelector('.eliminar_horario').addEventListener('click', function() {
                horariosDiv.removeChild(newHorarioDiv);
            });
        });

        // Añadir funcionalidad para eliminar horarios existentes
        document.querySelectorAll('.eliminar_horario').forEach(function(button) {
            button.addEventListener('click', function() {
                var horarioDiv = button.parentElement;
                horarioDiv.parentElement.removeChild(horarioDiv);
            });
        });
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>

<!-- formulario_agregar_editar_pelicula.php -->
<?php
include('conexion.php');

// Inicializar variables
$pelicula = [
    'id' => '',
    'titulo' => '',
    'descripcion' => '',
    'duracion' => '',
    'genero' => '',
    'imagen' => ''
];

// Verificar si se está editando una película existente
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pelicula_id = (int)$_GET['id'];

    // Obtener los detalles de la película
    $sql = "SELECT * FROM peliculas WHERE id = $pelicula_id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $pelicula = mysqli_fetch_assoc($result);
    } else {
        die('Película no encontrada');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pelicula['id'] ? 'Editar' : 'Añadir'; ?> Película</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], textarea, select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        a {
            text-decoration: none;
            color: #337ab7;
            display: inline-block;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $pelicula['id'] ? 'Editar' : 'Añadir'; ?> Película</h1>
        <form action="procesar_agregar_editar_pelicula.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($pelicula['id']); ?>">
            
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($pelicula['titulo']); ?>" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo htmlspecialchars($pelicula['descripcion']); ?></textarea><br>

            <label for="duracion">Duración (en minutos):</label>
            <input type="number" name="duracion" value="<?php echo htmlspecialchars($pelicula['duracion']); ?>" required><br>

            <label for="genero">Género:</label>
            <select name="genero" id="genero" required>
                <option value="">Selecciona un género</option>
                <option value="Acción" <?php echo ($pelicula['genero'] == 'Acción') ? 'selected' : ''; ?>>Acción</option>
                <option value="deporte" <?php echo ($pelicula['genero'] == 'Acción') ? 'selected' : ''; ?>>deportes</option>
                <option value="Aventura" <?php echo ($pelicula['genero'] == 'Aventura') ? 'selected' : ''; ?>>Aventura</option>
                <option value="Catástrofe" <?php echo ($pelicula['genero'] == 'Catástrofe') ? 'selected' : ''; ?>>Catástrofe</option>
                <option value="Ciencia Ficción" <?php echo ($pelicula['genero'] == 'Ciencia Ficción') ? 'selected' : ''; ?>>Ciencia Ficción</option>
                <option value="Comedia" <?php echo ($pelicula['genero'] == 'Comedia') ? 'selected' : ''; ?>>Comedia</option>
                <option value="Documentales" <?php echo ($pelicula['genero'] == 'Documentales') ? 'selected' : ''; ?>>Documentales</option>
                <option value="Drama" <?php echo ($pelicula['genero'] == 'Drama') ? 'selected' : ''; ?>>Drama</option>
                <option value="Fantasía" <?php echo ($pelicula['genero'] == 'Fantasía') ? 'selected' : ''; ?>>Fantasía</option>
            </select><br>

            <label for="imagen">Imagen (URL):</label>
            <input type="text" name="imagen" value="<?php echo htmlspecialchars($pelicula['imagen']); ?>"><br>

            <input type="submit" value="<?php echo $pelicula['id'] ? 'Actualizar' : 'Añadir'; ?> Película">
        </form>
        <a href="editar_peliculas.php">Volver a Editar Películas</a>
    </div>
</body>
</html>

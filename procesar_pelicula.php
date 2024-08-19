<!-- procesar_pelicula.php -->
<?php
include('conexion.php');

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$genero = $_POST['genero'];

// Manejo de la imagen
$imagen = $_FILES['imagen']['name'];
$imagen_temp = $_FILES['imagen']['tmp_name'];
$imagen_path = 'imagenes/' . $imagen; // Carpeta donde se guardará la imagen

// Mover la imagen a la carpeta
if (move_uploaded_file($imagen_temp, $imagen_path)) {
    // Insertar los datos de la película en la base de datos
    $sql = "INSERT INTO peliculas (titulo, descripcion, duracion, genero, imagen)
            VALUES ('$titulo', '$descripcion', $duracion, '$genero', '$imagen')";

    if (mysqli_query($conn, $sql)) {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Película Añadida</title>
        </head>
        <body>
            <h1>Película añadida exitosamente.</h1>
            <a href='panel_admin.php'>Regresar al panel de Administrador</a>
        </body>
        </html>";
    } else {
        echo "Error al añadir la película: " . mysqli_error($conn);
    }
} else {
    echo "Error al subir la imagen.";
}

mysqli_close($conn);
?>

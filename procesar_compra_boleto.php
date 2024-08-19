<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion_usuario.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$pelicula_id = $_POST['pelicula_id'];

// Verificar si 'asientos' está definido y no está vacío
if (!isset($_POST['asientos']) || empty($_POST['asientos'])) {
    $mensaje = "No se seleccionaron asientos.";
    $tipo_mensaje = "error";
} else {
    // Convertir el array de asientos a una cadena separada por comas
    $asientos = implode(', ', $_POST['asientos']);

    // Insertar la compra en la base de datos
    $sql = "INSERT INTO boletos (usuario_id, pelicula_id, asientos) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $usuario_id, $pelicula_id, $asientos);

    if (mysqli_stmt_execute($stmt)) {
        $mensaje = "Boleto comprado exitosamente.";
        $tipo_mensaje = "success";
    } else {
        $mensaje = "Error al comprar el boleto: " . mysqli_error($conn);
        $tipo_mensaje = "error";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .success {
            color: #5cb85c;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .error {
            color: #d9534f;
            font-size: 18px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #0F5E1C;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #20993A;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Compra de Boletos</h1>
        <?php if (isset($mensaje)): ?>
            <p class="<?php echo $tipo_mensaje; ?>"><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <a href="peliculas_disponibles.php">Volver a la Página Principal</a>
    </div>
</body>
</html>
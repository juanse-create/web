<!-- procesar_registro_usuario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .message {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .error {
            color: #d9534f;
        }
        .success {
            color: #5cb85c;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #337ab7;
        }
        a:hover {
            text-decoration: underline;
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
        <?php
        include('conexion.php');

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $confirmar_contrasena = $_POST['confirmar_contrasena'];

        // Validación del lado del servidor
        if ($contrasena !== $confirmar_contrasena) {
            echo "<p class='message error'>Las contraseñas no coinciden.</p>";
            echo "<a href='registro_usuario.php'>Volver al formulario de registro</a>";
            exit();
        }

        // Verificar si el correo ya está registrado
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<p class='message error'>El correo electrónico ya está registrado.</p>";
            echo "<a href='registro_usuario.php'>Volver al formulario de registro</a>";
            exit();
        }

        // Insertar el nuevo usuario en la base de datos
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, nombre_completo)
                VALUES ('$nombre', '$apellido', '$correo', '$contrasena_hash', CONCAT('$nombre', ' ', '$apellido'))";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='message success'>Registro exitoso.</p>";
        } else {
            echo "<p class='message error'>Error al registrar el usuario: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
        ?>
        <a href="registro_usuario.php">Volver al formulario de registro</a>
    </div>
</body>
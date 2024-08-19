<!-- registro_usuario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
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
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #4CAF50;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 16px;
            margin-top: 20px;
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
        <h1>Registro de Usuario</h1>
        <form action="procesar_registro_usuario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required><br>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>

            <label for="confirmar_contrasena">Confirmar Contraseña:</label>
            <input type="password" name="confirmar_contrasena" required><br>

            <input type="submit" value="Registrar">
        </form>
        <a href="a.php">Volver al inicio </a>
    </div>
</body>
</html>

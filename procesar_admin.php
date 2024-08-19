<!-- procesar_admin.php -->
<?php
include('conexion.php');

// Obtener datos del formulario
$nombre_completo = $_POST['nombre_completo'];
$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

// Verificar si el nombre de usuario ya existe
$sql = "SELECT * FROM administradores WHERE nombre_usuario = '$nombre_usuario'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Nombre de usuario ya existe
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Error</title>
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
            }
            h1 {
                color: #333;
                text-align: center;
                padding: 20px;
            }
            a {
                display: block;
                text-align: center;
                color: #007bff;
                text-decoration: none;
                margin-top: 20px;
            }
            a:hover {
                text-decoration: underline;
            }
            .container {
                max-width: 600px;
                padding: 20px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
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
        <div class='container'>
            <h1>Error: El nombre de usuario ya está en uso.</h1>
            <a href='formulario_agregar_admin.php'>Volver al formulario</a>
        </div>
    </body>
    </html>";
} else {
    // Insertar el nuevo administrador en la base de datos
    $sql = "INSERT INTO administradores (nombre_completo, nombre_usuario, contrasena)
            VALUES ('$nombre_completo', '$nombre_usuario', '$contrasena')";

    if (mysqli_query($conn, $sql)) {
        // Redirigir al panel de administración
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Administrador Añadido</title>
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
                }
                h1 {
                    color: #333;
                    text-align: center;
                    padding: 20px;
                }
                a {
                    display: block;
                    text-align: center;
                    color: #007bff;
                    text-decoration: none;
                    margin-top: 20px;
                }
                a:hover {
                    text-decoration: underline;
                }
                .container {
                    max-width: 600px;
                    padding: 20px;
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
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
            <div class='container'>
                <h1>Administrador añadido exitosamente.</h1>
                <a href='panel_admin.php'>Regresar al panel de Administrador</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Error al añadir el administrador: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
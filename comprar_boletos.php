<?php
session_start();
include('conexion.php');

// Verificar si el usuario está conectado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion_usuario.php');
    exit();
}

// Obtener las películas disponibles
$sql_peliculas = "SELECT * FROM peliculas";
$result_peliculas = mysqli_query($conn, $sql_peliculas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Boletos</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select, input[type="text"], input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
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

        .seats-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 5px;
            margin-bottom: 20px;
        }

        .seat {
            background-color: #ddd;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .seat.selected {
            background-color: #5cb85c;
            color: white;
        }

        .seat input[type="checkbox"] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comprar Boletos</h1>
        <form action="procesar_compra_boleto.php" method="POST">
            <label for="pelicula">Selecciona una Película:</label>
            <select name="pelicula_id" id="pelicula" required>
                <option value="">Selecciona una película</option>
                <?php while ($pelicula = mysqli_fetch_assoc($result_peliculas)) { ?>
                    <option value="<?php echo $pelicula['id']; ?>"><?php echo htmlspecialchars($pelicula['titulo']); ?></option>
                <?php } ?>
            </select><br>

            <label for="asientos">Selecciona tus Asientos:</label>
            <div class="seats-container">
                <?php
                for ($i = 1; $i <= 50; $i++) {
                    $seat_id = 'A' . $i;
                    echo '<div class="seat">';
                    echo '<label>';
                    echo '<input type="checkbox" name="asientos[]" value="' . $seat_id . '" onclick="toggleSeat(this)">';
                    echo $seat_id;
                    echo '</label>';
                    echo '</div>';
                }
                ?>
            </div>

            <input type="submit" value="Comprar Boleto">
        </form>
        <a href="peliculas_disponibles.php">Volver a la Página Principal</a>
    </div>

    <script>
        function toggleSeat(checkbox) {
            if (checkbox.checked) {
                checkbox.parentElement.parentElement.classList.add('selected');
            } else {
                checkbox.parentElement.parentElement.classList.remove('selected');
            }
        }
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemex</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1c1c1c;
            color: #fff;
        }

        header {
            background-color: #1c1c1c;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            height: 40px;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .hero {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .hero video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1; /* Asegura que el video esté detrás del contenido */
        }

        .hero-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 1;
        }

        .hero h1 {
            margin: 0;
            font-size: 48px;
        }

        .hero a {
            background-color: #ff0055;
            border: none;
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            padding: 20px;
            background-color: #333;
        }

        .carousel img {
            width: 300px;
            margin-right: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <header>
        <img src="jamon.jpg" alt="Cinemex">
        <nav>
            <ul>
                <h1>JAMON PLUS X</h1>
                
            </ul>
        </nav>
        <div>
            
            </a>
        </div>
    </header>

    <section class="hero">
        <!-- Video de fondo -->
        <video autoplay muted loop>
            <source src="videoplayback (1).mp4" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>
        <div class="hero-content">
            <h1>Cartelera</h1>
            <a href="inicio_sesion_usuario.php">Comprar boletos</a>
            <a href="registro_usuario.php">Registrarse</a>
        </div>
    </section>

    <section class="carousel">
        <img src="1.jpeg" alt="Siempre Juntos">
        <img src="2.jpg" alt="Deadpool">
        <img src="3.jpg" alt="Promoción">
        <img src="4.jpeg" alt="Promoción">
    </section>

</body>
</html>

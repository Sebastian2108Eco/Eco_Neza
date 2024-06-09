<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco_Neza</title>
    <link rel="stylesheet" type="text/css" href="../Estilos/Menu.css">
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            if (menu.style.left === "-200px") {
                menu.style.left = "0";
            } else {
                menu.style.left = "-200px";
            }
        }

    </script>
</head>
<?php
    session_start();
    if (!isset($_SESSION['correo']) || !isset($_SESSION['nombre_usuario'])) {
        header("Location: ../Vistas/Form_Login.html");
        exit();
    }
    $nombre_usuario = $_SESSION['nombre_usuario'];
    ?>

<body>
    <header>
        <button class="menu-button" onclick="toggleMenu()">☰ Menú</button>
    </header>
    <nav class="menu" id="menu">
        <ul>
            <li><a href="../Vistas/Form_Menu.php" onclick="toggleMenu()">Inicio</a></li>
            <li><a href="../Vistas/Form_Campañas.php" onclick="toggleMenu()">Campañas</a></li>
            <li><a href="../Vistas/Form_CompraVenta.php" onclick="toggleMenu()">Compra y venta</a></li>
            <li><a href="#" onclick="toggleMenu()">Dar de alta tu empresa</a></li>
            <li><a href="../Vistas/Form_Login.html" onclick="toggleMenu()">Cerrar Sesion</a></li>
        </ul>
    </nav>
    </header>
    <main>
        <section class="welcome-section">
            <span
                        style="display: block; font-weight: bold; font-size: 50px; color: #037216; text-align: center; margin: 0 auto;">ECO_NEZA</span>
            <h2>Bienvenido <?php echo $nombre_usuario; ?> </h2>
            <h3>Conocenos más</h3>
            <div style="text-align: center; padding: 30px; border-radius: 10px;">
                <p style="font-family: 'Arial', sans-serif; font-size: 20px; color: #333; line-height: 1.6;">
                    En un mundo donde la gestión de reciclaje enfrenta desafíos constantes,
                    hemos creado una solución integral para hacer del reciclaje una tarea más fácil
                    y efectiva para todos. En nuestra plataforma, encontrarás una experiencia única
                    que centraliza toda la información relevante sobre reciclaje: desde campañas en curso
                    hasta puntos de recolección y procedimientos actualizados. <br>

                    Lo que nos hace diferentes es nuestra pasión por la comunicación eficiente y la participación
                    ciudadana. Con nuestro chatbot integrado, estamos siempre disponibles para responder tus preguntas
                    y ayudarte en tiempo real.<br><br>

                    <span
                        style="display: block; font-weight: bold; font-size: 24px; color: #037216; text-align: center; margin: 0 auto;">¡Juntos
                        podemos hacer la diferencia!</span>
                </p>
            </div>

        </section>
        <section class="logo-section">
            <img src="../Resources/image.png" alt="Avatar" class="avatar-logo">
        </section>
    </main>
</body>

</html>
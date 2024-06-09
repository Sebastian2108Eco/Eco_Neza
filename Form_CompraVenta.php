<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra y Venta</title>
    <link rel="stylesheet" type="text/css" href="../Estilos/Campañas.css">
    <link rel="stylesheet" type="text/css" href="../EStilos/Chatbox.css">
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
            <li><a href="../Vistas/Form_Login.html" onclick="toggleMenu()">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <main>
        <section class="welcome-section">
            <h1>Compra y venta</h1>
            <div class="campaign-container">
                <?php
                include ("../Modelo/Configuracion.php");

                $sql = "SELECT * FROM precios";
                $result = $mysqli->query($sql);

                $campaigns = array();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $campaigns[] = $row;
                    }
                } else {
                    echo "No se encontraron materiales.";
                    exit;
                }
                $mysqli->close();
                ?>
                <?php foreach ($campaigns as $campaign): ?>
                    <div class="campaign">
                        <p><?php echo isset($campaign['NombreEmpresa']) ? $campaign['NombreEmpresa'] : 'Nombre no disponible'; ?>
                        </p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($campaign['ImagenMaterial']); ?>"
                            alt="Imagen de la campaña">
                        <p><?php echo isset($campaign['Material']) ? $campaign['Material'] : 'Nombre del material no disponible'; ?>
                        </p>
                        <!-- Asegúrate de especificar el tipo de imagen correcto (image/jpeg, image/png, etc.) -->
                        <p><?php echo isset($campaign['Compra']) ? 'Compra $' . $campaign['Compra'] . ' Pesos  ' : 'Precio no disponible';
                        echo isset($campaign['Venta']) ? 'Venta $' . $campaign['Venta'] . ' Pesos' : 'Precio no disponible'; ?>
                        </p>
                        <button onclick="mostrarChatbox()">Contactar</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Agregar el widget de chatbot web -->
    <div id="tawk_6665768a981b6c56477b401d"></div>
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6665768a981b6c56477b401d/1hvu5e3q0';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
    </script>

    <!-- Agregar el script del widget de chatbot web -->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
</body>

</html>

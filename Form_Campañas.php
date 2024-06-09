<?php
include ("../Modelo/Configuracion.php");

$sql = "SELECT * FROM campañas";
$result = $mysqli->query($sql);

$campaigns = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $campaigns[] = $row;
    }
} else {
    echo "No se encontraron campañas.";
    exit;
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campañas</title>
    <link rel="stylesheet" type="text/css" href="../Estilos/Campañas.css">
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
            <h1>CAMPAÑAS</h1>
            <div class="campaign-container">
                <?php foreach ($campaigns as $campaign): ?>
                    <div class="campaign">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($campaign['Imagen']); ?>"
                            alt="Imagen de la campaña">
                        <!-- Asegúrate de especificar el tipo de imagen correcto (image/jpeg, image/png, etc.) -->
                        <p><?php echo isset($campaign['DescripcionCorta']) ? $campaign['DescripcionCorta'] : 'Descripción corta no disponible'; ?>
                        </p>
                        <button
                            onclick="location.href='../Controlador/Engine_MostrarCampaña.php?Id=<?php echo $campaign['Id']; ?>'">Informes</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

</body>

</html>
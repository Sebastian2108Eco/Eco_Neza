<?php
include ("../Modelo/Configuracion.php");

$id = intval($_GET['Id']);
$sql = "SELECT * FROM campañas WHERE Id = $id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['Nombre'];
    $descripcioncorta = $row['DescripcionCorta'];
    $descripcion = $row['Descripcion'];
    $imagen = $row['Imagen'];
} else {
    echo "No se encontró la campaña.";
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Campaña</title>
    <link rel="stylesheet" type="text/css" href="../Estilos/MostrarCampañas.css">
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
            <li><a href="#" onclick="toggleMenu()">Compra y venta</a></li>
            <li><a href="#" onclick="toggleMenu()">Dar de alta tu empresa</a></li>
            <li><a href="../Vistas/Form_Login.html" onclick="toggleMenu()">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <main>
        <section class="campaign-detail">
            <h1><?php echo htmlspecialchars($nombre); ?></h1>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="Imagen de la campaña">
            <p><?php echo htmlspecialchars($descripcioncorta); ?></p>
            <p><?php echo htmlspecialchars($descripcion); ?></p>

            <!-- Formulario para asistir a la campaña -->
            <form id="asistirForm">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="asistir-button">Asistir</button>
            </form>

            <div id="mensaje"></div>
        </section>
    </main>

    <script>
        document.getElementById('asistirForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('../Controlador/Engine_Asistir.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                var mensaje = document.getElementById('mensaje');
                if (data.success) {
                    mensaje.innerHTML = '<p>Correo enviado con éxito.</p>';
                } else {
                    mensaje.innerHTML = '<p>Error al enviar el correo.</p>';
                }
            })
            .catch(error => {
                var mensaje = document.getElementById('mensaje');
                mensaje.innerHTML = '<p>Error al enviar el correo.</p>';
            });
        });
    </script>
</body>

</html>

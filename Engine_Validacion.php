<?php
include ("../Modelo/Configuracion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = filter_var($_POST['Usuario'], FILTER_SANITIZE_EMAIL); // Cambiado a FILTER_SANITIZE_EMAIL
    $contrasena = $_POST['Contraseña'];

    if (!empty($correo) && !empty($contrasena)) {
        $query = "SELECT * FROM registros WHERE correo = ? AND contraseña = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $correo, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
            session_start();
            $_SESSION['correo'] = $correo;
            $_SESSION['nombre_usuario'] = $result['nombre_usuario']; // Guardamos el nombre de usuario en la sesión
            header("Location: ../Vistas/Form_Menu.php");
            exit();
        } else {
            echo '<script language="javascript">';
            echo 'alert("Contraseña o Correo incorrecto");';
            echo 'window.location="../Vistas/Form_Login.html"'; // Redirigir al archivo donde se muestra la información
            echo '</script>';
            exit();
        }
    } else {
        header("Location: ../Vistas/Form_Login.html?error=vacio");
        exit();
    }
}
?>
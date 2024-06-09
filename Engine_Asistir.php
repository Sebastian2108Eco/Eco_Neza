<?php
include ("../Controlador/Engine_MostrarCampañas.php");

// Verificar si se recibió el ID de la campaña
if (isset($_POST['Id'])) {
    $id = intval($_POST['Id']);
    $campaña = obtenerCampaña($id);

    if ($campaña) {
        $nombre = $campaña['Nombre'];
        $descripcioncorta = $campaña['DescripcionCorta'];
        $descripcion = $campaña['Descripcion'];

        // Configuración del correo
        $to = "usuario@ejemplo.com"; // Reemplaza con la dirección de correo del destinatario
        $subject = "Detalles de la campaña: $nombre";
        $message = "Nombre: $nombre\n\nDescripción Corta: $descripcioncorta\n\nDescripción: $descripcion";
        $headers = "From: no-reply@ejemplo.com";

        // Enviar el correo
        if (mail($to, $subject, $message, $headers)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Campaña no encontrada']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}
?>

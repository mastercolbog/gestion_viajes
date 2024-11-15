<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID de reserva válido
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $ReservaViajeID = $_POST['id'];

        // Consulta SQL para eliminar la reserva por su ID usando consultas preparadas
        $sql = $conn->prepare("DELETE FROM reservaviajes WHERE ReservaViajeID = ?");
        $sql->bind_param("i", $ReservaViajeID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de reservas después de la eliminación
            header("Location: viajes_consulta.php");
            exit();
        } else {
            echo "Error al eliminar la solicitud de viaje: " . $conn->error;
        }
        $sql->close();
    } else {
        echo "ID de reserva no válido.";
    }
} else {
    echo "Acceso denegado.";
}

$conn->close();
?>

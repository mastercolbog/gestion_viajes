<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID de reserva válido
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $ReservaAlojamientoID = $_POST['id'];

        // Consulta SQL para eliminar la reserva por su ID usando consultas preparadas
        $sql = $conn->prepare("DELETE FROM reservaalojamiento WHERE ReservaAlojamientoID = ?");
        $sql->bind_param("i", $ReservaAlojamientoID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de reservas después de la eliminación
            header("Location: alojamiento_consulta.php");
            exit();
        } else {
            echo "Error al eliminar la reserva del alojamiento: " . $conn->error;
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

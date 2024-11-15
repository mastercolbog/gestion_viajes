<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID de anticipo válido
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $SolicitudAnticipoID = $_POST['id'];

        // Consulta SQL para eliminar la anticipo por su ID usando consultas preparadas
        $sql = $conn->prepare("DELETE FROM solicitudanticipos WHERE SolicitudAnticipoID = ?");
        $sql->bind_param("i", $SolicitudAnticipoID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de anticipos después de la eliminación
            header("Location: anticipos_consulta.php");
            exit();
        } else {
            echo "Error al eliminar la solicitud de anticipo: " . $conn->error;
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

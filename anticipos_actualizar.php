<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['SolicitudAnticipoID'], $_POST['Monto'], $_POST['FechaSolicitud'], $_POST['FechaAprobacion'], $_POST['Estado'])) {
        // Recibir los datos del formulario
        $SolicitudAnticipoID = $_POST['SolicitudAnticipoID'];
        $Monto = $_POST['Monto'];
        $FechaSolicitud = $_POST['FechaSolicitud'];
        $FechaAprobacion = $_POST['FechaAprobacion'];
        $Estado = $_POST['Estado'];

        // Actualizar los detalles de la solicitud en la base de datos usando consultas preparadas
        $sql = $conn->prepare("UPDATE solicitudanticipos SET Monto=?, FechaSolicitud=?, FechaAprobacion=?, Estado=? WHERE SolicitudAnticipoID=?");
        $sql->bind_param("ssssi", $Monto, $FechaSolicitud, $FechaAprobacion, $Estado, $SolicitudAnticipoID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de solicitudes después de la actualización
            header("Location: anticipos_consulta.php");
            exit();
        } else {
            echo "Error al actualizar la solicitud de anticipo: " . $conn->error;
        }
        $sql->close();
    } else {
        echo "Faltan datos del formulario.";
    }
} else {
    echo "Acceso denegado.";
}

$conn->close();
?>

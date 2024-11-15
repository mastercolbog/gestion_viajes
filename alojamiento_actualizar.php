<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['ReservaAlojamientoID'], $_POST['ciudad'], $_POST['Hotel'], $_POST['FechaEntrada'], $_POST['FechaSalida'])) {
        // Recibir los datos del formulario
        $ReservaAlojamientoID = $_POST['ReservaAlojamientoID'];
        $Ciud_alojamiento = $_POST['ciudad'];
        $Hotel = $_POST['Hotel'];
        $FechaEntrada = $_POST['FechaEntrada'];
        $FechaSalida = $_POST['FechaSalida'];

        // Actualizar los detalles de la reserva en la base de datos usando consultas preparadas
        $sql = $conn->prepare("UPDATE reservaalojamiento SET Ciud_alojamiento=?, Hotel=?, FechaEntrada=?, FechaSalida=? WHERE ReservaAlojamientoID=?");
        $sql->bind_param("ssssi", $Ciud_alojamiento, $Hotel, $FechaEntrada, $FechaSalida, $ReservaAlojamientoID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de reservas después de la actualización
            header("Location: alojamiento_consulta.php");
            exit();
        } else {
            echo "Error al actualizar la reserva del alojamiento: " . $conn->error;
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

<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['ReservaViajeID'], $_POST['Tipo'], $_POST['Destino'], $_POST['FechaSalida'], $_POST['FechaRegreso'])) {
        // Recibir los datos del formulario
        $ReservaViajeID = $_POST['ReservaViajeID'];
        $TipoViaje = $_POST['Tipo'];
        $Destino = $_POST['Destino'];
        $FechaSalida = $_POST['FechaSalida'];
        $FechaRegreso = $_POST['FechaRegreso'];

        // Actualizar los detalles de la reserva en la base de datos usando consultas preparadas
        $sql = $conn->prepare("UPDATE reservaviajes SET TipoViaje=?, Destino=?, FechaSalida=?, FechaRegreso=? WHERE ReservaViajeID=?");
        $sql->bind_param("ssssi", $TipoViaje, $Destino, $FechaSalida, $FechaRegreso, $ReservaViajeID);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de consulta de reservas después de la actualización
            header("Location: viajes_consulta.php");
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

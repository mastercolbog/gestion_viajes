<?php
include("conexion.php");

// Verifica si se ha enviado un ID de reserva válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ReservaAlojamientoID = $_GET['id'];

    // Consulta SQL para obtener los detalles del reserva por su ID
    $sql = "SELECT ReservaAlojamientoID, ReservaAlojamientoID, Ciud_alojamiento, Hotel, FechaEntrada, FechaSalida FROM reservaalojamiento WHERE ReservaAlojamientoID = $ReservaAlojamientoID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se encontró el reserva, mostrar el formulario de edición
        $reserva = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar reservas</title>
</head>
<body>
    <h2>Editar reservas</h2>
    <form method="post" action="alojamiento_actualizar.php">
        <input type="hidden" name="ReservaAlojamientoID" value="<?php echo htmlspecialchars($reserva['ReservaAlojamientoID']); ?>">

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="Ciud_alojamiento" name="ciudad" value="<?php echo htmlspecialchars($reserva['Ciud_alojamiento']); ?>"><br><br>

        <label for="Hotel">Hotel:</label>
        <input type="text" id="Hotel" name="Hotel" value="<?php echo htmlspecialchars($reserva['Hotel']); ?>"><br><br>

        <label for="FechaEntrada">Fecha Entrada:</label>
        <input type="date" id="FechaEntrada" name="FechaEntrada" value="<?php echo htmlspecialchars($reserva['FechaEntrada']); ?>"><br><br>

        <label for="FechaSalida">Fecha Salida:</label>
        <input type="date" id="FechaSalida" name="FechaSalida" value="<?php echo htmlspecialchars($reserva['FechaSalida']); ?>"><br><br>

        
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
<?php
    } else {
        echo "No se encontró el reserva.";
    }
} else {
    echo "ID de reserva no válido.";
}


$conn->close();
?>

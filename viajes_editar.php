<?php
include("conexion.php");

// Verifica si se ha enviado un ID de reserva válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ReservaViajeID = $_GET['id'];

    // Consulta SQL para obtener los detalles del reserva por su ID
    $sql = "SELECT ReservaViajeID, FuncionarioID, TipoViaje, Destino, FechaSalida, FechaRegreso FROM reservaviajes WHERE ReservaViajeID = $ReservaViajeID";
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
            <title>Editar viajes</title>
        </head>

        <body>
            <h2>Editar viajes</h2>
            <form method="post" action="viajes_actualizar.php">
                <input type="hidden" name="ReservaViajeID" value="<?php echo htmlspecialchars($reserva['ReservaViajeID']); ?>">

                <label for="TipoViaje" class="block text-base mb-2 font-bold">Tipo de Viaje</label>
                <select id="TipoViaje" name="Tipo" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600">
                    <option value="Aéreo">Aéreo</option>
                    <option value="Terrestre">Terrestre</option>
                    <option value="Fluvial ">Fluvial </option>
                    
                </select>
                <br><br>
                <label for="Destino">Destino:</label>
                <input type="text" id="Destino" name="Destino" value="<?php echo htmlspecialchars($reserva['Destino']); ?>"><br><br>

                <label for="FechaSalida">Fecha Salida:</label>
                <input type="date" id="FechaSalida" name="FechaSalida" value="<?php echo htmlspecialchars($reserva['FechaSalida']); ?>"><br><br>

                <label for="FechaRegreso">Fecha Regreso:</label>
                <input type="date" id="FechaRegreso" name="FechaRegreso" value="<?php echo htmlspecialchars($reserva['FechaRegreso']); ?>"><br><br>

                <br><br>

                <input type="submit" value="Guardar Cambios">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "No se encontró la reserva del viaje.";
    }
} else {
    echo "ID de reserva no válido.";
}


$conn->close();
?>
<?php
include("conexion.php");

// Verifica si se ha enviado un ID de reserva válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $SolicitudAnticipoID = $_GET['id'];

    // Consulta SQL para obtener los detalles del reserva por su ID
    $sql = "SELECT SolicitudAnticipoID, FuncionarioID, Monto, FechaSolicitud, FechaAprobacion, Estado FROM solicitudanticipos WHERE SolicitudAnticipoID = $SolicitudAnticipoID";
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
            <title>Editar Anticipos</title>
        </head>

        <body>
            <h2>Editar Anticipos</h2>
            <form method="post" action="anticipos_actualizar.php">
                <input type="hidden" name="SolicitudAnticipoID" value="<?php echo htmlspecialchars($reserva['SolicitudAnticipoID']); ?>">

                <label for="Estado" class="block text-base mb-2 font-bold">Estado</label>
                <select id="Estado" name="Estado" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado ">Rechazado </option>
                </select>

                <br><br>
                <label for="Monto">Monto:</label>
                <input type="float" id="Monto" name="Monto" value="<?php echo htmlspecialchars($reserva['Monto']); ?>"><br><br>

                <label for="FechaSolicitud">Fecha Solicitud:</label>
                <input type="date" id="FechaSolicitud" name="FechaSolicitud" value="<?php echo htmlspecialchars($reserva['FechaSolicitud']); ?>"><br><br>

                <label for="FechaAprobacion">Fecha Aprobacion:</label>
                <input type="date" id="FechaAprobacion" name="FechaAprobacion" value="<?php echo htmlspecialchars($reserva['FechaAprobacion']); ?>"><br><br>

                <br><br>

                <input type="submit" value="Guardar Cambios">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "No se encontró la solicitud del anticipo.";
    }
} else {
    echo "ID de anticipo no válido.";
}


$conn->close();
?>
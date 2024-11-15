<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"]) && $_POST["registrar"] == "submit") {
    if (isset($_POST["FuncionarioID"]) && isset($_POST["TipoViaje"]) && isset($_POST["Destino"]) && isset($_POST["FechaSalida"]) && isset($_POST["FechaRegreso"])) {

        $FuncionarioID = $_POST["FuncionarioID"];
        $TipoViaje = $_POST["TipoViaje"];
        $Destino = $_POST["Destino"];
        $FechaSalida = $_POST["FechaSalida"];
        $FechaRegreso = $_POST["FechaRegreso"];

        $sql = "INSERT INTO reservaviajes (FuncionarioID, TipoViaje, Destino, FechaSalida, FechaRegreso) VALUES ('$FuncionarioID', '$TipoViaje', '$Destino', '$FechaSalida', '$FechaRegreso')";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('La solicitud del viaje se ha ingresado correctamente'); location.href='viajes_consulta.php';</script>";
        } else {
            echo "<sript> alert('Error al agregar la reserva de viaje:'); location.href='viajes_agregar.php';</script> " . $conn->error;
        }
    } else {
        echo "Falta información. Por favor, complete todos los campos.";
    }
} else {
    echo "No se ha enviado el formulario de agregar reserva de viaje.";
}
?>


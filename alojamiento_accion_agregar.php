<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"]) && $_POST["registrar"] == "submit") {
    if (isset($_POST["FuncionarioID"]) && isset($_POST["Ciudad"]) && isset($_POST["Hotel"]) && isset($_POST["FechaEntrada"]) && isset($_POST["FechaSalida"])) {

        $FuncionarioID = $_POST["FuncionarioID"];
        $Ciudad = $_POST["Ciudad"];
        $Hotel = $_POST["Hotel"];
        $FechaEntrada = $_POST["FechaEntrada"];
        $FechaSalida = $_POST["FechaSalida"];

        $sql = "INSERT INTO reservaalojamiento (FuncionarioID, Ciud_alojamiento, Hotel, FechaEntrada, FechaSalida) VALUES ('$FuncionarioID', '$Ciudad', '$Hotel', '$FechaEntrada', '$FechaSalida')";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('La reserva de alojamiento se ha ingresado correctamente'); location.href='alojamiento_consulta.php';</script>";
        } else {
            echo "<sript> alert('Error al agregar la reserva de alojamiento:'); location.href='alojamiento_agregar.php';</script> " . $conn->error;
        }
    } else {
        echo "Falta información. Por favor, complete todos los campos.";
    }
} else {
    echo "No se ha enviado el formulario de agregar reserva alojamiento.";
}
?>


<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"]) && $_POST["registrar"] == "submit") {
    if (isset($_POST["FuncionarioID"]) && isset($_POST["Monto"]) && isset($_POST["FechaSolicitud"]) && isset($_POST["FechaAprobacion"]) && isset($_POST["Estado"])) {

        $FuncionarioID = $_POST["FuncionarioID"];
        $Monto = $_POST["Monto"];
        $FechaSolicitud = $_POST["FechaSolicitud"];
        $FechaAprobacion = $_POST["FechaAprobacion"];
        $Estado = $_POST["Estado"];

        $sql = "INSERT INTO solicitudanticipos (FuncionarioID, Monto, FechaSolicitud, FechaAprobacion, Estado) VALUES ('$FuncionarioID', '$Monto', '$FechaSolicitud', '$FechaAprobacion', '$Estado')";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('La soliciud del anticipo se ha ingresado correctamente'); location.href='anticipos_consulta.php';</script>";
        } else {
            echo "<sript> alert('Error al agregar la solicitud del anticipo:'); location.href='anticipos_agregar.php';</script> " . $conn->error;
        }
    } else {
        echo "Falta información. Por favor, complete todos los campos.";
    }
} else {
    echo "No se ha enviado el formulario de agregar la solicitud de entrega.";
}



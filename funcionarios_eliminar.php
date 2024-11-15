<?php
include("conexion.php");

if (isset($_POST["Eliminar"])) {
    $funcionario_id = $_POST["id"];
    // Verificar si el campo "nombre" está definido antes de usarlo
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";

    // Usar el nombre correcto de la tabla y la columna
    $query = "DELETE FROM funcionario WHERE FuncionarioID=?";
    $sentencia = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($sentencia, "i", $funcionario_id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        echo "<script> alert('El funcionario [{$nombre}] se ha eliminado correctamente'); location.href='funcionarios_consulta.php';</script>";
    } else {
        echo "<script> alert('El funcionario [{$nombre}] no se eliminó correctamente'); location.href='funcionarios_consulta.php';</script>";
    }

    mysqli_stmt_close($sentencia);
}
$conn->close();
?>

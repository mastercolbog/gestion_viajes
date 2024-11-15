<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['funcionario_id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['fechaRegistro'], $_POST['usuario'], $_POST['contrasena'])) {
        // Recibir los datos del formulario
        $funcionario_id = $_POST['funcionario_id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fechaRegistro = $_POST['fechaRegistro'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Actualizar los detalles del funcionario en la base de datos usando consultas preparadas
        $sql = $conn->prepare("UPDATE funcionario SET Nombre=?, Apellido=?, Email=?, Telefono=?, FechaRegistro=?, usuario=?, contrasena=? WHERE FuncionarioID=?");
        $sql->bind_param("sssssssi", $nombre, $apellido, $email, $telefono, $fechaRegistro, $usuario, $contrasena, $funcionario_id);

        if ($sql->execute() === TRUE) {
            // Redireccionar a la página de funcionarios después de la actualización
            header("Location: funcionarios_consulta.php");
            exit();
        } else {
            echo "Error al actualizar el funcionario: " . $conn->error;
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

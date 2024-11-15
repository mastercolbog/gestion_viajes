<?php
include("conexion.php");

// Verifica si se ha enviado un ID de funcionario válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $funcionario_id = $_GET['id'];

    // Consulta SQL para obtener los detalles del funcionario por su ID
    $sql = "SELECT FuncionarioID, Nombre, Apellido, Email, Telefono, FechaRegistro, usuario, contrasena FROM funcionario WHERE FuncionarioID = $funcionario_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se encontró el funcionario, mostrar el formulario de edición
        $funcionario = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionarios</title>
</head>
<body>
    <h2>Editar Funcionarios</h2>
    <form method="post" action="funcionarios_actualizar.php">
        <input type="hidden" name="funcionario_id" value="<?php echo htmlspecialchars($funcionario['FuncionarioID']); ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($funcionario['Nombre']); ?>"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($funcionario['Apellido']); ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($funcionario['Email']); ?>"><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($funcionario['Telefono']); ?>"><br><br>

        <label for="fechaRegistro">Fecha de Registro:</label>
        <input type="date" id="fechaRegistro" name="fechaRegistro" value="<?php echo htmlspecialchars($funcionario['FechaRegistro']); ?>"><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($funcionario['usuario']); ?>"><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo htmlspecialchars($funcionario['contrasena']); ?>"><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
<?php
    } else {
        echo "No se encontró el funcionario.";
    }
} else {
    echo "ID de Funcionario no válido.";
}


$conn->close();
?>

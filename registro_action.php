<?php
include("conexion.php");

if (isset($_POST['ingresar'])) {
    // Verifica si todos los campos requeridos están presentes
    if (strlen($_POST['Nombre']) >= 1 &&
        strlen($_POST['Apellido']) >= 1 &&
        strlen($_POST['Email']) >= 1 &&
        strlen($_POST['Telefono']) >= 1 &&
        strlen($_POST['FechaRegistro']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['contrasena']) >= 1) {
        
        $nombre = trim($_POST['Nombre']);
        $apellido = trim($_POST['Apellido']);
        $email = trim($_POST['Email']);
        $telefono = trim($_POST['Telefono']);
        $fecha = trim($_POST['FechaRegistro']);
        $usuario = trim($_POST['usuario']);
        $contrasena = trim($_POST['contrasena']);
        
        // Consulta para insertar los datos en la base de datos
        $consulta = "INSERT INTO funcionario (Nombre, Apellido, Email, Telefono, FechaRegistro, usuario, contrasena) 
                     VALUES ('$nombre', '$apellido', '$email', '$telefono', '$fecha', '$usuario', '$contrasena')";
        
        $resultado = mysqli_query($conn, $consulta);
        
        if ($resultado) {
            // Registro exitoso, redirigir a la página de login
            echo "<script>alert('Registro exitoso. Ahora puede iniciar sesión.'); window.location.href='login.php';</script>";
        } else {
            // Si hay un error en la consulta SQL
            die("Error al registrar los datos: " . mysqli_error($conn));
        }
        
    } else {
        //Mensaje de error cuando no se diligencian los campos o cuando uno de los campos está vacío
        echo "<script>alert('Diligencie por favor todos los campos!')</script>";
    }
}
?>

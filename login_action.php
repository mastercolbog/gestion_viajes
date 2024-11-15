<?php

include("conexion.php");

if (isset($_POST['ingresar'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['contrasena']) >= 1) {

        $usuario = trim($_POST['usuario']);
        $contrasena = trim($_POST['contrasena']);

        // Consulta para verificar las credenciales del usuario utilizando consultas preparadas
        $consulta = $conn->prepare("SELECT FuncionarioID, usuario, contrasena FROM funcionario WHERE usuario = ? AND contrasena = ?");
        $consulta->bind_param("ss", $usuario, $contrasena);
        $consulta->execute();
        $resultado = $consulta->get_result();

        // Comprobar si se encontró un registro en la base de datos
        if ($resultado->num_rows == 1) {
            // Obtener los datos del funcionario
            $row = $resultado->fetch_assoc();
            $FuncionarioID = $row['FuncionarioID'];

            // Insertar registro en la tabla de logins utilizando consultas preparadas
            $insert_login = $conn->prepare("INSERT INTO login (FuncionarioID, usuario, contrasena, fecha_hora) VALUES (?, ?, ?, NOW())");
            $insert_login->bind_param("iss", $FuncionarioID, $usuario, $contrasena);

            if ($insert_login->execute()) {
                // Redirigir a la página principal
                header("Location: paginainicial.php");
                exit();
            } else {
                // Si hay un error en la consulta de inserción
                die("Error al registrar el ingreso: " . $conn->error);
            }
        } else {
            // Usuario o contraseña incorrectos
            echo "<script>alert('El usuario o contraseña son incorrectos!'); window.location.href='login.php';</script>";
        }
    } else {
        //Mensaje de error cuando no se diligencian los campos o cuando uno de los dos campos está vacío
        echo "<h3 class='bad'>Diligencie por favor todos los campos!</h3>";
    }
}

?>

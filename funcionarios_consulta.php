<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Consulta de Funcionarios</title>
    <style>
        .background-image {
            background-image: url('img/fondobasefinal.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <div class="background-image flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">Organizacion para la Educacion y Proteccion Ambiental - OpEPA</h1>
            <a href="paginainicial.php" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">Volver a la página principal</a>
        </div>
        <h1 class="text-center text-white font-bold bg-red-400 text-3xl py-2 px-4 rounded">Funcionarios</h1>

        <form method="post" action="funcionarios_editar.php">
            <table>
                <!-- Encabezado de la tabla -->

                <thead>
                    <tr>
                        <!--esta es la tabla -->
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha registro</th>
                        <!--esta es la columna editar -->
                        <th>Editar</th>
                        <!--esta es la columna eliminar -->
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conexion.php");

                    // Consulta SQL para obtener los datos de la tabla funcionarios
                    $sql = "SELECT FuncionarioID, Nombre, Apellido, Email, Telefono, FechaRegistro, usuario, contrasena FROM funcionario";
                    $result = $conn->query($sql);

                    // Mostrar los resultados en forma de tabla
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["FuncionarioID"] . "</td>";
                            echo "<td>" . $row["Nombre"] . "</td>";
                            echo "<td>" . $row["Apellido"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Telefono"] . "</td>";
                            echo "<td>" . $row["FechaRegistro"] . "</td>";
                            echo "<td>
                            <form action='funcionarios_editar.php' method='POST'>
                            <a href='funcionarios_editar.php?id=" . $row["FuncionarioID"] . "'>Editar</a>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row["Nombre"]) . "'>
                            
                            </form>
                          </td>";

                            echo "<td>
                            <form action='funcionarios_eliminar.php' method='POST'>
                            <input type='hidden' name='id' value='" . $row["FuncionarioID"] . "'>
                            <input type='hidden' name='nombre' value='" . htmlspecialchars($row["Nombre"]) . "'>
                            <input type='submit' name='Eliminar' value='Eliminar'>
                            </form>
                          </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

        </form>
    </header>

    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            Todos los derechos reservados para Nelson Gutiérrez - Copyright@2024
        </div>
    </footer>

</body>


</html>
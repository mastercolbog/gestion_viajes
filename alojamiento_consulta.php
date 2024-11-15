<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Consulta de Alojamiento</title>
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
        <h1 class="text-center text-white font-bold bg-red-400 text-3xl py-2 px-4 rounded">Solicitudes de Alojamiento</h1>

        <form method="post" action="alojamiento_editar.php">
            <table>
                <!-- Encabezado de la tabla -->

                <thead>
                    <tr>
                        <!--esta es la tabla -->
                        <th>Funcionario ID</th>
                        <th>No de Reserva.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Ciudad</th>
                        <th>Hotel</th>
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>

                        <!--esta es la columna editar -->
                        <th>Editar</th>
                        <!--esta es la columna eliminar -->
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conexion.php");

                    // Consulta SQL para obtener los datos de la tabla funcionarios y tabla reserva alojamiento
                    $sql = "SELECT 	funcionario.FuncionarioID, funcionario.Nombre, funcionario.Apellido, funcionario.Email, funcionario.Telefono, 
	reservaalojamiento.ReservaAlojamientoID AS Reserva, reservaalojamiento.Ciud_alojamiento AS Ciudad, reservaalojamiento.Hotel, 
	reservaalojamiento.FechaEntrada, reservaalojamiento.FechaSalida FROM funcionario INNER JOIN reservaalojamiento ON funcionario.FuncionarioID = reservaalojamiento.FuncionarioID";
                    $result = $conn->query($sql);

                    // Mostrar los resultados en forma de tabla
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["FuncionarioID"] . "</td>";
                            echo "<td>" . $row["Reserva"] . "</td>";
                            echo "<td>" . $row["Nombre"] . "</td>";
                            echo "<td>" . $row["Apellido"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Telefono"] . "</td>";
                            echo "<td>" . $row["Ciudad"] . "</td>";
                            echo "<td>" . $row["Hotel"] . "</td>";
                            echo "<td>" . $row["FechaEntrada"] . "</td>";
                            echo "<td>" . $row["FechaSalida"] . "</td>";
                            echo "<td>
                            <form action='alojamiento_editar.php' method='POST'>
                            <a href='alojamiento_editar.php?id=" . $row["Reserva"] . "'>Editar</a>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row["Nombre"]) . "'>
                            
                            </form>
                          </td>";

                            echo "<td>
                            <form action='alojamiento_eliminar.php' method='POST'>
                            <input type='hidden' name='id' value='" . $row["Reserva"] . "'>
                            <input type='submit' value='Eliminar'>
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
            <br><br>
            <!-- Boton para agregar solicitudes de alojamiento -->
            <div class="text-center bg-red-400 hover:bg-red-400 text-white font-bold py-2 px-4 rounded inline-flex ">
                <a href="alojamiento_agregar.php" class="btn-agregar">Agregar solicitudes</a>
            </div>
        </form>
    </header>

    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            Todos los derechos reservados para Nelson Gutiérrez - Copyright@2024
        </div>
    </footer>

</body>


</html>
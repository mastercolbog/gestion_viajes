<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Agregar Reserva de Alojamiento</title>
    <style>
        .background-image {
            background-image: url('img/fondobasefinal.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
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
            <h1 class="text-4xl font-bold">Organización para la Educación y Protección Ambiental - OpEPA</h1>
            <a href="paginainicial.php" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">Volver a la página principal</a>
        </div>
    </header>
    <form method="post" action="viajes_accion_agregar.php">
        <div class="flex py-4 items-center justify-center bg-orange-50">
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
                <h1 class="text-2xl block text-center font-semibold">AGREGAR SOLICITUD DE VIAJE</h1>
                <hr class="mt-3" />
                <div class="mt-3">
                    <label class="block text-base mb-2 font-bold">Funcionario</label>
                    <select name="FuncionarioID" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" required>
                        <?php
                        include("conexion.php");
                        $sql = "SELECT FuncionarioID, Nombre, Apellido FROM funcionario";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['FuncionarioID'] . "'>" . $row['Nombre'] . " " . $row['Apellido'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="TipoViaje" class="block text-base mb-2 font-bold">Tipo de Viaje</label>
                    <select id="TipoViaje" name="TipoViaje" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600">
                        <option value="Aéreo">Aéreo</option>
                        <option value="Terrestre">Terrestre</option>
                        <option value="Fluvial ">Fluvial </option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-base mb-2 font-bold">Destino</label>
                    <input type="text" name="Destino" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Indique el destino..." required />
                </div>
                <div class="mt-3">
                    <label class="block text-base mb-2 font-bold">Fecha Salida</label>
                    <input type="date" name="FechaSalida" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" required />
                </div>
                <div class="mt-3">
                    <label class="block text-base mb-2 font-bold">Fecha Regreso</label>
                    <input type="date" name="FechaRegreso" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" required />
                </div>
                <div class="mt-3">
                    <button type="submit" name="registrar" value="submit" class="w-full border-2 border-indigo-700 bg-indigo-700 py-1 text-xl text-white font-bold">
                        Agregar
                    </button>
                    <br><br><br>
                </div>
            </div>
        </div>
    </form>
</body>
<footer class="bg-gray-800 text-white py-4">
    <div class="text-center">
        Todos los derechos reservados para Nelson Gutiérrez - Copyright@2024
    </div>
</footer>

</html>
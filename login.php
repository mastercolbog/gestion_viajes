<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
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
            <a href="inicio.php" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">Volver a la página principal</a>
        </div>
    </header>
    <div class="flex py-4 items-center justify-center bg-orange-50">
        <div class="w-96 rounded-md bg-white p-6 shadow-lg">
            <h1 class="block text-center text-2xl font-semibold">LOGIN</h1>
            <hr class="mt-3" />
            <form action="login_action.php" method="POST">
                <div class="mt-3">
                    <label class="mb-2 block text-base font-bold">Usuario</label>
                    <input type="text" name="usuario" class="w-full border px-2 py-1 text-base focus:border-gray-600 focus:outline-none focus:ring-0" placeholder="Ingrese su usuario..." required>
                </div>
                <div class="mt-3">
                    <label class="mb-2 block text-base font-bold">Contraseña</label>
                    <input type="password" name="contrasena" class="w-full border px-2 py-1 text-base focus:border-gray-600 focus:outline-none focus:ring-0" placeholder="Ingrese su contraseña..." required>
                </div>

                <?php
                include("login_action.php");
                ?>
                <div class="mt-3">
                    <button type="submit" name="ingresar" class="w-full border-2 border-indigo-700 bg-indigo-700 py-1 text-xl text-white font-bold">Login</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            Todos los derechos reservados para Nelson Gutiérrez - Copyright@2024
        </div>
    </footer>
</body>

</html>
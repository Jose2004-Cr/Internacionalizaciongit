<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        select {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .hidden {
            display: none;
        }

        .help-icon {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            right: 8px;
            cursor: pointer;
        }

        .tooltip {
            visibility: hidden;
            width: max-content;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            padding: 5px 10px;
            border-radius: 5px;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .help-icon:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="relative flex w-full h-full">
        <div class="absolute top-0 right-0 flex items-center mt-4 mr-4">
            <div class="relative">
                <img src="images/Estados unidos.png" alt="Bandera de Estados Unidos" class="w-12 h-8 rounded cursor-pointer" onclick="showLine('usa')" />
                <div id="usa-line" class="hidden h-1 mt-1 transition-all duration-500 -translate-x-full bg-red-500 rounded-full"></div>
            </div>
            <div class="relative ml-2">
                <img src="images/COLOMBIA.png" alt="Bandera de Colombia" class="w-12 h-8 rounded cursor-pointer" onclick="showLine('colombia')" />
                <div id="colombia-line" class="hidden h-1 mt-1 transition-all duration-500 -translate-x-full bg-yellow-200 rounded-full"></div>
            </div>
        </div>

        <div class="flex w-full">
            <div class="w-1/2 h-screen">
                <img class="object-cover w-full h-full" src="images/x2.png" alt="Banner Image" />
            </div>
            <div class="flex flex-col items-center justify-center w-1/2 h-screen">
                <div>
                    <div class="w-full pb-8 border-b-2 border-blue-900">
                        <h1 class="mb-2 font-bold text-blue-900 text-7xl">
                            Ingresa tus datos
                        </h1>
                    </div>
                    <br>
                    <br>
                    <div class="w-full pr-30">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="relative flex items-center w-full">
                                <select id="nacionalidad" class="w-full p-5 pr-10 mb-4 text-white bg-blue-800 border border-gray-300 rounded" onchange="mostrarCampos()">
                                    <option value="colombiano">Soy colombiano</option>
                                    <option value="extranjero">Soy extranjero</option>
                                </select>
                                <div class="ml-4 help-icon">
                                    <svg class="h-8 text-gray-800 w-9 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="tooltip">Soy colombiano: Cedula de<br> ciudadania - Tarjeta de identidad.<br><br> Soy extranjero: Cedula de extranjeria-<br>Pasaporte - Visa.</span>
                                </div>
                            </div>

                            <input class="w-11/12 p-5 pr-10 mt-6 mb-4 border border-blue-900 rounded" type="text" id="documento" name="email" required placeholder="Numero del documento" oninput="validarCampos()" />

                            <div id="campo-contrasena-colombiano" class="hidden">
                                <input type="password" id="contrasena-colombiano" name="password" class="w-11/12 p-5 pr-10 mb-4 border border-blue-900 rounded" required placeholder="Contraseña" oninput="validarCampos()" />
                            </div>

                            <div id="campo-contrasena-extranjero" class="hidden">
                                <input type="password" id="contrasena-extranjero" name="contrasena" class="w-11/12 p-5 pr-10 mb-4 border border-blue-900 rounded" required placeholder="Contraseña" oninput="validarCampos()" />
                            </div>

                            <button type="submit" id="btn-ingresar" class="w-11/12 p-5 pr-10 text-white bg-gray-400 rounded cursor-not-allowed" disabled>
                                INGRESAR
                            </button>
                        </form>

                        <p class="mt-4" style="font-family: 'Poppins', sans-serif; font-weight: 500;">
                            ¿No tienes cuenta?
                            <a href="{{ route('registroinicio') }}" class="text-blue-700">Regístrate aquí.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showLine(country) {
            const lines = document.querySelectorAll("[id$='-line']");
            lines.forEach((line) => {
                line.classList.add("hidden", "-translate-x-full");
                line.classList.remove("translate-x-0");
            });

            const line = document.getElementById(`${country}-line`);
            line.classList.remove("hidden");
            setTimeout(() => {
                line.classList.remove("-translate-x-full");
                line.classList.add("translate-x-0");
            }, 10);
        }

        function mostrarCampos() {
            var nacionalidad = document.getElementById("nacionalidad").value;
            var campoContrasenaColombiano = document.getElementById("campo-contrasena-colombiano");
            var campoContrasenaExtranjero = document.getElementById("campo-contrasena-extranjero");

            if (nacionalidad === "extranjero") {
                campoContrasenaColombiano.classList.add("hidden");
                campoContrasenaExtranjero.classList.remove("hidden");
            } else {
                campoContrasenaColombiano.classList.remove("hidden");
                campoContrasenaExtranjero.classList.add("hidden");
            }
            validarCampos();
        }

        function validarCampos() {
            const nacionalidad = document.getElementById('nacionalidad').value;
            const documento = document.getElementById('documento').value.trim();
            const contrasenaColombiano = document.getElementById('contrasena-colombiano').value.trim();
            const contrasenaExtranjero = document.getElementById('contrasena-extranjero').value.trim();
            const btnIngresar = document.getElementById('btn-ingresar');

            if (documento !== '' && ((nacionalidad === 'colombiano' && contrasenaColombiano !== '') || (nacionalidad === 'extranjero' && contrasenaExtranjero !== ''))) {
                btnIngresar.disabled = false;
                btnIngresar.classList.remove('bg-gray-400', 'cursor-not-allowed');
                btnIngresar.classList.add('bg-blue-500', 'cursor-pointer');
            } else {
                btnIngresar.disabled = true;
                btnIngresar.classList.remove('bg-blue-500', 'cursor-pointer');
                btnIngresar.classList.add('bg-gray-400', 'cursor-not-allowed');
            }

            if (nacionalidad === 'colombiano' && documento !== '') {
                document.getElementById("campo-contrasena-colombiano").classList.remove("hidden");
            } else {
                document.getElementById("campo-contrasena-colombiano").classList.add("hidden");
            }

            if (nacionalidad === 'extranjero' && documento !== '') {
                document.getElementById("campo-contrasena-extranjero").classList.remove("hidden");
            } else {
                document.getElementById("campo-contrasena-extranjero").classList.add("hidden");
            }
        }

        function redirigirUsuario(event) {
            event.preventDefault();
            const email = document.getElementById('documento').value.trim();

            if (email === 'carlos@gmail.com') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/welcomeinicial';
            }
        }
    </script>
</body>

</html>


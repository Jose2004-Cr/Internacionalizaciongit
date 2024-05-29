<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        /* Estilos para el contenedor del formulario */
        .form-container {
            max-height: 80vh;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .form-container::-webkit-scrollbar {
            display: none;
        }

        .form-header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 10;
        }

        .custom-select {
            background-color: #1e3a8a;
            color: white;
            border: 1px solid #1e3a8a;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="M8.7,8.3c-0.4-0.4-1.1-0.4-1.5,0s-0.4,1.1,0,1.5l4,4c0.4,0.4,1.1,0.4,1.5,0l4-4c0.4-0.4,0.4-1.1,0-1.5s-1.1-0.4-1.5,0L12,11.7L8.7,8.3z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 40px;
        }

        .custom-select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.5);
            outline: none;
        }

        .custom-boton {
            background-color: #1e3a8a;
        }

        .file-upload-container {
            display: flex;
            align-items: center;
            border: 2px dashed #d1d5db;
            padding: 10px;
            border-radius: 8px;
            width: fit-content;
        }

        .file-upload-label {
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-upload-label:hover {
            background-color: #e5e7eb;
        }

        .file-upload-input {
            display: none;
        }

        .file-upload-description {
            margin-left: 10px;
            color: #6b7280;
        }

        body, select, input, label, button, a {
            font-family: 'Poppins', sans-serif;
        }


    </style>
</head>

<body>
    <div class="relative w-full h-full flex">
        <!-- Banderas en la esquina superior derecha -->
        <div class="absolute top-0 right-0 flex items-center mr-4 mt-4">
            <div class="relative">
                <img src="images/Estados unidos.png" alt="Bandera de Estados Unidos" class="w-12 h-8 rounded cursor-pointer" onclick="showLine('usa')" />
                <div id="usa-line" class="hidden h-1 bg-red-500 rounded-full transition-all duration-500 -translate-x-full mt-1"></div>
            </div>
            <div class="relative ml-2">
                <img src="images/COLOMBIA.png" alt="Bandera de Colombia" class="w-12 h-8 rounded cursor-pointer" onclick="showLine('colombia')" />
                <div id="colombia-line" class="hidden h-1 bg-yellow-200 rounded-full transition-all duration-500 -translate-x-full mt-1"></div>
            </div>
        </div>

        <!-- Contenedor de la imagen y el contenido -->
        <div class="flex w-full">
            <!-- Contenedor de la imagen -->
            <div class="w-1/2 h-screen hidden md:block">
                <img class="w-full h-full object-cover" src="images/x2.png" alt="Banner Image" />
            </div>
            <!-- Contenedor del contenido -->
            <div class="w-full md:w-1/2 h-screen flex flex-col justify-center items-center">
                <!-- Contenedor del formulario con scroll -->
                <div class="form-container w-3/4">
                    <div class="form-header w-full pb-8 border-b-2 border-blue-900 flex justify-center items-center">
                        <h1 class="text-2xl md:text-5xl font-bold mb-2 text-blue-900 text-center">
                            REGISTRAR TUS DATOS
                        </h1>
                    </div>

                    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4 w-full md:w-9/12">
                            <label class="text-blue-700 text-lg font-bold mb-2 " for="nombre">
                                Nombre Completo
                            </label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="nombre" type="text" placeholder="Nombre">
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-9/12">
                            <label for="countries" class="text-blue-700 text-lg font-bold mb-2">Nacionalidad</label>
                            <select id="countries" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">
                                <option class="text-base py-2" value="" disabled selected>Nombre del pais - codigo del pais (ISO3)- codigo</option>
                                <option value="COL">COLOMBIA | COL | 170</option>
                                <option value="ARG">ARGENTINA | ARG | 032</option>
                                <option value="CHL">CHILE | CHL | 152</option>
                                <option value="USA">ESTADOS UNIDOS | USA | 840</option>
                                <option value="ESP">ESPAÑA | ESP | 724</option>
                                <option value="ECU">ECUADOR | ECU | 218</option>
                                <option value="CUB">CUBA | CUB | 192</option>
                                <option value="PAN">PANAMA | PAN | 591</option>

                            </select>
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-60">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="fecha">Fecha de nacimiento</label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="fecha" type="date" placeholder="Nombre">
                        </div>

                        <div class="mb-3 w-full">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="genero">Género</label>
                            <div class="flex items-center space-x-4">
                                <input type="checkbox" id="hombre" name="genero" class="hidden" onclick="hideInput()">
                                <label for="hombre" class="inline-flex items-center gap-2 px-6 py-4 md:pr-8 border-r-2 border-blue-700 cursor-pointer" onclick="check('hombre')">
                                    <span class="text-gray-700">Hombre</span>
                                    <span id="check-hombre" class="h-5 w-5  border border-blue-700 rounded">
                                        <i class="fas fa-check text-white hidden"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>

                                <input type="checkbox" id="mujer" name="genero" class="hidden" onclick="hideInput()">
                                <label for="mujer" class="inline-flex items-center gap-2 px-6 py-4 md:pr-8 border-r-2 border-blue-700 cursor-pointer" onclick="check('mujer')">
                                    <span class="text-gray-700">Mujer</span>
                                    <span id="check-mujer" class="h-5 w-5  border border-blue-700 rounded">
                                        <i class="fas fa-check text-white hidden"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>

                                <input type="checkbox" id="no_identificado" name="genero" class="hidden" onclick="showInput()">
                                <label for="no_identificado" class="inline-flex items-center gap-2 px-6 py-4 cursor-pointer" onclick="check('no_identificado')">
                                    <span class="text-gray-700">No identificado</span>
                                    <span id="check-no_identificado" class="h-5 w-5 border border-blue-700 rounded">
                                        <i class="fas fa-check text-white hidden"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>
                            </div>
                            <div id="otroInput" class="mt-4">
                                <input type="text" id="otro" name="otro" class="shadow-md rounded-md p-2 block w-64 py-5 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" placeholder="Otro...">
                            </div>
                        </div>


                        <div class="mb-4 w-full">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="tipo_documento">Tipo de documento</label>
                            <div class="flex items-center space-x-4">
                                <select id="tipo_documento" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-blue-900 border border-blue-900 border-opacity-50  focus:outline-none focus:border-gray-500 text-white ">
                                    <option class="text-base py-2" value="" disabled selected>Seleccione Documento</option>
                                    <option class="text-base py-2" value="cedula_extranjeria">Cedula de extranjeria</option>
                                    <option class="text-base py-2" value="pasaporte">Pasaporte</option>
                                    <option class="text-base py-2" value="visa">Visa</option>
                                </select>
                                <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="numero_documento" type="text" placeholder="Número de documento">
                            </div>
                        </div>
                        <br>
                        <div class="mb-4 w-full">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="documento_pdf">Documento de PDF</label>
                            <div class="file-upload-container">
                                <label for="file-upload" class="file-upload-label">Seleccionar archivo</label>
                                <input type="file" id="file-upload" class="file-upload-input" accept="application/pdf">
                                <span class="file-upload-description">Fotos de ambas caras del documento en PDF</span>
                            </div>
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-80">
                            <label class="text-blue-700 text-lg font-bold mb-2 block" for="fecha_expedicion">Fecha de expedición del documento</label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="fecha_expedicion" type="date" placeholder="Fecha de expedición">
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-9/12">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="correo">Correo electrónico</label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="correo" type="email" placeholder="Correo de preferencia Gmail...">
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-9/12">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="contraseña">Contraseña</label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="contraseña" type="password" placeholder="Mínimo 8 caracteres...">
                        </div>
                        <br>
                        <div class="mb-4 w-full md:w-9/12">
                            <label class="text-blue-700 text-lg font-bold mb-2" for="confirmacion_contraseña">Confirmar contraseña</label>
                            <input class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" id="confirmacion_contraseña" type="password" placeholder="Mínimo 8 caracteres...">
                        </div>

                        <div class="flex items-center justify-between my-10 mb-4 w-full md:w-9/12">
                            <button class="custom-boton bg-blue-500 hover:bg-blue-700 shadow appearance-none border rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" type="button">
                                Registrarse
                            </button>
                        </div>
                        <p class="mt-4" style="font-family: 'Poppins', sans-serif; font-weight: 500;">
                            ¿Ya estás registrado?
                            <a href="{{ route('inicio') }}" class="text-blue-700">¡Ingresa aquí!</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


    <script>
        function showLine(country) {
            // Ocultar todas las líneas
            const lines = document.querySelectorAll("[id$='-line']");
            lines.forEach((line) => {
                line.classList.add("hidden", "-translate-x-full");
                line.classList.remove("translate-x-0");
            });

            // Mostrar la línea correspondiente y animarla
            const line = document.getElementById(`${country}-line`);
            line.classList.remove("hidden");
            setTimeout(() => {
                line.classList.remove("-translate-x-full");
                line.classList.add("translate-x-0");
            }, 10);
        }

        function check(id) {
            const checkboxes = ['hombre', 'mujer', 'no_identificado'];
            checkboxes.forEach((checkbox) => {
                if (checkbox !== id) {
                    const checkboxElement = document.getElementById('check-' + checkbox);
                    checkboxElement.classList.remove('bg-blue-700');
                    checkboxElement.querySelector('i').classList.add('hidden'); // Ocultar ícono de chulito
                }
            });
            const checkboxElement = document.getElementById('check-' + id);
            checkboxElement.classList.toggle('bg-blue-700');
            checkboxElement.querySelector('i').classList.toggle('hidden'); // Mostrar/ocultar ícono de chulito
        }

        function hideInput() {
            document.getElementById('otro').classList.add('opacity-0');
            document.getElementById('otro').classList.add('pointer-events-none');
        }

        function showInput() {
            document.getElementById('otro').classList.remove('opacity-0');
            document.getElementById('otro').classList.remove('pointer-events-none');
        }


    </script>
</body>

</html>


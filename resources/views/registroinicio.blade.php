<!DOCTYPE html>
<html lang="es">
@vite(['resources/css/registroinicio.css','resources/js/registroinicio.js' ])
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />

<<<<<<< HEAD
        .file-upload-description {
            margin-left: 10px;
            color: #6b7280;
        }

        body, select, input, label, button, a {
            font-family: 'Poppins', sans-serif;
        }
    </style>
=======
>>>>>>> main
</head>

<body>
    <div class="relative flex w-full h-full">
        <!-- Banderas en la esquina superior derecha -->
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

        <!-- Contenedor de la imagen y el contenido -->
        <div class="flex w-full">
            <!-- Contenedor de la imagen -->
            <div class="hidden w-1/2 h-screen md:block">
                <img class="object-cover w-full h-full" src="images/x2.png" alt="Banner Image" />
            </div>
            <!-- Contenedor del contenido -->
            <div class="flex flex-col items-center justify-center w-full h-screen md:w-1/2">
                <!-- Contenedor del formulario con scroll -->
                <div class="w-3/4 form-container">
                    <div class="flex items-center justify-center w-full pb-8 border-b-2 border-blue-900 form-header">
                        <h1 class="mb-2 text-2xl font-bold text-center text-blue-900 md:text-5xl">
                            REGISTRAR TUS DATOS
                        </h1>
                    </div>

                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        <div class="w-full mb-4 md:w-9/12">
                            <label class="mb-2 text-lg font-bold text-blue-700 " for="nombre">
                                Nombre Completo
                            </label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="nombre" type="text" placeholder="Nombre">
                        </div>
                        <br>
                        <div class="w-full mb-4 md:w-9/12">
                            <label for="countries" class="mb-2 text-lg font-bold text-blue-700">Nacionalidad</label>
                            <select id="countries" class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500">
                                <option class="py-2 text-base" value="" disabled selected>Nombre del pais - codigo del pais (ISO3)- codigo</option>
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
                        <div class="w-full mb-4 md:w-60">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="fecha">Fecha de nacimiento</label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="fecha" type="date" placeholder="Nombre">
                        </div>

                        <div class="w-full mb-3">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="genero">Género</label>
                            <div class="flex items-center space-x-4">
                                <input type="checkbox" id="hombre" name="genero" class="hidden" onclick="hideInput()">
                                <label for="hombre" class="inline-flex items-center gap-2 px-6 py-4 border-r-2 border-blue-700 cursor-pointer md:pr-8" onclick="check('hombre')">
                                    <span class="text-gray-700">Hombre</span>
                                    <span id="check-hombre" class="w-5 h-5 border border-blue-700 rounded">
                                        <i class="hidden text-white fas fa-check"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>

                                <input type="checkbox" id="mujer" name="genero" class="hidden" onclick="hideInput()">
                                <label for="mujer" class="inline-flex items-center gap-2 px-6 py-4 border-r-2 border-blue-700 cursor-pointer md:pr-8" onclick="check('mujer')">
                                    <span class="text-gray-700">Mujer</span>
                                    <span id="check-mujer" class="w-5 h-5 border border-blue-700 rounded">
                                        <i class="hidden text-white fas fa-check"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>

                                <input type="checkbox" id="no_identificado" name="genero" class="hidden" onclick="showInput()">
                                <label for="no_identificado" class="inline-flex items-center gap-2 px-6 py-4 cursor-pointer" onclick="check('no_identificado')">
                                    <span class="text-gray-700">No identificado</span>
                                    <span id="check-no_identificado" class="w-5 h-5 border border-blue-700 rounded">
                                        <i class="hidden text-white fas fa-check"></i> <!-- Ícono de chulito -->
                                    </span>
                                </label>
                            </div>
                            <div id="otroInput" class="mt-4">
                                <input type="text" id="otro" name="otro" class="block w-64 p-2 px-3 py-5 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" placeholder="Otro...">
                            </div>
                        </div>


                        <div class="w-full mb-4">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="tipo_documento">Tipo de documento</label>
                            <div class="flex items-center space-x-4">
                                <select id="tipo_documento" class="block w-full p-2 px-3 py-4 text-white bg-blue-900 border border-blue-900 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500 ">
                                    <option class="py-2 text-base" value="" disabled selected>Seleccione Documento</option>
                                    <option class="py-2 text-base" value="cedula_extranjeria">Cedula de extranjeria</option>
                                    <option class="py-2 text-base" value="pasaporte">Pasaporte</option>
                                    <option class="py-2 text-base" value="visa">Visa</option>
                                </select>
                                <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="numero_documento" type="text" placeholder="Número de documento">
                            </div>
                        </div>
                        <br>
                        <div class="w-full mb-4">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="documento_pdf">Documento de PDF</label>
                            <div class="file-upload-container">
                                <label for="file-upload" class="file-upload-label">Seleccionar archivo</label>
                                <input type="file" id="file-upload" class="file-upload-input" accept="application/pdf">
                                <span class="file-upload-description">Fotos de ambas caras del documento en PDF</span>
                            </div>
                        </div>
                        <br>
                        <div class="w-full mb-4 md:w-80">
                            <label class="block mb-2 text-lg font-bold text-blue-700" for="fecha_expedicion">Fecha de expedición del documento</label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="fecha_expedicion" type="date" placeholder="Fecha de expedición">
                        </div>
                        <br>
                        <div class="w-full mb-4 md:w-9/12">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="correo">Correo electrónico</label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="correo" type="email" placeholder="Correo de preferencia Gmail...">
                        </div>
                        <br>
                        <div class="w-full mb-4 md:w-9/12">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="contraseña">Contraseña</label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="contraseña" type="password" placeholder="Mínimo 8 caracteres...">
                        </div>
                        <br>
                        <div class="w-full mb-4 md:w-9/12">
                            <label class="mb-2 text-lg font-bold text-blue-700" for="confirmacion_contraseña">Confirmar contraseña</label>
                            <input class="block w-full p-2 px-3 py-4 text-gray-700 bg-gray-100 border border-gray-300 border-opacity-50 rounded-md shadow-md focus:outline-none focus:border-gray-500" id="confirmacion_contraseña" type="password" placeholder="Mínimo 8 caracteres...">
                        </div>

                        <div class="flex items-center justify-between w-full my-10 mb-4 md:w-9/12">
                            <button class="w-full px-3 py-4 leading-tight text-white bg-blue-500 border rounded shadow appearance-none custom-boton hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
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

</body>

</html>


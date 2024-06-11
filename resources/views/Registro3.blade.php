<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, html {
            overflow-y: hidden; /* Evitar scroll vertical */
        }

        .custom-shadow {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.6); /* Ajusta los valores según sea necesario */
        }

        .fade {
    transition: opacity 0.60s ease-in-out;
        }
        .fade-out {
            opacity: 0;
        }


    </style>
</head>

<body>
    <div class="flex justify-center items-center pb-96 px-80 pt-36">
        <div class="flex flex-col md:flex-row md:w-full">
            <!-- Primera columna de texto -->
            <div class="w-full md:pr-8 border-r-2 border-blue-700">
                <div>
                    <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="user_avatar">Tipo de movilidad y modalidad</label>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center text-white bg-blue-500 px-6 py-4 rounded">
                            <span>Entrantes</span>
                            <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M10.271 5.575C8.967 4.501 7 5.43 7 7.12v9.762c0 1.69 1.967 2.618 3.271 1.544l5.927-4.881a2 2 0 0 0 0-3.088l-5.927-4.88Z" clip-rule="evenodd"/>
                            </svg>
                            <div></div>
                        </div>

                        <div class="flex items-center gap-2 px-6 py-4 md:pr-8 border-r-2 h-1 border-blue-700" style="border-right: 1px solid border;">
                            <label for="virtual" class="ml-2 text-gray-700">Virtual</label>
                            <input type="checkbox" id="virtual" name="virtual" value="modalidad" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                        </div>

                        <div class="flex items-center gap-2 px-6 py-4">
                            <label for="presencial" class="ml-2 text-gray-700">Presencial</label>
                            <input type="checkbox" id="presencial" name="presencial" value="modalidad" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                        </div>
                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="user_avatar">Tipo de rol</label>
                        <input type="text" id="numero_documento" name="numero_documento" placeholder="Pais o codigo postal..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">
                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="actividad">Actividad que se realiza</label>
                        <input type="text" id="actividad" name="actividad" placeholder="Nombre del evento a participar" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">
                    </div>
                </div>
                <br><br>
                <button type="button" id="retroceder-boton" class="text-white bg-blue-800 from-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold text-end px-20 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Regresar</button>
            </div>

            <!-- Segunda columna de texto -->
            <div class="w-full md:pl-8">
                <div class="w-full flex items-center">
                    <div class="mr-1 w-full">
                        <div>
                            <label for="selectOptions" class="block mb-2 text-xl font-bold text-blue-800 dark:text-white">Elige una opción:</label>
                            <select id="selectOptions" class="block w-44 py-3 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Ruta</option>
                                <option value="opcion1">Opción 1</option>
                                <option value="opcion2">Opción 2</option>
                                <option value="opcion3">Opción 3</option>
                                <option value="opcion4">Opción 4</option>
                                <option value="opcion5">Opción 5</option>
                                <option value="opcion6">Opción 6</option>
                            </select>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br>
                        <div class="flex justify-end">
                            <button id="siguiente-boton" class="text-white bg-blue-800 from-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-20 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex-jus">Finalizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('retroceder-boton').addEventListener('click', function(event) {
        event.preventDefault();
        var campos = document.querySelector('.campos');

        // Agregar la clase 'fade' y 'fade-out' para iniciar la animación
        campos.classList.add('fade');
        campos.classList.add('fade-out');

        // Esperar a que la animación termine antes de redirigir
        campos.addEventListener('transitionend', function() {
            window.location.href = "{{ route('welcome') }}";
        }, { once: true }); // 'once: true' para asegurarnos de que se ejecute una sola vez
    });
    </script>
</body>

</html>

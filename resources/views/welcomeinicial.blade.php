<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, html {
            overflow-y: hidden; /* Evitar scroll vertical */
        }
        .custom-shadow {
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.6); /* Ajusta los valores según sea necesario */
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

    </style>
</head>

<body>

    <div class="conatiner h-full">
        <img class="w-full h-full rounded-bl-2xl rounded-br-2xl shadow-2xl custom-shadow" src="{{ asset('images/banner.jpg') }}" alt="Banner Image" />
    </div>

<div class="campos">
    <div class="flex justify-center items-center  pb-96 px-80 pt-36">
        <div class="flex flex-col md:flex-row md:w-full">
            <!-- Primera columna de texto -->
            <div class="w-full  md:pr-8 border-r-2 border-blue-700 ">
                <div class="">
                    <div>
                        <label class=" block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="numero_documento" >Nombre completo </label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre y apellido..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="user_avatar">Nacionalidad</label>
                        <input type="text" id="numero_documento" name="numero_documento" placeholder="Pais o codigo postal..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                            for="user_avatar">Fecha de nacimiento</label>
                            <input type="date" id="numero_documento" name="numero_documento" placeholder="Nombre del evento a participar" class="shadow-md rounded-md p-2 block w-56 py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">


                    </div>
                </div>

                <br>
                <br>
                <button type="button" class="text-white bg-blue-800 from-blue-800 focus:ring-4 shadow-md rounded-bl-sm rounded-br-sm rounded-tl-sm rounded-tr-sm focus:ring-blue-300 font-semibold  text-end px-20 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Regresar</button>
            </div>

            <!-- Segunda columna de texto -->
            <div class="w-full md:pl-8 ">
                <div class="w-full flex items-center"> <!-- esto es para aliniar 2 contenedores-->
                    <div class="mr-1 w-full">
                        <div class="flex items-center mb-4">
                            <div class="mr-4">
                                <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                                for="user_avatar">Tipo de Documento</label>
                                <select id="document_type" name="document_type" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">
                                    <option value="tarjeta_de_identidad">Tarjeta de identidad</option>
                                    <option value="cedula_de_ciudadania">Cédula de ciudadanía</option>
                                    <option value="pasaporte">Pasaporte</option>
                                    <option value="cedula_de_extranjeria">Cédula de extranjería</option>
                                    <option value="visa">Visa</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>
                            <div>
                                <label for="document_number" class="block text-gray-700"></label>
                                <input type="text" id="document_number" name="document_number" class=" mt-8 shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500" placeholder="Ingrese el número del documento">
                            </div>
                        </div>

                        <br>

                        <div class="mb-4 w-full">
                            <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                            for="documento_pdf">Documento de PDF</label>
                            <div class="file-upload-container">
                                <label for="file-upload" class="file-upload-label">Seleccionar archivo</label>
                                <input type="file" id="file-upload" class="file-upload-input" accept="application/pdf">
                                <span class="file-upload-description">Fotos de ambas caras del documento en PDF</span>
                            </div>
                        </div>
                        <br>

                        <div>
                            <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                                for="user_avatar">Fecha de expedicion de docuemnto</label>
                                <input type="date" id="numero_documento" name="numero_documento" placeholder="Psicologia,Ingenieria de sistemas,Contaduria..." class="shadow-md rounded-md p-2 block w-56 py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                        </div>
                        <br>
                        <br>
                        <div class="flex justify-end">
                            <button id="siguiente-boton"  class="shadow-md rounded-bl-sm rounded-br-sm rounded-tl-sm rounded-tr-sm text-white bg-blue-800 from-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-20 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex-jus">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#siguiente-boton').click(function(event) {
            event.preventDefault();

            // Obtener la URL de la vista que deseas cargar
            var url = "{{ route('Registro3') }}"; // Cambia 'Registro3' por la ruta de la vista que deseas cargar

            // Realizar la solicitud AJAX
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    // Antes de realizar la solicitud, ocultar el div 'campos' con un efecto de desvanecimiento
                    $('.campos').fadeOut('80');
                },
                success: function(response) {
                    // Una vez que se recibe la respuesta (nueva vista), reemplazar el contenido del div 'campos' con la nueva vista
                    $('.campos').html(response);

                    // Después de reemplazar el contenido, mostrar el div 'campos' con un efecto de aparición
                    $('.campos').fadeIn('80');
                }
            });
        });
    });
</script>



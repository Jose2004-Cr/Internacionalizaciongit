<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, html {
            overflow-y: hidden; /* Evitar scroll vertical */
        }
        .custom-shadow {
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.6); /* Ajusta los valores según sea necesario */
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
                        <label class=" block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="numero_documento" >Direccion de residencia</label>
                        <input type="text" id="numero_documento" name="numero_documento" placeholder="Carrera" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white" for="user_avatar">Direccion de hospedaje</label>
                        <input type="text" id="numero_documento" name="numero_documento" placeholder="Pais o codigo postal..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                    </div>
                    <br>
                    <div>
                        <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                            for="user_avatar">Evento asistido</label>
                            <input type="text" id="numero_documento" name="numero_documento" placeholder="Nombre del evento a participar" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">


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
                        <div>
                            <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                                for="user_avatar">Institucion origen</label>
                                <input type="text" id="numero_documento" name="numero_documento" placeholder="Pais o codigo postal..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                        </div>

                        <br>

                        <div>
                            <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                                for="user_avatar">Institucion Destino</label>
                                <input type="text" id="numero_documento" name="numero_documento" placeholder="Número de documento" class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

                        </div>

                        <br>

                        <div>
                            <label class="block mb-2 text-xl font-bold text-blue-800 dark:text-white"
                                for="user_avatar">Programa al que atributa el evento</label>
                                <input type="text" id="numero_documento" name="numero_documento" placeholder="Psicologia,Ingenieria de sistemas,Contaduria..." class="shadow-md rounded-md p-2 block w-full py-4 px-3 bg-gray-100 border border-gray-300 border-opacity-50 text-gray-700 focus:outline-none focus:border-gray-500">

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






<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- drawer init and toggle -->

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    #drawer-body-scrolling {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 0;
        width: 3%;
        height: 100vh;
        padding: 10px;
        overflow-y: auto;
        transition: width 0.3s ease, background-color 0.3s ease;
        background-color: #C82333;
    }
    #drawer-body-scrolling:hover {
        width: 8%;
    }
    #drawer-body-scrolling-label {
        text-align: center;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: bold;
        font-size: 0.8rem;
    }
    .drawer-content {
        display: flex;
        flex-direction: column;
        height: calc(100% - 40px);
        justify-content: space-between;
    }
    .drawer-content ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .drawer-content li {
        margin-bottom: 20px;
    }
    .drawer-content a {
        display: flex;
        align-items: center;
        padding: 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .drawer-content a:hover {
        background-color: #a61e2b;
        transform: scale(0.9);
    }
    .drawer-content img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        transition: transform 0.3s ease;
    }
    .drawer-content a:hover img {
        transform: scale(0.8);
    }
    .logout {
        margin-top: auto;
    }
    @media (max-width: 100px) {
        #drawer-body-scrolling {
            width: 6%;
        }
        #drawer-body-scrolling:hover {
            width: 15%;
        }
    }
    @media (max-width: 200px) {
        #drawer-body-scrolling {
            width: 8%;
        }
        #drawer-body-scrolling:hover {
            width: 20%;
        }
    }
</style>
</head>
<body>

<div id="drawer-body-scrolling">
<h5 id="drawer-body-scrolling-label">ℍ𝕖𝕣𝕞𝕖𝕤</h5>
<div class="drawer-content">
    <ul>
        <li>
            <a href="#" onclick="estadisticas()" id="showContent">
                <img src="/Imagenes/tabladasb.png" aria-hidden="true">
                <span class="expand-text">𝔼𝕤𝕥𝕒𝕕𝕚𝕤𝕥𝕚𝕔𝕒</span>
            </a>
        </li>
        <li>
            <a href="#" onclick="home()" id="showContent">
                <img src="/Imagenes/casadasb.png" aria-hidden="true">
                <span class="expand-text">ℍ𝕠𝕞𝕖</span>
            </a>
        </li>
        <li>
            <a href="#" onclick="calendario()">
                <img src="/Imagenes/calendariobasb.png" aria-hidden="true">
                <span class="expand-text">ℂ𝕒𝕝𝕖𝕟𝕕𝕒𝕣𝕚𝕠</span>
            </a>
        </li>
    </ul>
    <ul class="logout">
        <li>
            <a href="#" onclick="logout()">
                <img src="/Imagenes/salirbasb.png" aria-hidden="true">
                <span class="expand-text">𝕊𝕚𝕘𝕟 𝕠𝕗𝕗</span>
            </a>
        </li>
    </ul>
</div>
</div>

<script>
function logout() {
    fetch('/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                window.location.href = '/';
            } else {
                alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
            }
        })
        .catch(error => {
            alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
            console.error(error);
        });
}
</script>

</body>

<BR></BR>
{{-- aqui va el contenido de la estadistica --}}
<div id="estadisticas" style="display: block">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Feather Icons -->
    <link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .icon-xxs {
            width: 1rem;
            height: 1rem;
        }

        .icon-xs {
            width: 1.25rem;
            height: 1.25rem;
        }
    </style>
    </head>

    <body class="bg-gray-100">
        <main class="container p-4 mx-auto">
            <!-- Desempeño de los últimos 30 días -->
            {{-- <div class="mb-5">
                <div class="p-4 bg-white rounded-lg shadow">
                    <small class="flex items-center">
                        <span class="mr-1 mdi mdi-lightbulb-outline"></span> ¿Cómo se desempeñó durante los últimos 30 días?
                    </small>
                </div>
            </div> --}}

            <!-- Resumen Financiero -->
            <div class="grid grid-cols-1 gap-4 mb-5 md:grid-cols-2 lg:grid-cols-4">
                <div class="p-4 bg-blue-200 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Ingreso Local</h4>
                    <p class="text-2xl font-bold">15,300</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 5% Mas en el ultimo mes
                    </p>
                </div>
                <div class="p-4 bg-red-300 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Video Eventos</h4>
                    <p class="text-2xl font-bold">5,500</p>
                    <p class="text-red-600"><i data-feather="arrow-down" class="icon-xxs"></i> 3% desde el último mes
                    </p>
                </div>
                <div class="p-4 bg-blue-200 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Poblacion Institucional</h4>
                    <p class="text-2xl font-bold">22,800</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 8% desde el último mes
                    </p>
                </div>
                <div class="p-4 bg-blue-200 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Nuevos Usuarios</h4>
                    <p class="text-2xl font-bold">1,540</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 10% desde el último mes
                    </p>
                </div>
            </div>
            <!-- Gráficos de líneas de ingresos y gastos -->
            <div class="grid grid-cols-1 gap-4 mb-5 md:grid-cols-2">
                <div class="p-4 bg-white rounded-lg shadow">
                    <h4 class="mb-4 text-xl font-semibold"></h4>
                    <div id="chart-revenue" class="h-80">
                        <div>
                            <div class="flex justify-between mb-3">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                                            DIAGRAMA
                                            DE
                                            BARRAS
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Contenedor del gráfico -->
                            <div id="column-chart" class="mt-10">
                                <canvas></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-white rounded-lg shadow">
                    <div id="chart-expenses" class="relative h-80">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                                        DIAGRAMA DE PASTEL
                                    </h5>
                                    <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                        class="w-4 h-4 text-gray-500 cursor-pointer dark:text-gray-400 hover:text-gray-900 dark:hover:text-white ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 21.5c-6.627 0-12-5.373-12-12s5.373-12 12-12 12 5.373 12 12-5.373 12-12 12zm1-8v-6h-2v6h2zm0 4v-2h-2v2h2z" />
                                    </svg>
                                    <div data-popover id="chart-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Estadística de
                                                Tablas
                                            </h3>
                                            <p>Aquí se verá reflejado el porcentaje de estudiantes registrados en los
                                                eventos
                                                realizados por la institución universitaria, Tecnológico Comfenalco,
                                                todo esto
                                                mostrado en el número de meses.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Table Statistics
                                            </h3>
                                            <p>Here the percentage of students registered in the events held by the
                                                university
                                                institution, Tecnológico Comfenalco, will be reflected, all shown in the
                                                number
                                                of months.</p>
                                            <a href="#"
                                                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Statistics
                                                <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg></a>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Aquí agregarías el código para el gráfico de pastel, por ejemplo usando una librería como Chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <div style="width: 300px; margin: 0 auto;">
                            <canvas id="myPieChart"></canvas>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Datos para el gráfico de pastel
                                const data = {
                                    labels: ['Presencial', 'Virtual', 'Sin Asignar'],
                                    datasets: [{
                                        data: [30, 40, 30], // Valores para cada sección del pastel
                                        backgroundColor: [
                                            'rgb(255, 99, 132)', // Color para la sección roja
                                            'rgb(54, 162, 235)', // Color para la sección azul
                                            'rgb(75, 192, 192)' // Color para la sección verde
                                        ]
                                    }]
                                };

                                // Configuración del gráfico
                                const config = {
                                    type: 'pie',
                                    data: data,
                                    options: {
                                        responsive: true,
                                        animation: {
                                            animateRotate: true, // Animación de rotación
                                            animateScale: true // Animación de escalado
                                        },
                                        plugins: {
                                            legend: {
                                                position: 'top', // Posición de la leyenda
                                            },
                                            title: {
                                                display: true,
                                                text: 'Mi Gráfico de Pastel' // Título del gráfico
                                            }
                                        }
                                    },
                                };

                                // Obtener el contexto del lienzo del gráfico
                                var ctx = document.getElementById('myPieChart').getContext('2d');

                                // Crear instancia del gráfico
                                var myPieChart = new Chart(ctx, config);
                            });
                        </script>

                    </div>
                </div>

            </div>

            <!-- Usuarios por país y mapa interactivo -->
            <div class="mb-5">
                <div class="p-4 bg-white rounded-lg shadow">
                    <h4 class="mb-4 text-xl font-semibold">Usuarios por país</h4>
                    <div class="flex flex-wrap">
                        <div class="w-full p-4 bg-white rounded-lg shadow-md xl:w-1/3">
                            <h2 class="mb-4 text-2xl font-semibold">Países y Colores</h2>
                            <div class="scrollable-table">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 border">País</th>
                                            <th class="px-4 py-2 border">Color</th>
                                        </tr>
                                    </thead>
                                    <tbody id="country-table">
                                        <!-- Filas de países se agregarán dinámicamente aquí -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="w-full mb-4 xl:w-7/12 lg:w-6/12 lg:mb-0">
                            <div class="relative w-full xl:w-2/3 h-96 watermark" id="location">
                                INTERNACIONALIZACIO-TECNOLOGICO COMFENALCO
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Páginas de destino del sitio web -->
            <div class="mb-5">
                <div class="p-4 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold">Eventos Proximos</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-2">Página de destino</th>
                                    <th class="py-2 text-right"></th>


                                </tr>
                            </thead>
                            <tbody>


                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table
                                        class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all-search" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-all-search"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Nombre Evento
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Color
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Modalidad
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Avilitado
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Estado
                                                </th>
                                                <th scope="col" class="px-6 py-3">

                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Editar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-1" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Internacionalizacio
                                                </th>
                                                <td class="px-6 py-4">
                                                    blue
                                                </td>
                                                <td class="px-6 py-4">
                                                    Virtual
                                                </td>
                                                <td class="px-6 py-4">
                                                    2022-12-12
                                                </td>
                                                <td class="px-6 py-4">
                                                    Yes
                                                </td>
                                                <td class="px-6 py-4">
                                                    Activo
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-2" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-2"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Microsoft Activation
                                                </th>
                                                <td class="px-6 py-4">
                                                    black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2024-05-12
                                                </td>
                                                <td class="px-6 py-4">
                                                    Yes
                                                </td>
                                                <td class="px-6 py-4">
                                                    Activo
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-3" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2025-01-28
                                                </td>
                                                <td class="px-6 py-4">
                                                    No
                                                </td>
                                                <td class="px-6 py-4">
                                                    Bloqueado
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-3" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2025-01-28
                                                </td>
                                                <td class="px-6 py-4">
                                                    No
                                                </td>
                                                <td class="px-6 py-4">
                                                    Bloqueado
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-3" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2025-01-28
                                                </td>
                                                <td class="px-6 py-4">
                                                    No
                                                </td>
                                                <td class="px-6 py-4">
                                                    Bloqueado
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-3" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2025-01-28
                                                </td>
                                                <td class="px-6 py-4">
                                                    No
                                                </td>
                                                <td class="px-6 py-4">
                                                    Bloqueado
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-3" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Presencial
                                                </td>
                                                <td class="px-6 py-4">
                                                    2025-01-28
                                                </td>
                                                <td class="px-6 py-4">
                                                    No
                                                </td>
                                                <td class="px-6 py-4">
                                                    Bloqueado
                                                </td>
                                                <td class="px-6 py-4">

                                                </td>
                                                <td class="flex items-center px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a href="#"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- AlpineJS for Interactivity -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
        <!-- Feather Icons -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <!-- Chart.js for Charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Your chart configuration here -->
        <script>
            // Chart de tráfico
            const ctxTraffic = document.getElementById('chart-traffic').getContext('2d');
            const trafficChart = new Chart(ctxTraffic, {
                type: 'doughnut',
                data: {
                    labels: ['Directo', 'Orgánico', 'Referido', 'Social'],
                    datasets: [{
                        data: [12, 19, 3, 5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });

            // Chart de ingresos mensuales
            const ctxRevenue = document.getElementById('chart-revenue').getContext('2d');
            const revenueChart = new Chart(ctxRevenue, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                    datasets: [{
                        label: 'Ingresos',
                        data: [12000, 15000, 18000, 22000, 17000, 19000, 21000],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart de gastos mensuales
            const ctxExpenses = document.getElementById('chart-expenses').getContext('2d');
            const expensesChart = new Chart(ctxExpenses, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                    datasets: [{
                        label: 'Gastos',
                        data: [9000, 11000, 8000, 9500, 10500, 10000, 12000],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <!-- Leaflet.js for Maps -->
        <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet.vectorgrid/dist/Leaflet.VectorGrid.bundled.js"></script>
        <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
        <style>
            #location {
                width: 100%;
                height: 500px;
                position: relative;
            }

            .leaflet-container {
                border-radius: 0.5rem;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            }

            .scrollable-table {
                max-height: 400px;
                overflow-y: auto;
            }

            .leaflet-container .leaflet-control-attribution {
                display: none;
            }

            .watermark {
                position: absolute;
                bottom: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.7);
                padding: 5px;
                font-size: 12px;
                z-index: 1000;
            }
        </style>
        </head>

        <body class="flex flex-col items-center justify-center min-h-screen p-4 bg-gray-100">
            <div class="flex flex-col w-full gap-4 xl:flex-row xl:w-11/12 lg:w-10/12">
            </div>
            <script>
                // Inicializar el mapa centrado en Cartagena
                var map = L.map('location', {
                    fullscreenControl: true
                }).setView([10.39972, -75.51444], 13);

                // Añadir capa de mapa base con un estilo minimalista
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: false
                }).addTo(map);

                // Coordenadas y nombres de las sedes de la Universidad Tecnológico Comfenalco
                var locations = [{
                        coords: [10.39225, -75.48421],
                        name: 'Sede Principal'
                    },
                    {
                        coords: [10.39568, -75.49543],
                        name: 'Sede Norte'
                    },
                    {
                        coords: [10.40353, -75.51367],
                        name: 'Sede Sur'
                    }
                ];

                // Agregar marcadores al mapa con estilo personalizado
                locations.forEach(function(location) {
                    L.marker(location.coords).addTo(map)
                        .bindPopup('<b>' + location.name + '</b><br>Universidad Tecnológico Comfenalco.');
                });

                // Cargar datos GeoJSON para los países y aplicar colores suaves
                fetch('https://raw.githubusercontent.com/datasets/geo-countries/master/data/countries.geojson')
                    .then(response => response.json())
                    .then(data => {
                        var colors = {};
                        var colorIndex = 0;
                        var pastelColors = ['#FFD1DC', '#FF9A8B', '#FF96A8', '#FFC1A6', '#FFD5A5', '#E2F0CB', '#B5EAD7',
                            '#C7CEEA'
                        ];

                        L.geoJson(data, {
                            style: function(feature) {
                                var countryName = feature.properties.ADMIN;
                                if (!colors[countryName]) {
                                    colors[countryName] = pastelColors[colorIndex % pastelColors.length];
                                    colorIndex++;
                                }
                                return {
                                    color: colors[countryName],
                                    weight: 1,
                                    fillColor: colors[countryName],
                                    fillOpacity: 0.6
                                };
                            }
                        }).addTo(map);

                        // Agregar datos a la tabla de países
                        var tableBody = document.getElementById('country-table');
                        for (var country in colors) {
                            var row = document.createElement('tr');
                            var countryCell = document.createElement('td');
                            countryCell.className = 'border px-4 py-2';
                            countryCell.textContent = country;
                            var colorCell = document.createElement('td');
                            colorCell.className = 'border px-4 py-2';
                            colorCell.style.backgroundColor = colors[country];
                            row.appendChild(countryCell);
                            row.appendChild(colorCell);
                            tableBody.appendChild(row);
                        }
                    });

                // Mejorar la funcionalidad del mapa
                map.scrollWheelZoom.disable(); // Desactivar zoom con la rueda del ratón
                map.on('click', function() {
                    map.scrollWheelZoom.enable(); // Activar zoom con la rueda del ratón al hacer clic en el mapa
                });
                map.on('mouseout', function() {
                    map.scrollWheelZoom.disable(); // Desactivar zoom con la rueda del ratón al salir del mapa
                });
            </script>
        </body>

</div>

{{-- aqui va el contenido del home --}}
<div class="bg-white rounded-lg shadow p-21">
    <div id="home" style="display: none">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Agregando Feather Icons -->
    <link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.css" rel="stylesheet">
    <!-- Agregando Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Estilos adicionales -->
    <style>
        /* Estilos para los iconos */
        .icon-xxs {
            width: 1rem;
            height: 1rem;
        }

        .icon-xs {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Estilos para el botón flotante */
        .floating-button {
            position: fixed;
            bottom: 50px;
            right: 50px;
        }

        /* Estilos para los eventos recientes */
        .recent-events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }

        .event-card {
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
        }

        .event-card-placeholder {
            border: 2px dashed #ccc;
            color: #ccc;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>

    <body class="bg-gray-100">
        <!-- Contenedor principal -->
        <main class="container p-4 mx-auto">
            <div class="p-8 bg-white rounded-lg shadow">
                <!-- Sección de búsqueda y creación de eventos -->
                <div id="home">
                    <div class="flex items-center justify-between my-10">
                        <!-- Formulario de búsqueda de eventos -->
                        <form id="searchForm" class="flex items-center space-x-4">
                            <label for="searchInput" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                            <div class="relative">
                                <input type="search" id="searchInput"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Buscar contenido..." required />
                                <button type="submit"
                                    class="absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-white">Buscar</button>
                            </div>
                        </form>

                        <!-- Botón para crear evento -->
                        <button id="createEventButton"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Registrar
                            eventos +</button>

                        <!-- Botón de tipo de actividad -->
                        <div class="relative">
                            <button id="activityTypeButton"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Tipo
                                de actividad ➤</button>
                            <div id="activityTypeDropdown"
                                class="absolute hidden w-64 py-2 mt-2 bg-white rounded-lg shadow-lg">
                                <p class="px-4 py-2 text-gray-700">Rol</p>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Docente</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Estudiante</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Empresario</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Otro</a>
                                <hr>
                                <p class="px-4 py-2 text-gray-700">Actividad que se realiza</p>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Ruta</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Ponencia</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Clase espejo</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cátedra
                                    abierta</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Congreso</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">COIL</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Convenio</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Reunión</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
                                    deportiva</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
                                    multicultural</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Pasantía
                                    investigativa</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Curso en
                                    línea</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
                                    bilingüe/multilingüe</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Proyecto de
                                    aula</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Intercambio
                                    semestral</a>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de eventos recientes -->
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h2 class="mb-4 text-lg font-semibold">Agregados recientes..</h2>
                        <div id="recentEventsContainer" class="recent-events-grid">
                            <div class="event-card">Ejemplo 1</div>
                            <div class="event-card">Ejemplo 2</div>
                            <div class="event-card">Ejemplo 3</div>
                            <div class="event-card">Ejemplo 4</div>
                            <div class="event-card-placeholder">En espera...</div>
                        </div>
                    </div>

                    <!-- Tabla de eventos -->
                    <div class="mt-8 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Curso
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Rol
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Teléfono
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="eventsTableBody" class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Evento 1</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Curso 1</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Estado 1</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Rol 1</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">email1@example.com</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">1234567890</td>
                                    <td
                                        class="flex items-center justify-around px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Editar</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Eliminar</a>
                                    </td>
                                </tr>
                                <!-- Más filas de eventos -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Botón flotante para crear evento -->
            <button id="floatingCreateEventButton"
                class="hidden px-6 py-3 font-medium text-white bg-blue-700 rounded-full floating-button hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">+</button>
        </main>

        <!-- Modal para crear evento -->
        <div id="createEventModal"
            class="fixed inset-0 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
            <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-xl font-semibold">Crear Evento</h2>
                <form id="createEventForm">
                    <div class="mb-4">
                        <label for="eventName" class="block text-sm font-medium text-gray-700">Nombre del Evento</label>
                        <input type="text" id="eventName"
                            class="block w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="eventColor" class="block text-sm font-medium text-gray-700">Color del Evento</label>
                        <div id="colorPicker" class="flex space-x-2"> <button type="button"
                                class="w-10 h-10 bg-red-500 rounded-full focus:ring-4 focus:outline-none focus:ring-red-300"
                                data-color="#ef4444"></button> <button type="button"
                                class="w-10 h-10 bg-green-500 rounded-full focus:ring-4 focus:outline-none focus:ring-green-300"
                                data-color="#10b981"></button> <button type="button"
                                class="w-10 h-10 bg-blue-500 rounded-full focus:ring-4 focus:outline-none focus:ring-blue-300"
                                data-color="#3b82f6"></button> <button type="button"
                                class="w-10 h-10 bg-yellow-500 rounded-full focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                data-color="#f59e0b"></button> <button type="button"
                                class="w-10 h-10 bg-purple-500 rounded-full focus:ring-4 focus:outline-none focus:ring-purple-300"
                                data-color="#8b5cf6"></button> <button type="button"
                                class="w-10 h-10 bg-orange-500 rounded-full focus:ring-4 focus:outline-none focus:ring-orange-300"
                                data-color="#f97316"></button> <button type="button"
                                class="w-10 h-10 bg-pink-500 rounded-full focus:ring-4 focus:outline-none focus:ring-pink-300"
                                data-color="#ec4899"></button> <button type="button"
                                class="w-10 h-10 bg-teal-500 rounded-full focus:ring-4 focus:outline-none focus:ring-teal-300"
                                data-color="#14b8a6"></button> </div>
                        <input type="hidden" id="eventColor" name="eventColor" required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" id="cancelCreateEventButton"
                            class="text-gray-700 hover:text-gray-900">Cancelar</button>
                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">Crear</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const createEventButton = document.getElementById('createEventButton');
                const createEventModal = document.getElementById('createEventModal');
                const cancelCreateEventButton = document.getElementById('cancelCreateEventButton');
                const createEventForm = document.getElementById('createEventForm');
                const recentEventsContainer = document.getElementById('recentEventsContainer');
                const eventsTableBody = document.getElementById('eventsTableBody');
                const floatingCreateEventButton = document.getElementById('floatingCreateEventButton');
                const activityTypeButton = document.getElementById('activityTypeButton');
                const activityTypeDropdown = document.getElementById('activityTypeDropdown');
                const colorPickerButtons = document.querySelectorAll('#colorPicker button');
                const eventColorInput = document.getElementById('eventColor');

                // Mostrar modal para crear evento
                createEventButton.addEventListener('click', function() {
                    createEventModal.classList.remove('hidden');
                });

                // Ocultar modal para crear evento
                cancelCreateEventButton.addEventListener('click', function() {
                    createEventModal.classList.add('hidden');
                });

                // Manejar selección de color
                colorPickerButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        colorPickerButtons.forEach(btn => btn.classList.remove('ring-4',
                            'ring-offset-2'));
                        button.classList.add('ring-4', 'ring-offset-2');
                        eventColorInput.value = button.getAttribute('data-color');
                    });
                });

                // Manejar la creación de un nuevo evento
                createEventForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const eventName = document.getElementById('eventName').value;
                    const eventColor = eventColorInput.value;

                    // Aquí puedes agregar la lógica para guardar el evento en la base de datos

                    // Agregar el evento a la lista de eventos recientes
                    const eventCard = document.createElement('div');
                    eventCard.className = 'event-card';
                    eventCard.textContent = eventName;
                    eventCard.style.backgroundColor = eventColor;
                    recentEventsContainer.appendChild(eventCard);

                    // Agregar el evento a la tabla de eventos
                    const eventRow = document.createElement('tr');
                    eventRow.innerHTML = `
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${eventName}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Curso</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Estado</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Rol</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Email</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Teléfono</td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Editar</a>
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Eliminar</a>
                    </td>
                `;
                    eventsTableBody.appendChild(eventRow);

                    // Limpiar formulario y cerrar modal
                    createEventForm.reset();
                    createEventModal.classList.add('hidden');
                });

                // Función para cargar eventos recientes
                function cargarEventosRecientes() {
                    // Aquí puedes implementar la lógica para cargar eventos recientes desde la base de datos
                    console.log('Cargando eventos recientes...');
                }

                // Función para cargar todos los eventos
                function cargarTodosLosEventos() {
                    // Aquí puedes implementar la lógica para cargar todos los eventos desde la base de datos
                    console.log('Cargando todos los eventos...');
                }

                // Llamando a las funciones de carga de eventos al cargar la página
                cargarEventosRecientes();
                cargarTodosLosEventos();

                // Función para editar un evento
                function editarEvento(eventoId) {
                    // Aquí puedes implementar la lógica para editar un evento específico
                    console.log('Editando evento con ID:', eventoId);
                }

                // Función para eliminar un evento
                function eliminarEvento(eventoId) {
                    // Aquí puedes implementar la lógica para eliminar un evento específico
                    console.log('Eliminando evento con ID:', eventoId);
                }

                // Función para mostrar detalles de un evento
                function verDetallesEvento(eventoId) {
                    // Aquí puedes implementar la lógica para mostrar detalles de un evento específico
                    console.log('Mostrando detalles del evento con ID:', eventoId);
                }

                // Mostrar/Ocultar el desplegable de tipo de actividad
                activityTypeButton.addEventListener('click', function() {
                    activityTypeDropdown.classList.toggle('hidden');
                });

                // Ocultar el desplegable de tipo de actividad al hacer clic fuera
                document.addEventListener('click', function(event) {
                    if (!activityTypeButton.contains(event.target) && !activityTypeDropdown.contains(event
                            .target)) {
                        activityTypeDropdown.classList.add('hidden');
                    }
                });
            });
        </script>
    </body>

</div>

{{-- aqui va el contenido del calendario --}}
<div class="bg-white rounded-lg shadow p-21">
    <div id="calendario" style="display: none">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
        <style>
            [x-cloak] { display: none; }
            .notification {
                position: fixed;
                bottom: 16px;
                right: 16px;
                background-color: #4caf50;
                color: white;
                padding: 16px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                opacity: 0;
                transform: translateY(100%);
                transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            }
            .notification.show {
                opacity: 1;
                transform: translateY(0);
            }
            .event-detail {
                white-space: pre-wrap;
                word-wrap: break-word;
            }
        </style>
        <title>Calendario de Eventos</title>
    </head>
    <body class="font-sans antialiased bg-gray-100">

    <div x-data="calendarApp()" x-init="initializeCalendar()" x-cloak>
        <div class="container px-5 py-10 mx-auto">
            <div class="mb-5 text-3xl font-bold text-center text-gray-900">Calendario de Eventos</div>

            <div class="bg-white rounded-lg shadow">
                <div class="flex items-center justify-between px-6 py-4 text-white bg-blue-500">
                    <div>
                        <span x-text="MONTH_NAMES[month]" class="text-xl font-bold"></span>
                        <span x-text="year" class="ml-1 text-xl"></span>
                    </div>
                    <div class="flex items-center">
                        <button @click="changeMonth(-1)" :disabled="month == 0" class="p-2 mx-1 bg-blue-700 rounded-full hover:bg-blue-800 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button @click="changeMonth(1)" :disabled="month == 11" class="p-2 mx-1 bg-blue-700 rounded-full hover:bg-blue-800 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-7 gap-1 px-4 py-2 text-center">
                    <template x-for="day in DAYS" :key="day">
                        <div class="font-bold text-gray-800" x-text="day"></div>
                    </template>
                </div>

                <div class="grid grid-cols-7 gap-1 p-4 border-t border-gray-200">
                    <template x-for="blank in blankDays">
                        <div class="py-2"></div>
                    </template>
                    <template x-for="date in noOfDays" :key="date">
                        <div class="py-2">
                            <div @click="openEventModal(date)" class="w-8 h-8 mx-auto text-center cursor-pointer" :class="{'bg-blue-500 text-white': isToday(date), 'hover:bg-blue-200': !isToday(date)}">
                                <span x-text="date"></span>
                            </div>
                            <template x-for="event in events.filter(e => new Date(e.date).toDateString() === new Date(year, month, date).toDateString())">
                                <div class="p-1 mt-1 text-sm text-blue-800 truncate bg-blue-100 rounded cursor-pointer" @click="viewEvent(event)">
                                    <span x-text="event.title"></span>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-2xl font-bold" x-text="editMode ? 'Editar Evento' : 'Agregar Evento'"></h2>
                <form @submit.prevent="saveEvent">
                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700">Título</label>
                        <input type="text" x-model="eventTitle" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700">Fecha y Hora</label>
                        <input type="datetime-local" x-model="eventDateTime" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700">Categoría</label>
                        <select x-model="eventCategory" class="w-full px-3 py-2 border rounded-lg">
                            <option value="blue">Evento Azul</option>
                            <option value="red">Evento Rojo</option>
                            <option value="yellow">Evento Amarillo</option>
                            <option value="green">Evento Verde</option>
                            <option value="purple">Evento Púrpura</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700">Descripción</label>
                        <textarea x-model="eventDescription" class="w-full px-3 py-2 border rounded-lg" maxlength="200" rows="4" required></textarea>
                        <small x-text="200 - eventDescription.length + ' palabras restantes'"></small>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" @click="closeModal" class="px-4 py-2 mr-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancelar</button>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Event Detail Modal -->
        <div x-show="showEventDetail" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-2xl font-bold">Detalle del Evento</h2>
                <div class="mb-4">
                    <strong>Título:</strong>
                    <p x-text="viewingEvent.title"></p>
                </div>
                <div class="mb-4">
                    <strong>Fecha y Hora:</strong>
                    <p x-text="new Date(viewingEvent.date).toLocaleString()"></p>
                </div>
                <div class="mb-4">
                    <strong>Categoría:</strong>
                    <p x-text="viewingEvent.category"></p>
                </div>
                <div class="mb-4">
                    <strong>Descripción:</strong>
                    <p class="event-detail" x-text="viewingEvent.description"></p>
                </div>
                <div class="flex justify-end">
                    <button @click="editEvent(viewingEvent)" class="px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">Editar</button>
                    <button @click="deleteEvent(viewingEvent)" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Borrar</button>
                    <button type="button" @click="closeEventDetail" class="px-4 py-2 ml-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cerrar</button>
                </div>
            </div>
        </div>

        <!-- Notification -->
        <div x-show="showNotification" class="notification" x-text="notificationMessage"></div>
    </div>

    <script>
        const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const DAYS = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

        function calendarApp() {
            return {
                month: null,
                year: null,
                days: DAYS,
                events: JSON.parse(localStorage.getItem('events') || '[]'),
                eventTitle: '',
                eventDateTime: '',
                eventCategory: 'blue',
                eventDescription: '',
                showModal: false,
                showEventDetail: false,
                editMode: false,
                currentEventIndex: null,
                showNotification: false,
                notificationMessage: '',
                viewingEvent: {},

                initializeCalendar() {
                    const today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.calculateDays();
                    this.checkEvents();
                    setInterval(this.checkNotifications.bind(this), 60000); // Check notifications every minute
                },

                calculateDays() {
                    const daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                    const dayOfWeek = new Date(this.year, this.month, 1).getDay();
                    this.blankDays = Array(dayOfWeek === 0 ? 6 : dayOfWeek - 1).fill(null);
                    this.noOfDays = Array.from({ length: daysInMonth }, (v, i) => i + 1);
                },

                changeMonth(value) {
                    this.month += value;
                    if (this.month > 11) {
                        this.month = 0;
                        this.year++;
                    } else if (this.month < 0) {
                        this.month = 11;
                        this.year--;
                    }
                    this.calculateDays();
                    this.checkEvents();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString();
                },

                openEventModal(date) {
                    this.showModal = true;
                    this.editMode = false;
                    this.eventDateTime = new Date(this.year, this.month, date).toISOString().slice(0, 16);
                    this.eventTitle = '';
                    this.eventCategory = 'blue';
                    this.eventDescription = '';
                },

                closeModal() {
                    this.showModal = false;
                    this.editMode = false;
                },

                saveEvent() {
                    if (this.editMode) {
                        this.events[this.currentEventIndex] = {
                            title: this.eventTitle,
                            date: this.eventDateTime,
                            category: this.eventCategory,
                            description: this.eventDescription
                        };
                    } else {
                        this.events.push({
                            title: this.eventTitle,
                            date: this.eventDateTime,
                            category: this.eventCategory,
                            description: this.eventDescription
                        });
                    }
                    localStorage.setItem('events', JSON.stringify(this.events));
                    this.closeModal();
                    this.checkEvents();
                },

                viewEvent(event) {
                    this.showEventDetail = true;
                    this.viewingEvent = event;
                },

                closeEventDetail() {
                    this.showEventDetail = false;
                },

                editEvent(event) {
                    this.showModal = true;
                    this.editMode = true;
                    this.currentEventIndex = this.events.indexOf(event);
                    this.eventTitle = event.title;
                    this.eventDateTime = event.date;
                    this.eventCategory = event.category;
                    this.eventDescription = event.description;
                },

                deleteEvent(event) {
                    const index = this.events.indexOf(event);
                    if (index > -1) {
                        this.events.splice(index, 1);
                        localStorage.setItem('events', JSON.stringify(this.events));
                    }
                    this.closeEventDetail();
                    this.checkEvents();
                },

                checkEvents() {
                    const now = new Date();
                    this.events.forEach(event => {
                        const eventDate = new Date(event.date);
                        if (eventDate.toDateString() === now.toDateString()) {
                            this.showNotification = true;
                            this.notificationMessage = `Recordatorio: ¡Hoy es el evento "${event.title}"!`;
                            setTimeout(() => {
                                this.showNotification = false;
                            }, 5000);
                        }
                    });
                },

                checkNotifications() {
                    const now = new Date();
                    this.events.forEach(event => {
                        const eventDate = new Date(event.date);
                        const timeDifference = eventDate - now;
                        if (timeDifference <= 60000 && timeDifference > 0) { // Notify one minute before event
                            this.showNotification = true;
                            this.notificationMessage = `¡El evento "${event.title}" está a punto de comenzar!`;
                            setTimeout(() => {
                                this.showNotification = false;
                            }, 5000);
                        }
                    });
                }
            }
        }
    </script>
    </body>
    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz4gdUPxRDbBhm_SuctQwVTLrbvItdvMU"></script>
{{-- aqui va el contenido de la tabla de barras --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos para el gráfico de barras
    const data = {
        labels: ['Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Obtubre',
            'Novienbre'
        ],
        datasets: [{
            label: 'Eventos',
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            data: [100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950,
                1000
            ]
        }]
    };

    // Configuración del gráfico
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Inicializar el gráfico
    var myChart = new Chart(
        document.getElementById('column-chart').querySelector('canvas'),
        config
    );
</script>
{{-- AQUI VA EL CONTENIDO DEL DIAGRAMA DE PASTEL --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    let a = document.getElementById('calendario');
    let b = document.getElementById('estadisticas');
    let c = document.getElementById('home');

    function estadistica() {
        b.style.display = b.style.display === 'none' ? 'block' : 'none';
        a.style.display = 'none';
        c.style.display = 'none';
    }

    function calendario() {
        a.style.display = "block";
        b.style.display = 'none';
        c.style.display = 'none';
    }

    function home() {
        a.style.display = "none";
        b.style.display = 'none';
        c.style.display = 'block';
    }
</script>


<style>
    #drawer-body-scrolling {
        width: 160px;
        /* Ancho inicial */
        transition: width 0.3s;
        /* Transición suave */
    }

    #drawer-body-scrolling.expanded {
        width: 332px;
        /* Ancho expandido */
    }

    /* Ocultamos el texto mientras el panel está contraído */
    #drawer-body-scrolling:not(.expanded) .expand-text {
        display: none;
    }



    #contentinicio {
        position: absolute;
        right: 900px;
        /* Ajusta este valor según sea necesario */
        top: 100px;
        /* Ajusta este valor según sea necesario */
        background-color: white;
        /* Solo para claridad */
        padding: 0px;
        /* Solo para claridad */
        border: 1px solid #ffffff;
        /* Solo para claridad */
        z-index: 999;
        /* Asegura que el contenido esté encima de otros elementos */
    }

    #contentDiv {
        position: absolute;
        right: 950px;
        /* Ajusta este valor según sea necesario */
        top: 100px;
        /* Ajusta este valor según sea necesario */
        background-color: white;
        /* Solo para claridad */
        padding: 0px;
        /* Solo para claridad */
        border: 1px solid #ffffff;
        /* Solo para claridad */
        z-index: 999;
        /* Asegura que el contenido esté encima de otros elementos */
    }

    #contentDivu {
        position: absolute;
        right: 650px;
        /* Ajusta este valor según sea necesario */
        top: 100px;
        /* Ajusta este valor según sea necesario */
        background-color: white;
        /* Solo para claridad */
        padding: 0px;
        /* Solo para claridad */
        border: 1px solid #fffefe;
        /* Solo para claridad */
        z-index: 999;
        /* Asegura que el contenido esté encima de otros elementos */
    }

    #contentDivl {
        position: absolute;
        right: 350px;
        /* Ajusta este valor según sea necesario */
        top: 100px;
        /* Ajusta este valor según sea necesario */
        background-color: white;
        /* Solo para claridad */
        padding: 0px;
        /* Solo para claridad */
        border: 1px solid #fffefe;
        /* Solo para claridad */
        z-index: 999;
        /* Asegura que el contenido esté encima de otros elementos */
    }

    #contentD {
        position: absolute;
        right: 600px;
        /* Ajusta este valor según sea necesario */
        top: 300px;
        /* Ajusta este valor según sea necesario */
        background-color: white;
        /* Solo para claridad */
        padding: 0px;
        /* Solo para claridad */
        border: 1px solid #fffefe;
        /* Solo para claridad */
        z-index: 999;
        /* Asegura que el contenido esté encima de otros elementos */
    }

    #container {
        clear: left;
        max-width: 1000px;
        padding-top: 200px;
        background-color: ghostwhite;
        z-index: 999;
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    #pastel {
        position: fixed;
        right: 450px;
        /* Cambiado a 20px para moverlo más a la derecha */
        top: 150px;
        background-color: white;
        padding: 0px;
        border: 1px solid #fffefe;
        z-index: 999;
    }



    body {
        background-image: url('{{ asset('Imagenes/background.png') }}');
        background-size: cover;
        /* per adattare l'immagine allo schermo */
        background-repeat: no-repeat;
        /* per evitare che l'immagine si ripeta */
    }
</style>
<style>
    .fixed-element {
        position: fixed;
        right: calc(50vw - 600px);
        /* Ajusta el valor según tu preferencia */
        top: 155px;
        /* Ajusta el valor según tu preferencia */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para expandir el panel
        function expandDrawer() {
            document.getElementById('drawer-body-scrolling').classList.add('expanded');
        }

        // Función para contraer el panel
        function collapseDrawer() {
            document.getElementById('drawer-body-scrolling').classList.remove('expanded');
        }

        // Detectar cuando el cursor se mueve sobre el panel
        document.getElementById('drawer-body-scrolling').addEventListener('mouseenter', expandDrawer);

        // Detectar cuando el cursor sale del panel
        document.getElementById('drawer-body-scrolling').addEventListener('mouseleave', collapseDrawer);
    });
</script>

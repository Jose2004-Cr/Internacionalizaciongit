<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- drawer init and toggle -->

<div id="drawer-body-scrolling"
    class="rounded-r-lg fixed top-0 left-0 z-0 w-5 h-screen p-10 overflow-y-auto transition-transform bg-[#C82333] dark:bg-gray-800 hover:w-5">
    <h5 id="drawer-body-scrolling-label" class="text-base font-semibold text-gray-100 uppercase dark:text-gray-100">
        ℍ𝕖𝕣𝕞𝕖𝕤</h5>


    <div class="py-20 overflow-y-auto">
        <ul class="flex flex-col space-y-1">

            <!-- estadistica inicio -->

            <li>
                <a href="#" onclick="estadisticas()" id="showContent"
                    class="flex items-center w-full p-4 mb-20 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="contentinicio" data-collapse-toggle="contentinicio">
                    <img src="/Imagenes/tabladasb.png"
                        class="w-5 h-5 text-gray-100 transition duration-75 dark:text-gray-100 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true">
                    <span class="flex-1 ms-1 whitespace-nowrap expand-text">𝔼𝕤𝕥𝕒𝕕𝕚𝕤𝕥𝕚𝕔𝕒</span>

                </a>
            </li>

            <!-- casa -->
            <li>
                <a href="#" onclick="home()" id="showContent"
                    class="flex items-center w-full p-4 mb-20 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <img src="/Imagenes/casadasb.png"
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-100 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true">
                    <span class="flex-1 ms-1 whitespace-nowrap expand-text"> ℍ𝕠𝕞𝕖 </span>

                </a>
            </li>

            {{-- calendario --}}
            <li>
                <a href="#" onclick="calendario()"
                    class="flex items-center w-full p-4 mb-20 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <img src="/Imagenes/calendariobasb.png"
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-100 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true">
                    <span class="flex-1 ms-1 whitespace-nowrap expand-text"> ℂ𝕒𝕝𝕖𝕟𝕕𝕒𝕣𝕚𝕠 </span>
                </a>
            </li>

        </ul>
        <br>
        <ul class="font-medium spacei-y-20">
            {{-- Salir --}}
            <br>
            <li>
                <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:hover:bg-gray-700 group"
                    onclick="logout()">
                    <img src="/Imagenes/salirbasb.png"
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-100 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true">
                    <span class="flex-1 ms-1 whitespace-nowrap expand-text">𝕊𝕚𝕘𝕟 𝕠𝕗𝕗</span>
                </a>
            </li>

            <script>
                function logout() {
                    // Enviar solicitud de cierre de sesión al servidor
                    fetch('/logout', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Redirigir al usuario a la página de inicio
                                window.location.href = '/';
                            } else {
                                // Mostrar un mensaje de error
                                alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
                            }
                        })
                        .catch(error => {
                            // Mostrar un mensaje de error
                            alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
                            console.error(error);
                        });
                }
            </script>

        </ul>
    </div>
</div>

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
        <main class="container mx-auto p-4">
            <!-- Desempeño de los últimos 30 días -->
            <div class="mb-5">
                <div class="bg-white p-4 rounded-lg shadow">
                    <small class="flex items-center">
                        <span class="mdi mdi-lightbulb-outline mr-1"></span> ¿Cómo se desempeñó durante los últimos 30 días?
                    </small>
                </div>
            </div>

            <!-- Resumen Financiero -->
            <div class="mb-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Ingresos</h4>
                    <p class="text-2xl font-bold">$45,300</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 5% desde el último mes</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Gastos</h4>
                    <p class="text-2xl font-bold">$22,500</p>
                    <p class="text-red-600"><i data-feather="arrow-down" class="icon-xxs"></i> 3% desde el último mes</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Ganancias</h4>
                    <p class="text-2xl font-bold">$22,800</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 8% desde el último mes</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-lg font-semibold">Nuevos Usuarios</h4>
                    <p class="text-2xl font-bold">1,540</p>
                    <p class="text-green-600"><i data-feather="arrow-up" class="icon-xxs"></i> 10% desde el último mes</p>
                </div>
            </div>

            <!-- Gráficos de líneas de ingresos y gastos -->
            <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-xl font-semibold mb-4">Ingresos Mensuales</h4>
                    <div id="chart-revenue" class="h-80"></div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-xl font-semibold mb-4">Gastos Mensuales</h4>
                    <div id="chart-expenses" class="h-80"></div>
                </div>
            </div>

            <!-- Usuarios por país y mapa interactivo -->
            <div class="mb-5">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-xl font-semibold mb-4">Usuarios por país</h4>
                    <div class="flex flex-wrap">
                        <div class="w-full xl:w-7/12 lg:w-6/12 mb-4 lg:mb-0">
                            <div id="location" class="w-full h-96"></div>
                        </div>
                        <div class="w-full xl:w-5/12 lg:w-6/12">
                            <table class="w-full text-left">
                                <thead>
                                    <tr>
                                        <th class="pb-2">Primeras regiones</th>
                                        <th class="pb-2">Sesiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Estados Unidos</td>
                                        <td class="flex justify-between">
                                            <span>22,120</span>
                                            <span class="ml-4 text-gray-700">34.54%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>India</td>
                                        <td class="flex justify-between">
                                            <span>12,756</span>
                                            <span class="ml-4 text-gray-700">22.43%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Reino Unido</td>
                                        <td class="flex justify-between">
                                            <span>8,864</span>
                                            <span class="ml-4 text-gray-700">13.84%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Suecia</td>
                                        <td class="flex justify-between">
                                            <span>6,749</span>
                                            <span class="ml-4 text-gray-700">5.29%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rusia</td>
                                        <td class="flex justify-between">
                                            <span>5,523</span>
                                            <span class="ml-4 text-gray-700">4.54%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>México</td>
                                        <td class="flex justify-between">
                                            <span>3,214</span>
                                            <span class="ml-4 text-gray-700">3.12%</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Páginas de destino del sitio web -->
            <div class="mb-5">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold">Páginas de destino del sitio web</h4>
                        <a href="#!" class="text-sm text-blue-600 hover:text-blue-800">Exportar <i data-feather="arrow-down" class="icon-xxs"></i></a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-2">Página de destino</th>
                                    <th class="py-2 text-right">Sesiones</th>
                                    <th class="py-2 text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>/ <a href="#!" class="text-blue-600 hover:text-blue-800"><i data-feather="external-link" class="icon-xs"></i></a></td>
                                    <td class="text-right">5,056 <span class="text-green-600"><i data-feather="arrow-up" class="icon-xs"></i><span class="ml-1">1%</span></span></td>
                                    <td class="pl-0">
                                        <div class="h-2 bg-gray-200 relative">
                                            <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 100%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>/landings/courses.html <a href="#!" class="text-blue-600 hover:text-blue-800"><i data-feather="external-link" class="icon-xs"></i></a></td>
                                    <td class="text-right">2,385 <span class="text-red-600"><i data-feather="arrow-down" class="icon-xs"></i><span class="ml-1">1%</span></span></td>
                                    <td class="pl-0">
                                        <div class="h-2 bg-gray-200 relative">
                                            <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 80%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>/landings/lead.html <a href="#!" class="text-blue-600 hover:text-blue-800"><i data-feather="external-link" class="icon-xs"></i></a></td>
                                    <td class="text-right">1,985 <span class="text-green-600"><i data-feather="arrow-up" class="icon-xs"></i><span class="ml-1">1%</span></span></td>
                                    <td class="pl-0">
                                        <div class="h-2 bg-gray-200 relative">
                                            <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 66%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>/landings/hostings.html <a href="#!" class="text-blue-600 hover:text-blue-800"><i data-feather="external-link" class="icon-xs"></i></a></td>
                                    <td class="text-right">1,326 <span class="text-green-600"><i data-feather="arrow-up" class="icon-xs"></i><span class="ml-1">1%</span></span></td>
                                    <td class="pl-0">
                                        <div class="h-2 bg-gray-200 relative">
                                            <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 56%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>/landings/contacts.html <a href="#!" class="text-blue-600 hover:text-blue-800"><i data-feather="external-link" class="icon-xs"></i></a></td>
                                    <td class="text-right">865 <span class="text-red-600"><i data-feather="arrow-down" class="icon-xs"></i><span class="ml-1">1%</span></span></td>
                                    <td class="pl-0">
                                        <div class="h-2 bg-gray-200 relative">
                                            <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 19%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Análisis de tráfico -->
            <div class="mb-5">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold">Análisis de tráfico</h4>
                        <a href="#!" class="text-sm text-blue-600 hover:text-blue-800">Exportar <i data-feather="arrow-down" class="icon-xxs"></i></a>
                    </div>
                    <div id="chart-traffic" class="h-80"></div>
                </div>
            </div>

            <!-- Transacciones Recientes -->
            <div class="mb-5">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold">Transacciones Recientes</h4>
                        <a href="#!" class="text-sm text-blue-600 hover:text-blue-800">Ver todas <i data-feather="arrow-right" class="icon-xxs"></i></a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-2">Fecha</th>
                                    <th class="py-2">Descripción</th>
                                    <th class="py-2">Monto</th>
                                    <th class="py-2">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15/05/2024</td>
                                    <td>Venta de producto</td>
                                    <td>$500</td>
                                    <td><span class="text-green-600">Completado</span></td>
                                </tr>
                                <tr>
                                    <td>14/05/2024</td>
                                    <td>Pago de servicios</td>
                                    <td>$200</td>
                                    <td><span class="text-red-600">Pendiente</span></td>
                                </tr>
                                <tr>
                                    <td>13/05/2024</td>
                                    <td>Compra de inventario</td>
                                    <td>$1,500</td>
                                    <td><span class="text-green-600">Completado</span></td>
                                </tr>
                                <tr>
                                    <td>12/05/2024</td>
                                    <td>Suscripción mensual</td>
                                    <td>$99</td>
                                    <td><span class="text-green-600">Completado</span></td>
                                </tr>
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
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            var map = L.map('location').setView([51.505, -0.09], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add markers to the map here
            L.marker([51.5, -0.09]).addTo(map)
                .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                .openPopup();
        </script>
    </div>

    {{-- aqui va el contenido del home --}}
    <div id="home" style="display: none">
        <div class="flex justify-center my-10 space-x-40">
            {{-- Botton de buscar evento --}}
            <form class="max-w-md"> <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"> <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg> </div> <input type="search" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar Contenido..." required /> <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                </div>
            </form>

            {{-- Botton de registrar evento --}}
            <form class="max-w-md">
                <div class="relative">
                    <input type="search" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-20 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Registar Evento" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+</button>
                </div>
            </form>
            {{-- Botton Tipo de Actividades --}}

            <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button"> Tipo De Actividad <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdownDefaultCheckbox"
                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownCheckboxButton">
                    <li>
                        <!-- del botton menu -->
                        <div class="flex items-center">
                            <input checked id="checkbox-item-2" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-2"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Selecione Un
                                Tipo</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Actividad
                                Deportiva</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Ruta</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Ponencia</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Clase Espejo</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Catedra</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Abierta</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Congreso</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">COIL</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Convenio</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Reunión</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Actividad
                                Multicultural</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Pasantía
                                Investigativa</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Curso En
                                Linea</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Actividad
                                Bilingüe/Multilingüe </label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Proyecto De Aula
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Intercambio</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-3" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-3"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Semestral</label>
                        </div>
                    </li>
                </ul>
            </div>


    </div>
    <BR></BR>
    <div style="width: 100%; border: 1px solid #686767; padding: 100px; border-radius: 50px;">
        <p class="text-blue-100">Agregados Recienteme ...</p>
        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Blue</button>    </div>
 <BR></BR>
        {{-- contenido de tabla --}}
        <table class="min-w-full overflow-x-auto divide-y divide-gray-200">
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
                        Telefono
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Jane Cooper
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Tecnologico Confenalco</div>
                        <div class="text-sm text-gray-500">Optimization</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        Admin
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ejemplo1@gmail.com
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        +57 300 5482564
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>



                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Jhonatan smitt
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-300 rounded-full">
                            Inactivo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        Estudiante Extranjero
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ejemplo2@gmail.com
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        +70 105482564
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>



                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Juan Acosta
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Jorge Tadeo Lozano</div>
                        <div class="text-sm text-gray-500">Derecho</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        Estudiante
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ejemplo3@gmail.com
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        +57 321 5482564
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Nikoll Paloma
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Tecnologico Comfenalco</div>
                        <div class="text-sm text-gray-500">Psicologia</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        Estudiante
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ejemplo4@gmail.com
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        +57 311 5181564
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>

                <!-- More rows... -->

            </tbody>
        </table>
    </div>

    {{-- aqui va el contenido del calendario --}}
    <div id="calendario" style="display: none">

        <body class="antialiased bg-gray-100 sans-serif">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="container px-5 py-0 mx-auto md:py-10">

                    <div class="mb-5 text-xl font-bold text-gray-900">
                        Calendario De Evento
                    </div>

                    <div class="overflow-hidden bg-blue-100 rounded-lg shadow">

                        <div class="flex items-center justify-between px-6 py-2">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg font-normal text-gray-600"></span>
                            </div>
                            <div class="px-1 border rounded-lg" style="padding-top: 2px;">
                                <button type="button"
                                    class="inline-flex items-center p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                    :class="{ 'cursor-not-allowed opacity-25': month == 0 }"
                                    :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                    <svg class="inline-flex w-6 h-6 leading-none text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="inline-flex h-6 border-r"></div>
                                <button type="button"
                                    class="inline-flex items-center p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                    :class="{ 'cursor-not-allowed opacity-25': month == 11 }"
                                    :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                    <svg class="inline-flex w-6 h-6 leading-none text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div x-text="day"
                                            class="text-sm font-bold tracking-wide text-center text-gray-600 uppercase">
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%; height: 120px"
                                        class="px-4 pt-2 text-center border-b border-r"></div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%; height: 120px"
                                        class="relative px-4 pt-2 border-b border-r">
                                        <div @click="showEventModal(date)" x-text="date"
                                            class="inline-flex items-center justify-center w-6 h-6 leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                            :class="{
                                                'bg-blue-500 text-white': isToday(date) ==
                                                    true,
                                                'text-gray-700 hover:bg-blue-200': isToday(date) == false
                                            }">
                                        </div>
                                        <div style="height: 80px;" class="mt-1 overflow-y-auto">
                                            <!-- <div
                                                class="absolute top-0 right-0 inline-flex items-center justify-center w-6 h-6 mt-2 mr-2 text-sm leading-none text-white bg-gray-700 rounded-full"
                                                x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
                                                x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->

                                            <template
                                                x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">
                                                <div class="px-2 py-1 mt-1 overflow-hidden border rounded-lg"
                                                    :class="{
                                                        'border-blue-200 text-blue-800 bg-blue-100': event
                                                            .event_theme === 'blue',
                                                        'border-red-200 text-red-800 bg-red-100': event
                                                            .event_theme === 'red',
                                                        'border-yellow-200 text-yellow-800 bg-yellow-100': event
                                                            .event_theme === 'yellow',
                                                        'border-green-200 text-green-800 bg-green-100': event
                                                            .event_theme === 'green',
                                                        'border-purple-200 text-purple-800 bg-purple-100': event
                                                            .event_theme === 'purple'
                                                    }">
                                                    <p x-text="event.event_title"
                                                        class="text-sm leading-tight truncate"></p>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div style=" background-color: rgba(0, 0, 0, 0.8)"
                    class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full"
                    x-show.transition.opacity="openEventModal">
                    <div class="absolute left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
                        <div class="absolute top-0 right-0 inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-white rounded-full shadow cursor-pointer hover:text-gray-800"
                            x-on:click="openEventModal = !openEventModal">
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                            </svg>
                        </div>

                        <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">

                            <h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">Notas Para Eventos</h2>

                            <div class="mb-5">
                                <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Nota:</label>
                                <input
                                    class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-blue-500"
                                    type="text" x-model="event_title">
                            </div>

                            <div class="inline-block w-64 mb-4">
                                <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Seleccione Una
                                    Categoria</label>
                                <div class="relative">
                                    <select @change="event_theme = $event.target.value;" x-model="event_theme"
                                        class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded-lg appearance-none hover:border-gray-500 focus:outline-none focus:bg-white focus:border-blue-500">
                                        <template x-for="(theme, index) in themes">
                                            <option :value="theme.value" x-text="theme.label"></option>
                                        </template>

                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 text-right">
                                <button type="button"
                                    class="px-4 py-2 mr-2 font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100"
                                    @click="openEventModal = !openEventModal">
                                    Cancelar
                                </button>
                                <button type="button"
                                    class="px-4 py-2 font-semibold text-white bg-gray-800 border border-gray-700 rounded-lg shadow-sm hover:bg-gray-700"
                                    @click="addEvent()">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
            </div>

            <script>
                const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ];
                const DAYS = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

                function app() {
                    return {
                        month: '',
                        year: '',
                        no_of_days: [],
                        blankdays: [],
                        days: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],

                        events: [{
                                event_date: new Date(2020, 3, 1),
                                event_title: "April Fool's Day",
                                event_theme: 'blue'
                            },

                            {
                                event_date: new Date(2020, 3, 10),
                                event_title: "Birthday",
                                event_theme: 'red'
                            },

                            {
                                event_date: new Date(2020, 3, 16),
                                event_title: "Upcoming Event",
                                event_theme: 'green'
                            }
                        ],
                        event_title: '',
                        event_date: '',
                        event_theme: 'blue',

                        themes: [{
                                value: "blue",
                                label: "Evento Azul"
                            },
                            {
                                value: "red",
                                label: "Evento Rojo"
                            },
                            {
                                value: "yellow",
                                label: "Evento Amarillo"
                            },
                            {
                                value: "green",
                                label: "Evento Verde"
                            },
                            {
                                value: "purple",
                                label: "Evento Purpura"
                            }
                        ],

                        openEventModal: false,

                        initDate() {
                            let today = new Date();
                            this.month = today.getMonth();
                            this.year = today.getFullYear();
                            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                        },

                        isToday(date) {
                            const today = new Date();
                            const d = new Date(this.year, this.month, date);

                            return today.toDateString() === d.toDateString() ? true : false;
                        },

                        showEventModal(date) {
                            // open the modal
                            this.openEventModal = true;
                            this.event_date = new Date(this.year, this.month, date).toDateString();
                        },

                        addEvent() {
                            if (this.event_title == '') {
                                return;
                            }

                            this.events.push({
                                event_date: this.event_date,
                                event_title: this.event_title,
                                event_theme: this.event_theme
                            });

                            console.log(this.events);

                            // clear the form data
                            this.event_title = '';
                            this.event_date = '';
                            this.event_theme = 'blue';

                            //close the modal
                            this.openEventModal = false;
                        },

                        getNoOfDays() {
                            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                            // find where to start calendar day of week
                            let dayOfWeek = new Date(this.year, this.month).getDay();
                            let blankdaysArray = [];
                            for (var i = 1; i <= dayOfWeek; i++) {
                                blankdaysArray.push(i);
                            }

                            let daysArray = [];
                            for (var i = 1; i <= daysInMonth; i++) {
                                daysArray.push(i);
                            }

                            this.blankdays = blankdaysArray;
                            this.no_of_days = daysArray;
                        }
                    }
                }
            </script>
        </body>
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

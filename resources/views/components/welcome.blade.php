<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    .sidebar {
        width: 4rem;
        transition: width 0.3s ease-in-out;
        background: linear-gradient(135deg, #bd0b29, #860211);
        border-radius: 0 1rem 1rem 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .sidebar:hover {
        width: 10rem;
    }

    .expand-text {
        opacity: 0;
        transition: opacity 0.2s ease-in-out;
    }

    .sidebar:hover .expand-text {
        opacity: 1;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        color: white;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        border-radius: 0.5rem;
        margin: 0.5rem 0;
    }

    .sidebar-item img {
        width: 1.5rem;
        height: 1.5rem;
        margin-right: 0.5rem;
        transition: transform 0.3s ease-in-out;
    }

    .sidebar-item:hover {
        background-color: #480303;
        transform: scale(0.95);
    }

    .sidebar-item:hover img {
        transform: scale(1.1);
    }
</style>
</head>

<body class="bg-gray-100">
    <div class="fixed top-0 left-0 z-0 h-screen p-2 overflow-y-auto transition-all duration-300 ease-in-out sidebar">
        <h5 class="mb-2 text-xs font-bold text-center text-white uppercase">Hermes</h5>
        <div class="drawer-content flex flex-col h-[calc(100%-40px)] justify-between">
            <ul>
                <li class="mb-5">
                    <a href="#" onclick="estadisticas()" id="showContent" class="sidebar-item">
                        <img src="/images/estadisticassd.png" aria-hidden="true">
                        <span class="expand-text">Estadística</span>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="#" onclick="home()" id="showContent" class="sidebar-item">
                        <img src="\images\Eventosss.png" aria-hidden="true">
                        <span class="expand-text">Home</span>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="#" onclick="calendario()" class="sidebar-item">
                        <img src="\images\calendariofinal.png" aria-hidden="true">
                        <span class="expand-text">Calendario</span>
                    </a>
                </li>
            </ul>
            <ul class="mt-auto logout">
                <li class="mb-5">
                    <a href="#" onclick="logout()" class="sidebar-item">
                        <img src="\images\salirbasb.png" aria-hidden="true">
                        <span class="expand-text">Sign off</span>
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
    <link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.css" rel="stylesheet">
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
        .gradient-bg-1, .gradient-bg-2, .gradient-bg-3 {
            background: linear-gradient(135deg, #60A5FA, #041d64);
            color: white;
        }
        .barra-barra {
            margin-top: 20px;
        }
        .chart-container {
            height: 300px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <main class="container p-4 mx-auto">
        <div class="grid grid-cols-1 gap-4 mb-5 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-4 rounded-lg shadow gradient-bg-1">
                <h4 class="text-lg font-semibold">Definir</h4>
                <p class="text-2xl font-bold">0,000</p>
                <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> Definir</p>
            </div>
            <div class="p-4 rounded-lg shadow gradient-bg-2">
                <h4 class="text-lg font-semibold">Definir</h4>
                <p class="text-2xl font-bold">0,000</p>
                <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> Definir</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="p-4 rounded-lg shadow gradient-bg-3 chart-container">
                <h4 class="mb-4 text-xl font-semibold">Total de movilidades</h4>
                <div id="chart-revenue" class="px-1 h-70">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow">
                <h4 class="text-xl font-semibold text-gray-900">Total de movilidades</h4>
                <div id="chart-pie" class="flex justify-center">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="flex justify-center mt-4 text-gray-700">
                    <ul class="flex flex-wrap">
                        <li class="mr-4">
                            <span class="inline-block w-3 h-3 mr-2 rounded-full" style="background-color: #ff6384;"></span>
                            Entrante virtual
                        </li>
                        <li class="mr-4">
                            <span class="inline-block w-3 h-3 mr-2 rounded-full" style="background-color: #36a2eb;"></span>
                            Entrante presencial
                        </li>
                        <li class="mr-4">
                            <span class="inline-block w-3 h-3 mr-2 rounded-full" style="background-color: #ffcd56;"></span>
                            Saliente virtual
                        </li>
                        <li>
                            <span class="inline-block w-3 h-3 mr-2 rounded-full" style="background-color: #4bc0c0;"></span>
                            Saliente presencial
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bar chart data
            const barData = {
                labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
                datasets: [{
                    label: 'Movilidades',
                    data: [30, 35, 20, 10],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            const barConfig = {
                type: 'line',
                data: barData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, barConfig);

            // Pie chart data
            const pieData = {
                labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
                datasets: [{
                    data: [30, 25, 15, 10],
                    backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#ffcd56',
                        '#4bc0c0'
                    ]
                }]
            };

            const pieConfig = {
                type: 'pie',
                data: pieData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Total de actividades'
                        }
                    }
                }
            };

            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, pieConfig);
        });
    </script>
</body>

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
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            .sidebar-modal {
                position: fixed;
                right: 0;
                top: 0;
                bottom: 0;
                width: 400px;
                background-color: white;
                box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
                z-index: 50;
                transform: translateX(100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar-modal.active {
                transform: translateX(0);
            }
        </style>
        </head>

        <body class="bg-gray-100">
            <div class="mb-5">
                <div class="p-4 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold">Eventos Próximos</h4>
                        <button id="addEventBtn" class="px-4 py-2 text-white bg-blue-500 rounded">Agregar
                            Evento</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="eventsTable" class="w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-2">Nombre Evento</th>
                                    <th class="py-2">Color</th>
                                    <th class="py-2">Modalidad</th>
                                    <th class="py-2">Fecha</th>
                                    <th class="py-2">Habilitado</th>
                                    <th class="py-2">Estado</th>
                                    <th class="py-2 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody id="eventsTbody">
                                <!-- Eventos serán insertados aquí -->
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal para Agregar/Editar Evento -->
            <div id="eventModal" class="sidebar-modal">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between p-4 border-b">
                        <h3 class="text-lg font-semibold" id="modalTitle">Agregar Evento</h3>
                        <button id="closeModalBtn" class="text-gray-600 hover:text-gray-900">&times;</button>
                    </div>
                    <div class="flex-grow p-4 overflow-auto">
                        <form id="eventForm" class="space-y-4">
                            <div>
                                <label for="eventName" class="block text-gray-700">Nombre Evento</label>
                                <input type="text" id="eventName" class="w-full px-3 py-2 border rounded"
                                    required>
                            </div>
                            <div>
                                <label for="eventColor" class="block text-gray-700">Color</label>
                                <input type="text" id="eventColor" class="w-full px-3 py-2 border rounded"
                                    required>
                            </div>
                            <div>
                                <label for="eventMode" class="block text-gray-700">Modalidad</label>
                                <input type="text" id="eventMode" class="w-full px-3 py-2 border rounded"
                                    required>
                            </div>
                            <div>
                                <label for="eventDate" class="block text-gray-700">Fecha</label>
                                <input type="date" id="eventDate" class="w-full px-3 py-2 border rounded"
                                    required>
                            </div>
                            <div>
                                <label for="eventEnabled" class="block text-gray-700">Habilitado</label>
                                <select id="eventEnabled" class="w-full px-3 py-2 border rounded" required>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div>
                                <label for="eventStatus" class="block text-gray-700">Estado</label>
                                <select id="eventStatus" class="w-full px-3 py-2 border rounded" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Bloqueado">Bloqueado</option>
                                </select>
                            </div>
                            <div>
                                <label for="eventDescription" class="block text-gray-700">Descripción</label>
                                <textarea id="eventDescription" class="w-full px-3 py-2 border rounded" rows="4"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="p-4 border-t">
                        <div class="flex justify-end">
                            <button id="cancelBtn"
                                class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancelar</button>
                            <button id="saveBtn" class="px-4 py-2 text-white bg-blue-500 rounded">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const events = [{
                            name: 'Internacionalización',
                            color: 'blue',
                            mode: 'Virtual',
                            date: '2022-12-12',
                            enabled: 'Yes',
                            status: 'Activo',
                            description: 'Evento sobre la internacionalización de la empresa.'
                        },
                        {
                            name: 'Microsoft Activation',
                            color: 'black',
                            mode: 'Presencial',
                            date: '2024-05-12',
                            enabled: 'Yes',
                            status: 'Activo',
                            description: 'Activación de productos Microsoft.'
                        },
                        {
                            name: 'Magic Mouse',
                            color: 'Black',
                            mode: 'Presencial',
                            date: '2025-01-28',
                            enabled: 'No',
                            status: 'Bloqueado',
                            description: 'Presentación del nuevo Magic Mouse.'
                        },
                    ];
                    const eventsTbody = document.getElementById('eventsTbody');
                    const eventModal = document.getElementById('eventModal');
                    const eventForm = document.getElementById('eventForm');
                    const modalTitle = document.getElementById('modalTitle');
                    const addEventBtn = document.getElementById('addEventBtn');
                    const closeModalBtn = document.getElementById('closeModalBtn');
                    const cancelBtn = document.getElementById('cancelBtn');
                    const saveBtn = document.getElementById('saveBtn');
                    let editIndex = null;

                    function renderEvents() {
                        eventsTbody.innerHTML = '';
                        events.forEach((event, index) => {
                            const row = document.createElement('tr');
                            row.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                            row.innerHTML = `
                                <td class="px-6 py-4">${event.name}</td>
                                <td class="px-6 py-4">${event.color}</td>
                                <td class="px-6 py-4">${event.mode}</td>
                                <td class="px-6 py-4">${event.date}</td>
                                <td class="px-6 py-4">${event.enabled}</td>
                                <td class="px-6 py-4">${event.status}</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-blue-600 editBtn hover:underline" data-index="${index}">Edit</button>
                                    <button class="ml-3 text-red-600 removeBtn hover:underline" data-index="${index}">Remove</button>
                                </td>
                            `;
                            eventsTbody.appendChild(row);
                        });
                        document.querySelectorAll('.editBtn').forEach(button => {
                            button.addEventListener('click', (e) => {
                                editIndex = e.target.getAttribute('data-index');
                                openModal(events[editIndex]);
                            });
                        });
                        document.querySelectorAll('.removeBtn').forEach(button => {
                            button.addEventListener('click', (e) => {
                                const index = e.target.getAttribute('data-index');
                                events.splice(index, 1);
                                renderEvents();
                            });
                        });
                    }

                    function openModal(event = null) {
                        if (event) {
                            modalTitle.textContent = 'Editar Evento';
                            eventForm.eventName.value = event.name;
                            eventForm.eventColor.value = event.color;
                            eventForm.eventMode.value = event.mode;
                            eventForm.eventDate.value = event.date;
                            eventForm.eventEnabled.value = event.enabled;
                            eventForm.eventStatus.value = event.status;
                            eventForm.eventDescription.value = event.description;
                        } else {
                            modalTitle.textContent = 'Agregar Evento';
                            eventForm.reset();
                        }
                        eventModal.classList.add('active');
                    }

                    function closeModal() {
                        eventModal.classList.remove('active');
                        editIndex = null;
                    }
                    addEventBtn.addEventListener('click', () => openModal());
                    closeModalBtn.addEventListener('click', () => closeModal());
                    cancelBtn.addEventListener('click', () => closeModal());
                    saveBtn.addEventListener('click', () => {
                        const newEvent = {
                            name: eventForm.eventName.value,
                            color: eventForm.eventColor.value,
                            mode: eventForm.eventMode.value,
                            date: eventForm.eventDate.value,
                            enabled: eventForm.eventEnabled.value,
                            status: eventForm.eventStatus.value,
                            description: eventForm.eventDescription.value,
                        };
                        if (editIndex !== null) {
                            events[editIndex] = newEvent;
                        } else {
                            events.push(newEvent);
                        }
                        renderEvents();
                        closeModal();
                    });
                    renderEvents();
                });
            </script>
        </body>
        </main>
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

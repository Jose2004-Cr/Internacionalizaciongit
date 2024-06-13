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
                    <a href="/dashboard" onclick="estadisticas()" id="showContent" class="sidebar-item">
                        <img src="/images/estadisticassd.png" aria-hidden="true">
                        <span class="expand-text">Estadística</span>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="/Home" onclick="home()" id="showContent" class="sidebar-item">
                        <img src="\images\Eventosss.png" aria-hidden="true">
                        <span class="expand-text">Home</span>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="/calendario" onclick="calendario()" class="sidebar-item">
                        <img src="\images\calendariofinal.png" aria-hidden="true">
                        <span class="expand-text">Calendario</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>

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
    .pie-chart-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
</style>
</head>
<body class="bg-gray-100">
<main class="container p-4 mx-auto">
    <div class="grid grid-cols-1 gap-4 mb-5 md:grid-cols-2 lg:grid-cols-4">
        <div class="p-4 rounded-lg shadow gradient-bg-1">
            <h4 class="text-lg font-semibold">Texto texto</h4>
            <p class="text-2xl font-bold">0,000</p>
            <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> 10 % más en el último mes</p>
        </div>
        <div class="p-4 rounded-lg shadow gradient-bg-2">
            <h4 class="text-lg font-semibold">Texto texto</h4>
            <p class="text-2xl font-bold">0,000</p>
            <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> 10 % más en el último mes</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <div class="p-4 rounded-lg shadow gradient-bg-3 chart-container">
            <h4 class="mb-4 text-xl font-semibold">Total de movilidades</h4>
            <div id="chart-revenue" class="px-1 h-70">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
        <div class="p-4 bg-white rounded-lg shadow pie-chart-container">
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
        // Line chart data
        const lineData = {
            labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
            datasets: [
                {
                    label: '2023',
                    data: [30, 35, 20, 10],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                },
                {
                    label: '2024',
                    data: [40, 30, 25, 5],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                }
            ]
        };

        const lineConfig = {
            type: 'line',
            data: lineData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, lineConfig);

        // Pie chart data
        const pieData = {
            labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
            datasets: [{
                data: [52, 12, 8, 8],
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

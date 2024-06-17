<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    .sidebar {
        width: 4rem;
        transition: width 0.3s ease-in-out;
        background: linear-gradient(135deg, #bd0b29, #5e020c);
        border-radius: 0 1rem 1rem 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 0;
    }

    .sidebar:hover {
        width: 10rem;
    }

    .expand-text {
        opacity: 0;
        margin-left: 0.5rem;
        white-space: nowrap;
        transition: opacity 0.2s ease-in-out;
    }

    .sidebar:hover .expand-text {
        opacity: 1;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.5rem 1rem;
        color: white;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        border-radius: 0.5rem;
        margin: 0.5rem 0;
    }

    .sidebar-item img {
        width: 2rem;
        height: 2rem;
        transition: transform 0.3s ease-in-out;
    }

    .sidebar-item:hover {
        background-color: #0F293E;
        transform: scale(0.95);
    }

    .sidebar-item:hover img {
        transform: scale(1.1);
    }

    .sidebar-item .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
    }

    .sidebar h5 {
        text-align: center;
        color: white;
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    .drawer-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        width: 100%;
    }

    li {
        width: 100%;
    }

    .floating-button {
        position: fixed;
        top: 10%;
        /* Mueve el botón hacia arriba */
        right: 10px;
        background-color: white;
        padding: 10px;
        border-radius: 50%;
        /* Hace el botón circular */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .floating-button img {
        width: 30px;
        /* Ajusta el tamaño de la imagen */
        height: 30px;
        border-radius: 50%;
    }

    .button-text {
        display: none;
        /* Ocultar el texto del botón */
    }

    .floating-button:hover {
        transform: translateY(-5px);
    }
</style>
</head>

<body class="bg-gray-100">
    <div class="fixed top-0 left-0 z-0 h-screen transition-all duration-300 ease-in-out sidebar">
        <h5 class="text-xs font-bold uppercase">Hermes</h5>
        <div class="drawer-content">
            <ul>
                <li>
                    <a href="/dashboard" onclick="estadisticas()" class="sidebar-item">
                        <div class="icon"><img src="/images/estadisticassd.png" aria-hidden="true"></div>
                        <span class="expand-text">Estadística</span>
                    </a>
                </li>
                <li>
                    <a href="/Home" onclick="home()" class="sidebar-item">
                        <div class="icon"><img src="/images/Eventosss.png" aria-hidden="true"></div>
                        <span class="expand-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/calendario" onclick="calendario()" class="sidebar-item">
                        <div class="icon"><img src="/images/calendariofinal.png" aria-hidden="true"></div>
                        <span class="expand-text">Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="/certificados" onclick="certificados()" class="sidebar-item">
                        <div class="icon"><img src="/images/certificado.png" aria-hidden="true"></div>
                        <span class="expand-text">Certificados</span>
                    </a>
                </li>
                <li>
                    <a href="/reportes" onclick="reportes()" class="sidebar-item">
                        <div class="icon"><img src="/images/reportesbln.png" aria-hidden="true"></div>
                        <span class="expand-text">Reportes</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="floating-button" id="floatingButton">
        <a href="/mapa" onclick="MapaGeografico()">
            <img src="/images/sudafrica.png" alt="Botón">
            <!-- Asegúrate de reemplazar /images/your-image.png con la ruta de tu imagen -->
            <span class="button-text" id="buttonText">Mapa Geografico</span>
        </a>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('floatingButton');

            button.addEventListener('mouseenter', function() {
                button.style.transform = 'translateY(-5px)';
            });

            button.addEventListener('mouseleave', function() {
                button.style.transform = 'translateY(0)';
            });
        });
    </script>
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

    .gradient-bg-1,
    .gradient-bg-2,
    .gradient-bg-3 {
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
                            <span class="inline-block w-3 h-3 mr-2 rounded-full"
                                style="background-color: #ff6384;"></span>
                            Entrante virtual
                        </li>
                        <li class="mr-4">
                            <span class="inline-block w-3 h-3 mr-2 rounded-full"
                                style="background-color: #36a2eb;"></span>
                            Entrante presencial
                        </li>
                        <li class="mr-4">
                            <span class="inline-block w-3 h-3 mr-2 rounded-full"
                                style="background-color: #ffcd56;"></span>
                            Saliente virtual
                        </li>
                        <li>
                            <span class="inline-block w-3 h-3 mr-2 rounded-full"
                                style="background-color: #4bc0c0;"></span>
                            Saliente presencial
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Line chart data
                const lineData = {
                    labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
                    datasets: [{
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
</main>

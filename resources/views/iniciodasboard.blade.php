<x-app-layout>
    @vite(['resources/css/dashboard.css'])

    <body class="bg-gray-100">
        <div class="fixed top-0 left-0 z-0 h-screen transition-all duration-300 ease-in-out sidebar">
            <h5 class="text-xs font-bold uppercase">Hermes</h5>
            <div class="drawer-content">
                <ul>
                    <li>
                        <a href="/iniciodasboard" onclick="estadisticas()" class="sidebar-item">
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
                        <a href="/reportes" onclick="reportes()" class="sidebar-item">
                            <div class="icon"><img src="/images/reportesbln.png" aria-hidden="true"></div>
                            <span class="expand-text">Reportes</span>
                        </a>
                    </li>
                </ul>
                <li>
                    <a href="/soporte" onclick="soporte()" class="sidebar-item">
                        <div class="icon"><img src="/images/engranaje.png" aria-hidden="true"></div>
                        <span class="expand-text">Soporte</span>
                    </a>
                </li>
            </div>
        </div>

        <body class="bg-gray-100">

            <body class="flex items-center justify-center min-h-screen bg-gray-100">
                <div class="floating-button" id="floatingButton">
                    <a href="/mapa" onclick="MapaGeografico()">
                        <img src="/images/sudafrica.png" alt="Botón">
                        <span class="button-text" id="buttonText">Mapa Geografico</span>
                    </a>
                </div>
            </body>
            <div class="container px-40 mx-auto mt-10">
                <div class="flex items-center justify-between mb-10">
                    <h1 class="text-2xl font-bold"></h1>
                </div>

                <body class="flex items-center justify-center min-h-screen bg-gray-100">
                    <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
                        <main class="container p-4 mx-auto ml-20">
                            <div class="grid grid-cols-1 gap-4 mb-5 md:grid-cols-2 lg:grid-cols-4">
                                <div class="p-4 rounded-lg shadow gradient-bg-1">
                                    <h4 class="text-lg font-semibold">Texto texto</h4>
                                    <p class="text-2xl font-bold">0,000</p>
                                    <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> 10 % más
                                        en el último
                                        mes</p>
                                </div>
                                <div class="p-4 rounded-lg shadow gradient-bg-2">
                                    <h4 class="text-lg font-semibold">Texto texto</h4>
                                    <p class="text-2xl font-bold">0,000</p>
                                    <p class="text-green-400"><i data-feather="arrow-up" class="icon-xxs"></i> 10 % más
                                        en el último
                                        mes</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div class="p-4 rounded-lg shadow gradient-bg-3 chart-container">
                                    <h4 class="mb-4 text-xl font-semibold">Diagrana de Barras</h4>
                                    <div id="chart-revenue" class="h-10 px-1">

                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </section>
                </body>
            </div>
        </body>
    </body>

</x-app-layout>

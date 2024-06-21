<link rel="dns-prefetch" href="//unpkg.com" />
<link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<x-app-layout>
    @vite (['resources/css/dashboard.css','resources/css/calendario.css','resources/js/calendario.js'])

    <link rel="dns-prefetch" href="//unpkg.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <div>
        <body>
            <div class="fixed top-0 left-0 z-0 h-screen transition-all duration-300 ease-in-out sidebar">
                <h5 class="text-xs font-bold uppercase">Hermes</h5>
                <div class="drawer-content">
                    <ul>
                        <li>
                            <a href="/iniciodasboard" onclick="estadisticas()" id="showContent" class="sidebar-item">
                                <div class="icon"><img src="/images/estadisticassd.png" aria-hidden="true"></div>
                                <span class="expand-text">Estadística</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Home" onclick="home()" id="showContent" class="sidebar-item">
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
        </body>
    </div>



    </html>
</x-app-layout>

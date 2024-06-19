<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    @vite(['resources/css/home.css', 'resources/js/home.js'])

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
                <li>
                    <a href="/soporte" onclick="soporte()" class="sidebar-item">
                        <div class="icon"><img src="/images/reportesbln.png" aria-hidden="true"></div>
                        <span class="expand-text">Soporte</span>
                    </a>
                </li>
            </div>
        </div>


        <body class="bg-gray-100">

            <body class="flex items-center justify-center min-h-screen bg-gray-100">

            </body>
            <div class="container px-40 mx-auto mt-10">
                <div class="flex items-center justify-between mb-10">
                    <h1 class="text-2xl font-bold"></h1>
                </div>

                <body class="flex items-center justify-center min-h-screen bg-gray-100">
                    <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
                        <main class="container p-6 mx-auto ml-10">
                            <div class="container px-5 mx-auto mt-5">
                                <div class="justify-between mb-10 ">
                                    <h1 class="text-2xl font-bold">Agregados recientes..</h1>

                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="flex flex-col justify-between w-full h-24 p-4 text-white bg-blue-500 rounded shadow-md">
                                        <h3 class="font-bold">Internacionalizacion</h3>
                                        <p>Innova _ Colombia</p>
                                        <p>Fecha: 14-06 hasta las 6:00 P.M.</p>
                                    </div>
                                    <div class="flex flex-col justify-between w-full h-24 p-4 text-white bg-blue-500 rounded shadow-md">
                                        <h3 class="font-bold">Hermes</h3>
                                        <p>Tecnologico _ Colombia</p>
                                        <p>Fecha: 17-06 hasta las 3:00 P.M.</p>
                                    </div>
                                    <div class="flex flex-col justify-between w-full h-24 p-4 text-white bg-blue-500 rounded shadow-md">
                                        <h3 class="font-bold">Los Panes</h3>
                                        <p>Panderia _ Colombia</p>
                                        <p>Fecha: 21-06 hasta las 9:00 A.M.</p>
                                    </div>
                                    <div id="addEventButton"
                                        class="flex items-center justify-center w-full h-24 p-4 text-gray-600 bg-gray-200 rounded shadow-md cursor-pointer">
                                        <button>Agregar evento +</button>
                                    </div>
                                </div>
                                <div id="slideInForm" class="p-4 slide-in">
                                    <div class="modal-header">
                                        <h2>Agregar evento</h2>
                                        <button id="closeSlideInForm" class="text-red-500">X</button>
                                    </div>
                                    <form id="eventForm" class="modal-body">
                                        <input id="eventName" type="text" placeholder="Nombre del evento"
                                            class="w-full p-2 mb-2 border border-gray-300 rounded">
                                        <input id="eventDirector" type="text" placeholder="Director del evento"
                                            class="w-full p-2 mb-2 border border-gray-300 rounded">
                                        <button type="button" id="activityTypeButton" class="w-full p-2 mb-2 text-white bg-blue-500 rounded">Tipo
                                            de actividad</button>
                                        <div id="participantsList" class="mb-2">
                                            <button type="button" id="addParticipantButton"
                                                class="w-full p-2 text-white bg-blue-500 rounded">Agregar participante +</button>
                                        </div>
                                        <input id="eventDate" type="text" placeholder="Fechas"
                                            class="w-full p-2 mb-2 border border-gray-300 rounded">
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" id="saveEventButton" class="px-4 py-2 text-white bg-blue-500 rounded shadow">Guardar
                                            evento</button>
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

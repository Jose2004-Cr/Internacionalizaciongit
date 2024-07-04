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


        <body class="flex items-center justify-center min-h-screen bg-gray-100">

            <div class="container px-10 mx-auto mt-10">
                <div class="flex items-center justify-between mb-10">
                    <h1 class="text-3xl font-bold text-gray-700">Eventos Recientes</h1>
                    <button id="addEventButton"
                        class="px-4 py-2 text-white transition bg-blue-600 rounded shadow-md hover:bg-blue-700">Agregar
                        evento +</button>
                </div>

                <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
                    <main class="container p-6 mx-auto">
                        <div class="grid grid-cols-3 gap-6" id="eventsGrid">
                            <!-- Example Event Cards -->
                            <div
                                class="flex flex-col justify-between w-full p-6 text-white rounded-md shadow-md card bg-gradient-to-r from-blue-500 to-indigo-600">
                                <h3 class="text-xl font-bold">Internacionalizacion</h3>
                                <p>Innova _ Colombia</p>
                                <p>Fecha: 14-06 hasta las 6:00 P.M.</p>
                            </div>
                            <div
                                class="flex flex-col justify-between w-full p-6 text-white rounded-md shadow-md card bg-gradient-to-r from-blue-500 to-indigo-600">
                                <h3 class="text-xl font-bold">Hermes</h3>
                                <p>Tecnologico _ Colombia</p>
                                <p>Fecha: 17-06 hasta las 3:00 P.M.</p>
                            </div>
                            <div
                                class="flex flex-col justify-between w-full p-6 text-white rounded-md shadow-md card bg-gradient-to-r from-blue-500 to-indigo-600">
                                <h3 class="text-xl font-bold">Los Panes</h3>
                                <p>Panderia _ Colombia</p>
                                <p>Fecha: 21-06 hasta las 9:00 A.M.</p>
                            </div>
                        </div>
                    </main>
                </section>
                <br><br><br>

                <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-white dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-current dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-white">
                                        NOMBRE
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-white">
                                        FECHA
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-white">
                                        DIRECTOR
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-white">
                                        ESTADO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-white">
                                        DETALLES
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Internacionalizacion
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Innova _ Colombia
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Fecha: 14-06 hasta las 6:00 P.M.
                                    </td>
                                    <td>
                                        <button type="button" class="text-white bg-gradient-to-r px-6 py-3  from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Green</button>

                                    </td>


                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Hermes
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Tecnologico _ Colombia
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Fecha: 17-06 hasta las 3:00 P.M.
                                    </td>
                                    <td>
                                        <button type="button" class="flex items-center justify-center text-white bg-gradient-to-r px-6 py-3  from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Green</button>

                                    </td>

                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Los Panes
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Panderia _ Colombia
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        Fecha: 21-06 hasta las 9:00 A.M.
                                    </td>
                                    <td>
                                        <button type="button" class="text-white bg-gradient-to-r px-6 py-3 from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Red</button>

                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <div id="slideInForm" class="slide-in rounded-l-md">
                    <div class="flex items-center justify-between mb-4 modal-header">
                        <h2 class="text-2xl font-bold text-gray-700">Agregar evento</h2>
                        <button id="closeSlideInForm" class="text-xl font-bold text-red-500">X</button>
                    </div>
                    <form id="eventForm" class="modal-body">
                        <input id="eventName" type="text" placeholder="Nombre del evento"
                            class="w-full p-2 mb-4 border border-gray-300 rounded">
                        <input id="eventDirector" type="text" placeholder="Director del evento"
                            class="w-full p-2 mb-4 border border-gray-300 rounded">
                        <button type="button" id="activityTypeButton"
                            class="w-full p-2 mb-4 text-white transition bg-blue-600 rounded hover:bg-blue-700">Tipo de
                            actividad</button>
                        <div id="participantsList" class="mb-4">
                            <button type="button" id="addParticipantButton"
                                class="w-full p-2 mb-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">Agregar
                                participante +</button>
                        </div>
                        <input id="eventDate" type="text" placeholder="Fechas"
                            class="w-full p-2 mb-4 border border-gray-300 rounded">
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="saveEventButton"
                            class="w-full px-4 py-2 text-white transition bg-blue-600 rounded shadow hover:bg-blue-700">Guardar
                            evento</button>
                    </div>
                </div>
            </div>
        </body>
    </body>

</x-app-layout>

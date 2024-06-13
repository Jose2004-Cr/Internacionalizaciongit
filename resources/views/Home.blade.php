<body>
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
    <div class="bg-white rounded-lg shadow p-21">
        <div id="home" style="display: none">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
    .icon-xxs {
        width: 1rem;
        height: 1rem;
        }

        .icon-xs {
            width: 1.25rem;
            height: 1.25rem;
            }

            .floating-button {
                position: fixed;
                bottom: 50px;
                right: 50px;
                }

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

                            .hidden {
                                display: none;
                                }

                                #registerForm {
                                    max-width: 800px;
                                    }

                                    .bg-opacity-75 {
                background-color: rgba(255, 255, 255, 0.75);
                }

                .fullscreen-modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: rgba(0, 0, 0, 0.5);
                    }

                    .modal-content {
                        background-color: white;
                        padding: 20px;
                        border-radius: 8px;
                        max-width: 90%;
                        max-height: 90%;
                        overflow-y: auto;
                        width: 100%;
                        }
                        </style>
        </head>
    </style>

<body class="bg-gray-100">
    <!-- Contenedor principal -->
<main class="container p-4 mx-auto">
    <div class="p-8 bg-white rounded-lg shadow">
        <!-- Sección de búsqueda y creación de eventos -->
    <div id="home">
        <div
    class="flex flex-col items-center justify-between w-full max-w-xl mx-auto my-10 space-y-4">
<div class="flex justify-center w-full space-x-4">
    <form id="searchForm" class="flex items-center w-full space-x-4">
        <label for="searchInput"
    class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
<div class="relative w-full">
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
</div>

<!-- Botón de tipo de actividad -->
<div class="relative w-full max-w-xs">
    <button id="activityTypeButton"
class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Tipo
<div id="activityTypeDropdown"
class="absolute hidden w-full py-2 mt-2 bg-white rounded-lg shadow-lg">
<p class="px-4 py-2 text-gray-700">Rol</p>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Docente</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Estudiante</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Empresario</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Otro</a>
<hr>
<p class="px-4 py-2 text-gray-700">Actividad que se realiza</p>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Ruta</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Ponencia</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Clase
espejo</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cátedra abierta</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Congreso</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">COIL</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Convenio</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Reunión</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
deportiva</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
multicultural</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Pasantía
investigativa</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Curso en línea</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actividad
bilingüe/multilingüe</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Proyecto de
aula</a>
<a href="#"
class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Intercambio
semestral</a>
</div>
</div>
</div>

<!-- Contenedor de eventos recientes -->
<div id="registerForm" class="hidden fullscreen-modal">
    <div class="modal-content">
        <h2 class="mb-4 text-lg font-semibold">Registrar nuevo evento</h2>
    <form id="eventRegistrationForm">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="mb-4">
                <label for="eventName"
            class="block text-sm font-medium text-gray-700">Nombre del
        evento</label>
    <input type="text" id="eventName" name="eventName"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
</div>
<div class="mb-4">
    <label for="eventType"
class="block text-sm font-medium text-gray-700">Tipo de evento</label>
<select id="eventType" name="eventType"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
<option value="">Selecciona un tipo</option>
<option value="Ruta">Ruta</option>
<option value="Ponencia">Ponencia</option>
<option value="Clase espejo">Clase espejo</option>
<option value="Cátedra abierta">Cátedra abierta</option>
<option value="Congreso">Congreso</option>
<option value="COIL">COIL</option>
<option value="Convenio">Convenio</option>
<option value="Reunión">Reunión</option>
<option value="Actividad deportiva">Actividad deportiva</option>
<option value="Actividad multicultural">Actividad multicultural
</option>
<option value="Pasantía investigativa">Pasantía investigativa</option>
<option value="Curso en línea">Curso en línea</option>
<option value="Actividad bilingüe/multilingüe">Actividad
bilingüe/multilingüe</option>
<option value="Proyecto de aula">Proyecto de aula</option>
<option value="Intercambio semestral">Intercambio semestral</option>
</select>
</div>
<div class="mb-4">
    <label for="eventDate"
class="block text-sm font-medium text-gray-700">Fecha del
evento</label>
<input type="date" id="eventDate" name="eventDate"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
</div>
<div class="mb-4">
    <label for="eventLocation"
class="block text-sm font-medium text-gray-700">Ubicación</label>
<input type="text" id="eventLocation" name="eventLocation"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
</div>
<div class="mb-4">
    <label for="eventDuration"
class="block text-sm font-medium text-gray-700">Duración</label>
<input type="text" id="eventDuration" name="eventDuration"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
</div>
<div class="mb-4">
    <label for="eventParticipants"
class="block text-sm font-medium text-gray-700">Participantes</label>
<input type="text" id="eventParticipants" name="eventParticipants"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
required>
</div>
<div class="mb-4">
    <label for="eventDocument"
class="block text-sm font-medium text-gray-700">Subir
documentos</label>
<input type="file" id="eventDocument" name="eventDocument"
class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
</div>
</div>

                                    <div class="mb-4">
                                        <label for="eventDescription"
                                            class="block text-sm font-medium text-gray-700">Descripción</label>
                                        <textarea id="eventDescription" name="eventDescription" rows="4"
                                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                    </div>
                                    <div class="flex justify-end space-x-4">
                                        <button type="button" id="cancelEventButton"
                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400">Cancelar</button>
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="p-4 mt-8 bg-gray-100 rounded-lg">
                            <h2 class="mb-4 text-lg font-semibold">Agregados recientes</h2>
                            <div id="recentEventsContainer" class="recent-events-grid">
                                <div class="event-card">Ejemplo 1</div>
                                <div class="event-card">Ejemplo 2</div>
                                <div class="event-card-placeholder">En espera...</div>
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
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            email1@example.com</td>
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
                <div id="createEventModal"
                    class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
                    <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-lg">
                        <h2 class="mb-4 text-2xl font-semibold text-gray-800">Crear Evento</h2>
                        <form id="createEventForm" class="space-y-4">
                            <div>
                                <label for="eventName" class="block text-sm font-medium text-gray-700">Nombre del
                                    Evento</label>
                                <input type="text" id="eventName"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                            </div>
                            <div>
                                <label for="eventDescription"
                                    class="block text-sm font-medium text-gray-700">Descripción del Evento</label>
                                <textarea id="eventDescription"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    rows="3" required></textarea>
                            </div>
                            <div>
                                <label for="eventDate" class="block text-sm font-medium text-gray-700">Fecha del
                                    Evento</label>
                                <input type="date" id="eventDate"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                            </div>
                            <div>
                                <label for="eventTime" class="block text-sm font-medium text-gray-700">Hora del
                                    Evento</label>
                                <input type="time" id="eventTime"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                            </div>
                            <div>
                                <label for="eventLocation"
                                    class="block text-sm font-medium text-gray-700">Ubicación</label>
                                <input type="text" id="eventLocation"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                            </div>
                            <div>
                                <label for="eventTags"
                                    class="block text-sm font-medium text-gray-700">Etiquetas</label>
                                <input type="text" id="eventTags"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Etiquetas separadas por comas" required />
                            </div>
                            <div>
                                <label for="priority"
                                    class="block text-sm font-medium text-gray-700">Prioridad</label>
                                <select id="priority" name="priority"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                            </div>
                            <div>
                                <label for="attachment" class="block text-sm font-medium text-gray-700">Adjuntar
                                    Documento</label>
                                <input type="file" id="attachment" name="attachment"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </div>
                            <div>
                                <label for="eventColor" class="block text-sm font-medium text-gray-700">Color del
                                    Evento</label>
                                <div id="colorPicker" class="flex mt-1 space-x-2">
                                    <button type="button"
                                        class="w-10 h-10 bg-red-500 rounded-full focus:ring-4 focus:outline-none focus:ring-red-300"
                                        data-color="#ef4444"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-green-500 rounded-full focus:ring-4 focus:outline-none focus:ring-green-300"
                                        data-color="#10b981"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-blue-500 rounded-full focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        data-color="#3b82f6"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-yellow-500 rounded-full focus:ring-4 focus:outline-none focus:ring-yellow-300"
                                        data-color="#f59e0b"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-purple-500 rounded-full focus:ring-4 focus:outline-none focus:ring-purple-300"
                                        data-color="#8b5cf6"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-orange-500 rounded-full focus:ring-4 focus:outline-none focus:ring-orange-300"
                                        data-color="#f97316"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-pink-500 rounded-full focus:ring-4 focus:outline-none focus:ring-pink-300"
                                        data-color="#ec4899"></button>
                                    <button type="button"
                                        class="w-10 h-10 bg-teal-500 rounded-full focus:ring-4 focus:outline-none focus:ring-teal-300"
                                        data-color="#14b8a6"></button>
                                </div>
                                <input type="hidden" id="eventColor" name="eventColor" required>
                            </div>
                            <div>
                                <label for="participants"
                                    class="block text-sm font-medium text-gray-700">Participantes</label>
                                <input type="email" id="participants"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Emails de los participantes separados por comas" required />
                            </div>
                            <div>
                                <label for="additionalNotes" class="block text-sm font-medium text-gray-700">Notas
                                    Adicionales</label>
                                <textarea id="additionalNotes"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    rows="3" placeholder="Escribe tus notas aquí..."></textarea>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <button type="button" id="cancelCreateEventButton"
                                    class="px-4 py-2 font-medium text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400">Cancelar</button>
                                <button type="submit"
                                    class="px-4 py-2 font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="fixed bottom-4 right-4">
                    <button id="createEventButton"
                        class="px-6 py-3 text-white bg-blue-600 rounded-full shadow-lg hover:bg-blue-700">
                        Crear Evento
                    </button>
                </div>

                <div id="recentEventsContainer" class="p-6"></div>

                <div class="container px-6 mx-auto mt-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Todos los Eventos</h2>
                    <table class="min-w-full mt-4 bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Descripción</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Prioridad</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Fecha</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Ubicación</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-600 uppercase">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="eventsTableBody">
                            <!-- Aquí se agregarán los eventos -->
                        </tbody>
                    </table>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const createEventButton = document.getElementById('createEventButton');
                        const createEventModal = document.getElementById('createEventModal');
                        const cancelCreateEventButton = document.getElementById('cancelCreateEventButton');
                        const createEventForm = document.getElementById('createEventForm');
                        const recentEventsContainer = document.getElementById('recentEventsContainer');
                        const eventsTableBody = document.getElementById('eventsTableBody');
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
                            const eventDescription = document.getElementById('eventDescription').value;
                            const eventDate = document.getElementById('eventDate').value;
                            const eventTime = document.getElementById('eventTime').value;
                            const eventLocation = document.getElementById('eventLocation').value;
                            const eventTags = document.getElementById('eventTags').value;
                            const eventPriority = document.getElementById('priority').value;
                            const eventColor = eventColorInput.value;
                            const participants = document.getElementById('participants').value;
                            const additionalNotes = document.getElementById('additionalNotes').value;

                            // Aquí puedes agregar la lógica para guardar el evento en la base de datos

                            // Agregar el evento a la lista de eventos recientes
                            const eventCard = document.createElement('div');
                            eventCard.className = 'p-4 mb-4 bg-white rounded-lg shadow-md';
                            eventCard.style.backgroundColor = eventColor;
                            eventCard.innerHTML = `
                                <h3 class="text-lg font-semibold">${eventName}</h3>
                                <p>${eventDescription}</p>
                                <p><strong>Fecha:</strong> ${eventDate} ${eventTime}</p>
                                <p><strong>Ubicación:</strong> ${eventLocation}</p>
                                <p><strong>Prioridad:</strong> ${eventPriority}</p>
                                <p><strong>Etiquetas:</strong> ${eventTags}</p>
                                <p><strong>Participantes:</strong> ${participants}</p>
                                <p><strong>Notas:</strong> ${additionalNotes}</p>
                            `;
                            recentEventsContainer.appendChild(eventCard);

                            // Agregar el evento a la tabla de eventos
                            const eventRow = document.createElement('tr');
                            eventRow.classList.add('bg-white', 'border-b');
                            eventRow.innerHTML = `
                                <td class="px-6 py-4 text-sm text-gray-500">${eventName}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">${eventDescription}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">${eventPriority}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">${eventDate} ${eventTime}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">${eventLocation}</td>
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
                    });
                </script>
</body>
</html>

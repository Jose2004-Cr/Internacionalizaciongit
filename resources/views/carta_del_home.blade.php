<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@vite(['resources/css/carta_el_home.css' , 'resources/js/carta_el_home.js'])
<x-app-layout>
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




    <section class="container mx-auto p-6 bg-white rounded-md shadow-md mt-16 w-8/12 h-auto">
        <h2 class="text-3xl  font-bold text-gray-800 mb-6">Datos del evento</h2>
        <form class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-items-center">
            <!-- Columna 1 -->
            <div>
                <div class="flex flex-col">
                    <label for="nombreEvento" class="text-xl font-bold text-blue-800">Nombre del evento</label>
                    <input type="text" id="nombreEvento" class="p-4 bg-gray-100 border border-gray-300 rounded-sm" placeholder="Nombre del evento" readonly>
                </div>
                <div class="flex flex-col mt-6">
                    <label for="tipoActividad" class="text-xl font-bold text-blue-800">Tipo de actividad</label>
                    <input type="text" id="tipoActividad" class="p-4 bg-gray-100 border border-gray-300 rounded-sm" placeholder="Tipo de actividad" readonly>
                </div>
                <div class="flex flex-col mt-6">
                    <label for="participantes" class="text-xl font-bold text-blue-800">Participantes <span id="participantCount" class="text-xs text-gray-500">|0 de 10</span></label>
                    <div class="flex items-center mt-1 w-96">
                        <input type="text" id="participantes" class="p-4 bg-gray-100 border border-gray-300 rounded-sm flex-grow  h-14  focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nombre del participante" oninput="updateParticipantCounter()" autocomplete="off">
                        <button type="button" id="addParticipantButton" class="ml-2 p-2 bg-blue-500 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="addParticipant()" readonly disabled>+</button>
                    </div>
                    <div id="participantList" class="mt-4 w-36 h-1"></div>
                </div>
            </div>

            <!-- Columna 2 -->
            <div>
                <div class="flex flex-col">
                    <label for="nombreResponsable" class="text-xl font-bold text-blue-800">Nombre del responsable</label>
                    <input type="text" id="nombreResponsable" class="p-4 bg-gray-100 border border-gray-300 rounded-sm" placeholder="Nombre del responsable" readonly>
                </div>
                <div class="flex flex-col mt-6">
                    <label for="fechaVencimiento" class="text-xl font-bold text-blue-800">Fecha de vencimiento</label>
                    <input type="date" id="fechaVencimiento" class="mt-1 p-2 w-96 h-14 bg-blue-600 text-white rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Fecha de vencimiento" readonly>
                </div>
                <div class="flex flex-col mt-3">
                    <label for="nombreEvento" class="text-xl font-bold text-blue-800 mt-4">Personas asistidas</label>
                    <div class="relative">
                        <input type="button" id="personasAsistidasBtn" class="p-4  bg-gray-100 border border-gray-300 rounded-sm pl-10" value="Personas asistidas">

                        <svg class="absolute top-3 left-3 w-6 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                        </svg>


                    </div>
                </div>


                <!-- Modal -->
                <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                    Nombre y Apellido
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Institucion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Evento de
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Uso carruso
                                    </th>
                                    <td class="px-6 py-4">
                                        universidad de washington
                                    </td>
                                    <td class="px-6 py-4">
                                        Ingenieria mecatronica
                                    </td>

                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Westcol
                                    </th>
                                    <td class="px-6 py-4">
                                        universidad de los andes
                                    </td>
                                    <td class="px-6 py-4">
                                        Ingenieria mecatronica
                                    </td>

                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Carlos escobar
                                    </th>
                                    <td class="px-6 py-4">
                                        universidad de chile
                                    </td>
                                    <td class="px-6 py-4">
                                        Ingenieria mecatronica
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                        <button id="closeModalBtn" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg">Cerrar</button>
                    </div>
                </div>


            </div>
        </form>
        <div class="flex justify-end mt-6">
            <button type="button" id="editButton" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-6 py-2 text-center me-2 mb-2 mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" onclick="enableEditMode()">Editar</button>
            <button type="button" id="deleteButton" class="hidden px-6 py-2 bg-red-500 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 mr-2" onclick="deleteData()">Eliminar</button>
            <button type="button" id="saveButton" class="hidden px-6 py-2 bg-green-500 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" onclick="saveChanges()">Guardar</button>
        </div>
    </section>



















    <section class="container mx-auto p-6 bg-white rounded-md shadow-md mt-16 w-8/12 h-auto">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-gray-800">Personas registradas</h2>
          <div class="flex space-x-2">
            <div class="relative">
              <input type="text" placeholder="Buscar persona..." class="pl-8 pr-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <svg class="w-5 h-5 text-gray-400 absolute left-2 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>

            <button id="certificarBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 flex items-center">
                Certificar
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>


            <button class="bg-gray-200 p-2 rounded-md hover:bg-gray-300 transition duration-300">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <table class="w-full h-48">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Rol</th>
                <th class="px-4 py-2 text-left">Nacionalidad</th>
                <th class="px-4 py-2 text-left">Estado</th>
                <th class="px-4 py-2 text-left">Detalles</th>
              </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                  <td class="px-4 py-2">Example name1</td>
                  <td class="px-4 py-2">Example rol1</td>
                  <td class="px-4 py-2">Example nationality1</td>
                  <td class="px-4 py-2">
                    <svg class="w-6 h-6 text-gray-400 certification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </td>
                  <td class="px-4 py-2">
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-600">Ver</button>
                  </td>
                </tr>
                <tr>
                  <td class="px-4 py-2">Example name2</td>
                  <td class="px-4 py-2">Example rol2</td>
                  <td class="px-4 py-2">Example nationality2</td>
                  <td class="px-4 py-2">
                    <svg class="w-6 h-6 text-gray-400 certification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </td>
                  <td class="px-4 py-2">
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-600">Ver</button>
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </section>


      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const certificarBtn = document.getElementById('certificarBtn');
          const icons = document.querySelectorAll('.certification-icon');

          certificarBtn.addEventListener('click', function() {
            icons.forEach(icon => {
              icon.classList.remove('text-gray-400');
              icon.classList.add('text-green-500');
            });
          });

          document.getElementById('personasAsistidasBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
          });

          document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
          });
        });

        function enableEditMode() {
          // Ocultar el botón de Editar
          document.getElementById('editButton').classList.add('hidden');
          // Mostrar los botones de Eliminar y Guardar
          document.getElementById('deleteButton').classList.remove('hidden');
          document.getElementById('saveButton').classList.remove('hidden');

          // Habilitar los inputs para edición y cambiar el borde a azul
          let inputs = document.querySelectorAll('input[readonly]');
          inputs.forEach(input => {
            input.classList.add('blue-border');
            input.removeAttribute('readonly');
          });

          // Habilitar el botón de añadir participante
          document.getElementById('addParticipantButton').removeAttribute('disabled');
        }

        function saveChanges() {
          // Mostrar el botón de Editar
          document.getElementById('editButton').classList.remove('hidden');
          // Ocultar los botones de Eliminar y Guardar
          document.getElementById('deleteButton').classList.add('hidden');
          document.getElementById('saveButton').classList.add('hidden');

          // Deshabilitar los inputs y quitar el borde azul
          let inputs = document.querySelectorAll('input');
          inputs.forEach(input => {
            input.classList.remove('blue-border');
            input.setAttribute('readonly', true);
          });

          // Limpiar el contador de participantes
          document.getElementById('participantCount').innerText = '| 0 de 10';
        }



        function addParticipant() {
          let participantInput = document.getElementById('participantes');
          let participantName = participantInput.value.trim();

          if (participantName !== '') {
            // Verificar si ya hay 10 participantes
            let currentCount = document.querySelectorAll('.participant-item').length;
            if (currentCount >= 10) {
              alert('Se ha alcanzado el límite de 10 participantes.');
              return;
            }

            // Crear un nuevo elemento de participante
            let participantListItem = document.createElement('div');
            participantListItem.classList.add('participant-item');
            participantListItem.innerHTML = `
              <span>${participantName}</span>
              <button type="button" class="ml-2 p-1 bg-red-500 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="removeParticipant(this)">x</button>
            `;

            // Agregar el nuevo participante a la lista
            let participantList = document.getElementById('participantList');
            participantList.appendChild(participantListItem);

            // Limpiar el campo de participantes y deshabilitar el botón de añadir
            participantInput.value = '';
            document.getElementById('addParticipantButton').setAttribute('disabled', true);

            // Actualizar el contador de participantes
            currentCount += 1;
            document.getElementById('participantCount').innerText = `| ${currentCount} de 10`;
          }
        }

        function removeParticipant(button) {
          let participantItem = button.parentNode;
          participantItem.parentNode.removeChild(participantItem);

          // Habilitar el botón de añadir participante
          document.getElementById('addParticipantButton').removeAttribute('disabled');

          // Actualizar el contador de participantes
          let currentCount = document.querySelectorAll('.participant-item').length;
          document.getElementById('participantCount').innerText = `| ${currentCount} de 10`;
        }

        function updateParticipantCounter() {
          let participantInput = document.getElementById('participantes');
          let participantName = participantInput.value.trim();
          let addButton = document.getElementById('addParticipantButton');

          if (participantName !== '') {
            addButton.removeAttribute('disabled');
          } else {
            addButton.setAttribute('disabled', true);
          }
        }
      </script>




</x-app-layout>




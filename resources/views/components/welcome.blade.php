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

<div>
    {{-- aqui va el contenido de la estadistica --}}
    <div id="estadisticas" style="display: block">
        <div>
            <a>
                <div class="flex w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-6">
                    <div>
                        <div>
                            <div class="flex justify-between mb-3">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                                            DIAGRAMA
                                            DE
                                            BARRAS
                                        </h5>
                                        <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                            class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                        </svg>
                                        <div data-popover id="chart-info" role="tooltip"
                                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                            <div class="p-3 space-y-2">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth
                                                    -
                                                    Incremental
                                                </h3>
                                                <p>Report helps navigate cumulative growth of community activities.
                                                    Ideally,
                                                    the
                                                    chart
                                                    should have a growing trend, as stagnating chart signifies a
                                                    significant
                                                    decrease of
                                                    community activity.</p>
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                                <p>For each date bucket, the all-time volume of activities is
                                                    calculated.
                                                    This
                                                    means
                                                    that activities in period n contain all activities up to period n,
                                                    plus
                                                    the
                                                    activities generated by your community in period.</p>
                                                <a href="#"
                                                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                    more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                    </svg></a>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <dl class="flex items-center">
                                    <dt class="text-sm font-normal text-gray-500 dark:text-gray-400 me-1">Eventos
                                        Registrados
                                    </dt>

                                </dl>
                                <dl class="flex items-center justify-end">
                                    <dt class="text-sm font-normal text-gray-500 dark:text-gray-400 me-1">Porcentaje
                                    </dt>
                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">1.2%</dd>
                                </dl>
                            </div>

                            <!-- Contenedor del gráfico -->
                            <div id="column-chart" class="mt-10">
                                <canvas></canvas>
                            </div>
                        </div>


                        <!-- espacio debajo de diagrama (para colocar texto) -->
                        {{-- <div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between pt-5">
                            <!-- Button -->

                        </div>
                    </div> --}}
                    </div>
                </div>
            </a>

            {{-- aqui se hace el salto entre el diagrama de tabla con el de pastel --}}
            <BR></BR>

            {{-- pastel --}}

            <div class="fixed-element">
                <div class="flex items-start justify-end mt-0">
                    <div class="w-full max-w-sm p-0 bg-white rounded-lg shadow dark:bg-gray-800 md:p-0">
                        <div class="flex justify-between mb-1">
                            <div class="flex items-center justify-end"> <!-- Cambiado justify-end -->
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-0">
                                            DIAGRAMA DE PASTEL </h5>
                                        <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                            class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                        </svg>
                                        <div data-popover id="chart-info" role="tooltip"
                                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                            <div class="p-3 space-y-2">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity
                                                    growth
                                                    - Incremental
                                                </h3>
                                                <p>Report helps navigate cumulative growth of community activities.
                                                    Ideally, the chart
                                                    should have a growing trend, as stagnating chart signifies a
                                                    significant decrease of
                                                    community activity.</p>
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation
                                                </h3>
                                                <p>For each date bucket, the all-time volume of activities is
                                                    calculated. This means
                                                    that activities in period n contain all activities up to period
                                                    n,
                                                    plus the
                                                    activities generated by your community in period.</p>
                                                <a href="#"
                                                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                    more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 9 4-4-4-4" />
                                                    </svg></a>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-lg shadow-lg">
                            <canvas class="p-20" id="chartDoughnut"></canvas>
                        </div>

                        <!-- Required chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <!-- Chart doughnut -->
                        <script>
                            const dataDoughnut = {
                                labels: ["Colombianos", "Extrangeros", "Otros"],
                                datasets: [{
                                    label: "My First Dataset",
                                    data: [5000, 1500, 2100],
                                    backgroundColor: [
                                        "rgb(133, 105, 241)",
                                        "rgb(164, 101, 241)",
                                        "rgb(101, 143, 241)",
                                    ],
                                    hoverOffset: 4,
                                }, ],
                            };

                            const configDoughnut = {
                                type: "doughnut",
                                data: dataDoughnut,
                                options: {},
                            };

                            var chartBar = new Chart(
                                document.getElementById("chartDoughnut"),
                                configDoughnut
                            );
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <BR></BR>

        {{-- aqui va el contenido del mapa --}}
        <!-- mapa -->
        <BR></BR>
        <section class="relative text-gray-500 body-font">
            <div class="absolute inset-0 z-10 bg-gray-300">
                <div id="map" style="width: 100%; height: 100%; position: fixed;"></div>
            </div>
            <div class="container flex px-5 py-24 mx-auto">
                <div>
                    <div class="mt-20"> <label class="block mb-2 text-sm font-medium text-gray-100"></label>
                    </div>
                </div>
            </div>
        </section>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz4gdUPxRDbBhm_SuctQwVTLrbvItdvMU&callback=initMap"></script>
        <script>
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 3,
                    center: {
                        lat: 10.4063845,
                        lng: -75.510962
                    },
                    styles: [{
                            featureType: "poi",
                            stylers: [{
                                visibility: "off"
                            }]
                        },
                        {
                            featureType: "transit",
                            stylers: [{
                                visibility: "off"
                            }]
                        },
                        {
                            featureType: "road",
                            stylers: [{
                                visibility: "off"
                            }]
                        }
                    ]
                });

                const marker1 = new google.maps.Marker({
                    position: {
                        lat: 10.4053763,
                        lng: -75.5037299
                    },
                    map: map,
                    label: {
                        text: "Sede C, Cedesarrollo",
                        color: "blue",
                        fontSize: "14px",
                        fontWeight: "bold"
                    }
                });

                const marker2 = new google.maps.Marker({
                    position: {
                        lat: 10.4063845,
                        lng: -75.510962
                    },
                    map: map,
                    label: {
                        text: "Sede A, Principal",
                        color: "blue",
                        fontSize: "14px",
                        fontWeight: "bold"
                    }
                });

                const marker3 = new google.maps.Marker({
                    position: {
                        lat: 10.4039729,
                        lng: -75.5045049
                    },
                    map: map,
                    label: {
                        text: "Sede B, Zaragocilla",
                        color: "blue",
                        fontSize: "14px",
                        fontWeight: "bold"
                    }
                });
            }
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

<link rel="dns-prefetch" href="//unpkg.com" />
<link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<style>
    .sidebar {
        width: 4rem;
        transition: width 0.3s ease-in-out;
        background: linear-gradient(135deg, #bd0b29, #860211);
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
</style>
</head>

<body>
    <div class="fixed top-0 left-0 z-0 h-screen transition-all duration-300 ease-in-out sidebar">
        <h5 class="text-xs font-bold uppercase">Hermes</h5>
        <div class="drawer-content">
            <ul>
                <li>
                    <a href="/dashboard" onclick="estadisticas()" id="showContent" class="sidebar-item">
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
    <div class="h-screen antialiased bg-gray-100 sans-serif">
        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
            <div class="container px-4 py-2 mx-auto md:py-24">
                <div class="mb-4 text-xl font-bold text-gray-800">
                    CALENDARIO DE EVENTOS
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between px-6 py-2 bg-blue-800">
                        <div>
                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-white"></span>
                            <span x-text="year" class="ml-1 text-lg font-bold text-white"></span>
                        </div>
                        <div class="px-1 bg-white border rounded-lg " style="padding-top: 2px;">
                            <button type="button"
                                class="inline-flex items-center p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-blue-500"
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
                                class="inline-flex items-center p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-blue-500"
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
                                <div style="width: 14.28%; height: 120px" class="relative px-4 pt-2 border-b border-r">
                                    <div @click="showEventModal(date)" x-text="date"
                                        class="inline-flex items-center justify-center w-6 h-6 leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                        :class="{
                                            'bg-blue-500 text-white': isToday(date) ==
                                                true,
                                            'text-gray-700 hover:bg-blue-200': isToday(date) == false
                                        }">
                                    </div>
                                    <div style="height: 80px;" class="mt-1 overflow-y-auto">
                                        <template
                                            x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )"
                                            :key="event.event_title">
                                            <div @click="showEventDetails(event)"
                                                class="px-2 py-1 mt-1 overflow-hidden border rounded-lg cursor-pointer"
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
                                                <p x-text="event.event_title" class="text-sm leading-tight truncate">
                                                </p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Event Modal -->
            <div style=" background-color: rgba(0, 0, 0, 0.8)"
                class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full"
                x-show.transition.opacity="openEventModal">
                <div class="absolute relative left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
                    <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
                        <h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">Agregar Evento</h2>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Titulo del
                                Evento</label>
                            <input
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_title">
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800 ">Descripción del
                                Evento</label>
                            <input maxlength="200" type="text"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                x-model="event_description"></input>
                            <p10 class= "bg-slate-400">Max 200 palabras</p10>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Fecha del
                                Evento</label>
                            <input
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_date" readonly>
                        </div> --}}
                        <div class="inline-block w-64 mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Tema del
                                Evento</label>
                            <div class="relative">
                                <select x-model="event_theme"
                                    class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline">
                                    <template x-for="(theme, index) in ['blue', 'red', 'yellow', 'green', 'purple']">
                                        <option :value="theme"
                                            x-text="theme.charAt(0).toUpperCase() + theme.slice(1)">
                                        </option>
                                    </template>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293L9 11.586l3.707-4.293 1.414 1.414L9 14.414l-5.707-5.707z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-right">
                            <button type="button" @click="openEventModal = false"
                                class="px-4 py-2 mr-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg shadow-sm hover:bg-gray-100">
                                Cancelar
                            </button>
                            <button type="button" @click="addEvent()"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow-sm hover:bg-blue-600">
                                Guardar Evento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->
            <div style="background-color: rgba(0, 0, 0, 0.8)"
                class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full"
                x-show.transition.opacity="openEventDetailsModal">
                <div class="absolute relative left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
                    <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
                        <h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">Detalles del Evento</h2>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Titulo del
                                Evento</label>
                            <input
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_title">
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Descripción del
                                Evento</label>
                            <textarea maxlength="200"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                x-model="event_description"></textarea>
                            <p10>Max 200 palabras</p10>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Fecha del Evento</label>
                            <input
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_date" readonly>
                        </div> --}}
                        <div class="inline-block w-64 mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Tema del
                                Evento</label>
                            <div class="relative">
                                <select x-model="event_theme"
                                    class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline">
                                    <template x-for="(theme, index) in ['blue', 'red', 'yellow', 'green', 'purple']">
                                        <option :value="theme"
                                            x-text="theme.charAt(0).toUpperCase() + theme.slice(1)">
                                        </option>
                                    </template>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293L9 11.586l3.707-4.293 1.414 1.414L9 14.414l-5.707-5.707z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-right">
                            <button type="button" @click="editEvent()"
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Editar
                                Evento</button>
                            <button type="button" @click="deleteEvent()"
                                class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Eliminar
                                Evento</button>
                            <button type="button" @click="openEventDetailsModal = false"
                                class="px-4 py-2 ml-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg shadow-sm hover:bg-gray-100">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function app() {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days_in_month: [],
                events: [],
                event_title: '',
                event_description: '',
                event_date: '',
                event_theme: 'blue',
                openEventModal: false,
                openEventDetailsModal: false,
                selectedEventIndex: null,
                DAYS: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                MONTH_NAMES: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
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
                    this.openEventModal = true;
                    this.event_date = new Date(this.year, this.month, date).toDateString();
                },
                addEvent() {
                    if (this.event_title == '') {
                        return;
                    }

                    this.events.push({
                        event_title: this.event_title,
                        event_description: this.event_description,
                        event_date: this.event_date,
                        event_theme: this.event_theme
                    });

                    this.event_title = '';
                    this.event_description = '';
                    this.event_date = '';
                    this.event_theme = 'blue';

                    this.openEventModal = false;
                },
                showEventDetails(event) {
                    this.selectedEventIndex = this.events.indexOf(event);
                    this.event_title = event.event_title;
                    this.event_description = event.event_description;
                    this.event_date = event.event_date;
                    this.event_theme = event.event_theme;
                    this.openEventDetailsModal = true;
                },
                editEvent() {
                    if (this.selectedEventIndex !== null) {
                        this.events.splice(this.selectedEventIndex, 1, {
                            event_title: this.event_title,
                            event_description: this.event_description,
                            event_date: this.event_date,
                            event_theme: this.event_theme
                        });
                    }

                    this.openEventDetailsModal = false;
                },
                deleteEvent() {
                    if (this.selectedEventIndex !== null) {
                        if (confirm('¿Estás seguro que deseas eliminar este evento?')) {
                            this.events.splice(this.selectedEventIndex, 1);
                            this.selectedEventIndex = null;
                            this.event_title = '';
                            this.event_description = '';
                            this.event_date = '';
                            this.event_theme = 'blue';
                            this.openEventDetailsModal = false;
                        }
                    }
                },
                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    this.no_of_days = Array.from({
                        length: daysInMonth
                    }, (_, i) => i + 1);
                    this.blankdays = Array.from({
                        length: new Date(this.year, this.month, 1).getDay()
                    }, (_, i) => i);
                }
            };
        }
    </script>

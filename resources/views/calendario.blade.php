<link rel="dns-prefetch" href="//unpkg.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <style>
        [x-cloak] {
            display: none;
        }
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
                        <img src="/images/Eventosss.png" aria-hidden="true">
                        <span class="expand-text">Home</span>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="/calendario" onclick="calendario()" class="sidebar-item">
                        <img src="/images/calendariofinal.png" aria-hidden="true">
                        <span class="expand-text">Calendario</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="antialiased sans-serif bg-gray-100 h-screen">
        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
            <div class="container mx-auto px-4 py-2 md:py-24">
                <div class="font-bold text-gray-800 text-xl mb-4">
                    CALENDARIO DE EVENTOS
                </div>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="flex items-center justify-between py-2 px-6 bg-blue-800">
                        <div>
                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-white"></span>
                            <span x-text="year" class="ml-1 text-lg text-white font-bold"></span>
                        </div>
                        <div class="border rounded-lg px-1 bg-white " style="padding-top: 2px;">
                            <button type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer  hover:bg-blue-500 p-1 items-center"
                                :class="{ 'cursor-not-allowed opacity-25': month == 0 }"
                                :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <div class="border-r inline-flex h-6"></div>
                            <button type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer  hover:bg-blue-500 p-1"
                                :class="{ 'cursor-not-allowed opacity-25': month == 11 }"
                                :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
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
                                        class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center">
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="flex flex-wrap border-t border-l">
                            <template x-for="blankday in blankdays">
                                <div style="width: 14.28%; height: 120px"
                                    class="text-center border-r border-b px-4 pt-2"></div>
                            </template>
                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                    <div @click="showEventModal(date)" x-text="date"
                                        class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                        :class="{ 'bg-blue-500 text-white': isToday(date) ==
                                            true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                    </div>
                                    <div style="height: 80px;" class="overflow-y-auto mt-1">
                                        <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )" :key="event.event_title">
                                            <div @click="showEventDetails(event)" class="px-2 py-1 rounded-lg mt-1 overflow-hidden border cursor-pointer"
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
                                                <p x-text="event.event_title" class="text-sm truncate leading-tight"></p>
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
                class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full"
                x-show.transition.opacity="openEventModal">
                <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                    <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Agregar Evento</h2>
                        <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Titulo del
                                Evento</label>
                            <input
                                class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_title">
                        </div>
                        <div class="mb-4">
                            <label   class="text-gray-800 block mb-1 font-bold text-sm tracking-wide ">Descripción del Evento</label>
                            <input maxlength="200"
                                type="text" class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                                x-model="event_description"></input>
                                <p10 class= "bg-slate-400">Max 200 palabras</p10>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Fecha del
                                Evento</label>
                            <input
                                class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_date" readonly>
                        </div> --}}
                        <div class="inline-block w-64 mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Tema del
                                Evento</label>
                            <div class="relative">
                                <select x-model="event_theme"
                                    class="block appearance-none w-full bg-white border border-gray-300 px-4 py-2 pr-8 rounded-lg focus:outline-none focus:shadow-outline">
                                    <template x-for="(theme, index) in ['blue', 'red', 'yellow', 'green', 'purple']">
                                        <option :value="theme" x-text="theme.charAt(0).toUpperCase() + theme.slice(1)">
                                        </option>
                                    </template>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293L9 11.586l3.707-4.293 1.414 1.414L9 14.414l-5.707-5.707z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-right">
                            <button type="button" @click="openEventModal = false"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow-sm mr-2">
                                Cancelar
                            </button>
                            <button type="button" @click="addEvent()"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-sm">
                                Guardar Evento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->
            <div style="background-color: rgba(0, 0, 0, 0.8)"
                class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full"
                x-show.transition.opacity="openEventDetailsModal">
                <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                    <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Detalles del Evento</h2>
                        <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Titulo del Evento</label>
                            <input
                                class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_title">
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Descripción del Evento</label>
                            <textarea maxlength="200"
                            class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                            x-model="event_description"></textarea>
                            <p10>Max 200 palabras</p10>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Fecha del Evento</label>
                            <input
                                class="p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-blue-500"
                                type="text" x-model="event_date" readonly>
                        </div> --}}
                        <div class="inline-block w-64 mb-4">
                            <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Tema del Evento</label>
                            <div class="relative">
                                <select x-model="event_theme"
                                    class="block appearance-none w-full bg-white border border-gray-300 px-4 py-2 pr-8 rounded-lg focus:outline-none focus:shadow-outline">
                                    <template x-for="(theme, index) in ['blue', 'red', 'yellow', 'green', 'purple']">
                                        <option :value="theme" x-text="theme.charAt(0).toUpperCase() + theme.slice(1)">
                                        </option>
                                    </template>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293L9 11.586l3.707-4.293 1.414 1.414L9 14.414l-5.707-5.707z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-right">
                            <button type="button" @click="editEvent()"
                                class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white">Editar Evento</button>
                            <button type="button" @click="deleteEvent()"
                                class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white">Eliminar Evento</button>
                            <button type="button" @click="openEventDetailsModal = false"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow-sm ml-2">
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
                MONTH_NAMES: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
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

                    this.no_of_days = Array.from({ length: daysInMonth }, (_, i) => i + 1);
                    this.blankdays = Array.from({ length: new Date(this.year, this.month, 1).getDay() }, (_, i) => i);
                }
            };
        }
    </script>

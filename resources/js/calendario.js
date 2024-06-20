
        const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        ];
        const DAYS = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];

        let events = [{
            event_date: new Date(2023, 5, 25),
            event_title: "Evento en Español",
            event_theme: 'blue'
        }];

        function init() {
            const calendarGrid = document.getElementById('calendar-grid');
            const monthName = document.getElementById('month-name');
            const year = document.getElementById('year');

            let today = new Date();
            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();

            renderCalendar(currentMonth, currentYear);

            document.getElementById('prev-month').addEventListener('click', function() {
                currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
                currentYear = currentMonth === 11 ? currentYear - 1 : currentYear;
                renderCalendar(currentMonth, currentYear);
            });

            document.getElementById('next-month').addEventListener('click', function() {
                currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
                currentYear = currentMonth === 0 ? currentYear + 1 : currentYear;
                renderCalendar(currentMonth, currentYear);
            });

            function renderCalendar(month, year) {
            calendarGrid.innerHTML = '';
            monthName.textContent = MONTH_NAMES[month];
            year.textContent = year;

            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const emptyCell = document.createElement('div');
                emptyCell.className = 'px-2 py-2 border-t border-r text-center';
                emptyCell.style.width = '14.2857%';
                calendarGrid.appendChild(emptyCell);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dateCell = document.createElement('div');
                dateCell.className = 'px-2 py-2 border-t border-r border-b text-relative relative cursor-pointer'; // Agregamos border-b
                dateCell.style.width = '14.2857%';
                dateCell.textContent = day;

                const eventTitleContainer = document.createElement('div');
                eventTitleContainer.className = 'text-xs text-gray-600 mt-10';
                dateCell.appendChild(eventTitleContainer);

                const currentDate = new Date(year, month, day);
                const event = events.find(e => e.event_date.toDateString() === currentDate.toDateString());

                if (event) {
                    const eventMarker = document.createElement('div');
                    eventMarker.className = `flex items-center justify-center h-6 w-full rounded-lg bg-${event.event_theme}-500 text-white font-bold`;
                    eventMarker.textContent = event.event_title;
                    dateCell.appendChild(eventMarker);
                }

                // Marcar el día actual
                if (currentDate.toDateString() === new Date().toDateString()) {
                    dateCell.classList.add('bg-blue-100');
                }

                dateCell.addEventListener('click', function() {
                    document.getElementById('modal').classList.remove('hidden');
                    document.getElementById('event-date').value = currentDate.toLocaleDateString('es-ES', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById('save-button').addEventListener('click', function() {
                        const eventTitle = document.getElementById('event-title').value;
                        const eventTheme = document.getElementById('event-theme').value;
                        events.push({
                            event_date: currentDate,
                            event_title: eventTitle,
                            event_theme: eventTheme
                        });
                        renderCalendar(currentMonth, currentYear);
                        document.getElementById('modal').classList.add('hidden');
                    });
                });

                calendarGrid.appendChild(dateCell);
            }
        }

            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });

            document.getElementById('cancel-button').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });
        }


        document.addEventListener('DOMContentLoaded', init);

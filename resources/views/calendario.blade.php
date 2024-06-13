<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario con Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1rem;
        }
        .day {
            padding: 1rem;
            background-color: #f9fafb;
            text-align: center;
            border-radius: 0.5rem;
            cursor: pointer;
        }
        .day:hover {
            background-color: #e5e7eb;
        }
        .selected {
            background-color: #3b82f6;
            color: white;
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
<body class="bg-gray-100 p-10">

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
                    <a href="#" onclick="home()" id="showContent" class="sidebar-item">
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
            <ul class="mt-auto logout">
                <li class="mb-5">
                    <a href="#" onclick="logout()" class="sidebar-item">
                        <img src="\images\salirbasb.png" aria-hidden="true">
                        <span class="expand-text">Sign off</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8">Calendario</h1>
        <div id="calendar" class="calendar"></div>
    </div>
    <script>
        const calendarElement = document.getElementById('calendar');
        const daysInMonth = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();

        function createCalendar() {
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'day';
                dayElement.innerText = day;
                dayElement.addEventListener('click', () => {
                    document.querySelectorAll('.day').forEach(d => d.classList.remove('selected'));
                    dayElement.classList.add('selected');
                });
                calendarElement.appendChild(dayElement);
            }
        }

        createCalendar();
    </script>
</body>
</html>

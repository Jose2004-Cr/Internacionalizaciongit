<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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

    <body class="bg-gray-100">
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
    </body>
</body>

</html>

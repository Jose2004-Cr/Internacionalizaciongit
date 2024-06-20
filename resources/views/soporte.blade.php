<x-app-layout>
    @vite(['resources/css/soporte.css', 'resources/js/soporte.js'])

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
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
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        </head>

        <body>
            <div class="container">
                <header>
                    <h1>Soporte</h1>
                    <p>En caso de <strong>bugs, orientación o capacitación</strong>, por favor contactar con el equipo
                        de desarrollo</p>
                </header>
                <div class="profiles">
                    <div class="profile-card">
                        <h2>Web Developer</h2>
                        <p class="name">Johan Valencia</p>
                        <p class="about">About: Backend Developer / Base De Datos</p>
                        <p><i class="fas fa-map-marker-alt"></i> Dirección: Centro de Innovación</p>
                        <p><i class="fas fa-phone-alt"></i> Phone #: + 800 - 12 12 23 52</p>
                        <div class="buttons">
                            <button class="chat" onclick="chatWith('Johan Valencia')"><i
                                    class="fas fa-comments"></i></button>
                            <button class="view-profile" onclick="viewProfile('Johan Valencia')"><i
                                    class="fas fa-user"></i> View Profile</button>
                        </div>
                    </div>
                    <div class="profile-card">
                        <h2>Web Developer</h2>
                        <p class="name">Jose Camargo</p>
                        <p class="about">About: Web Designer / Software Developer </p>
                        <p><i class="fas fa-map-marker-alt"></i> Dirección: Centro de Innovación</p>
                        <p><i class="fas fa-phone-alt"></i> Phone #: + 800 - 12 12 23 52</p>
                        <div class="buttons">
                            <button class="chat" onclick="chatWith('Jose Camargo')"><i
                                    class="fas fa-comments"></i></button>
                            <button class="view-profile" onclick="viewProfile('Jose Camargo')"><i
                                    class="fas fa-user"></i> View Profile</button>
                        </div>
                    </div>
                    <div class="profile-card">
                        <h2>Web Developer</h2>
                        <p class="name">Carlos Escobar</p>
                        <p class="about">About: Software Developer</p>
                        <p><i class="fas fa-map-marker-alt"></i> Dirección: Centro de Innovación</p>
                        <p><i class="fas fa-phone-alt"></i> Phone #: + 800 - 12 12 23 52</p>
                        <div class="buttons">
                            <button class="chat" onclick="chatWith('Carlos Escobar')"><i
                                    class="fas fa-comments"></i></button>
                            <button class="view-profile" onclick="viewProfile('Carlos Escobar')"><i
                                    class="fas fa-user"></i> View Profile</button>
                        </div>
                    </div>
                    <div class="profile-card">
                        <h2>Web Developer</h2>
                        <p class="name"></p>
                        <p class="about">About: Software Developer</p>
                        <p><i class="fas fa-map-marker-alt"></i> Dirección: Centro de Innovación</p>
                        <p><i class="fas fa-phone-alt"></i> Phone #: + 800 - 12 12 23 52</p>
                        <div class="buttons">
                            <button class="chat" onclick="chatWith('Julian Santana')"><i
                                    class="fas fa-comments"></i></button>
                            <button class="view-profile" onclick="viewProfile('Julian Santana')"><i
                                    class="fas fa-user"></i> View Profile</button>
                        </div>
                    </div>

                </div>
                <div class="pagination">
                    <button class="page active">1</button>
                </div>
            </div>
            <script src="scripts.js"></script>
        </body>
   <link rel="stylesheet" href="styles.css">
   <body>
    <div id="chatbot">
        <button id="chatbot-btn">
            <img src="chatbot-icon.png" alt="Chatbot Icon">
        </button>
        <div id="chat-window" class="hidden">
            <div id="chat-header">
                <span>Soporte Técnico</span>
                <button id="close-chat">&times;</button>
            </div>
            <div id="chat-content">
                <div class="message bot-message">Hola! ¿En qué puedo ayudarte hoy?</div>
            </div>
            <div id="chat-input">
                <input type="text" id="user-input" placeholder="Escribe un mensaje...">
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

    </body>

</x-app-layout>

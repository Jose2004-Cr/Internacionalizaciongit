
    <div class="fixed top-0 left-0 z-10 h-screen transition-all duration-300 ease-in-out sidebar">
        <h5 class="text-xs font-bold uppercase">
            Hermes
        </h5>
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

    <div>
        <div class="flex-row p-4 d-flex justify-content-center align-items-center min-vh-100 bg-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="bg-white rounded shadow col-md-5 scrollable-table">
                        <h2 class="mb-3 text-center text-primary fw-bold">Usuarios por país</h2>
                        <input type="text" id="search" class="form-control search-bar" placeholder="Buscar por país...">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>País</th>
                                    <th>Detalles</th>

                                </tr>
                            </thead>
                            <tbody id="user-table"></tbody>
                        </table>
                        <div id="pagination" class="mb-3 d-flex justify-content-center">
                             <button id="prev" class="pagination-button me-2">Anterior <- </button> 
                             <button id="next" class="pagination-button">Siguiente -> </button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div id="location" class="w-100"></div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center min-h-screen p-4 bg-gray-100">
                <div class="flex flex-col w-full gap-4 xl:flex-row xl:w-11/12 lg:w-10/12">
                    <div id="location" class="w-full xl:w-3/4"></div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<x-app-layout>
    @vite(['resources/css/configuracion.css', 'resources/css/certificado.css', 'resources/js/certificados.js'])

    <body class="bg-gray-100">
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
        </head>

        <body>
            <div id="section1" class="container">
                <div class="section">
                    <h2>Configuracion Software</h2>
                    <div class="line"></div>
                    <button class="button" data-section="form1" onclick="toggleForm('form1')">▼</button>
                </div>
                <div id="form1" class="form-container">
                    <form>
                        <label for="field1">Field 1:</label>
                        <input type="text" id="field1" name="field1"><br><br>
                        <label for="field2">Field 2:</label>
                        <input type="text" id="field2" name="field2"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div id="section2" class="container">
                <div class="section">
                    <h2>Configuracion Clases</h2>
                    <div class="line"></div>
                    <button class="button" data-section="form2" onclick="toggleForm('form2')">▼</button>
                </div>
                <div id="form2" class="form-container">
                    <form>
                        <label for="field3">Field 3:</label>
                        <input type="text" id="field3" name="field3"><br><br>
                        <label for="field4">Field 4:</label>
                        <input type="text" id="field4" name="field4"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div id="section3" class="container">
                <div class="section">
                    <h2>Certificación</h2>
                    <div class="line"></div>
                    <button class="button" data-section="form3" onclick="toggleForm('form3')">▼</button>
                </div>
                <div id="form3" class="form-container">
                    <div class="container">
                        <form id="certForm">
                            <div class="form-group">
                                <label for="name">Nombre del Participante:</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="course">Nombre del Curso:</label>
                                <input type="text" class="form-control" id="course" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Fecha de Finalización:</label>
                                <input type="date" class="form-control" id="date" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Descargar PDF</button>
                            </div>
                        </form>
                    </div>

                    <div id="certificate" class="certificate" style="display: none;">
                        <img class="logo" src="/images/confecerti.png" alt="Logo">
                        <div class="header">
                            <h2>Fundación Universitaria Tecnológico Comfenalco</h2>
                            <h3>Otorga reconocimiento a</h3>
                            <h2 id="certName"></h2>
                            <h2>FACULTAD DE INGENIERÍA</h2>
                            <p>POR SU PARTICIPACIÓN EN LOS EVENTOS REALIZADOS POR LA INSTITUCION UNIVERSITARIA TECNOLOGICO COMFENALCO</p>
                            <p><span id="certDateText"></span></p>
                        </div>
                        <div class="signature">
                            <div>
                                <p>_____________________________</p>
                                <p></p>
                                <p>Rector</p>
                            </div>
                            <div>
                                <p>_____________________________</p>
                                <p></p>
                                <p>Vicerrector Académico</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function toggleForm(formId) {
                    const form = document.getElementById(formId);
                    form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
                }

                function toggleMenu() {
                    const menu = document.getElementById('menu');
                    menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
                }

                document.getElementById('certForm').addEventListener('submit', function(event) {
                    event.preventDefault();

                    const name = document.getElementById('name').value;
                    const course = document.getElementById('course').value;
                    const date = new Date(document.getElementById('date').value).toLocaleDateString();

                    document.getElementById('certName').innerText = name;
                    document.getElementById('certDateText').innerText = date;

                    const certificate = document.getElementById('certificate');
                    certificate.style.display = 'block';

                    const loadImage = (url) => {
                        return new Promise((resolve, reject) => {
                            const img = new Image();
                            img.src = url;
                            img.onload = () => resolve(img);
                            img.onerror = (err) => reject(err);
                        });
                    };

                    const generatePDF = async () => {
                        await loadImage(document.querySelector('.logo').src);

                        html2canvas(certificate, { scale: 2 }).then(canvas => {
                            const imgData = canvas.toDataURL('image/png');
                            const { jsPDF } = window.jspdf;
                            const pdf = new jsPDF('landscape');
                            pdf.addImage(imgData, 'PNG', 0, 0, 297, 210);
                            pdf.save("certificado.pdf");

                            certificate.style.display = 'none';
                        }).catch(error => {
                            console.error('Error generating PDF:', error);
                            certificate.style.display = 'none';
                        });
                    };

                    generatePDF();
                });
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        </body>
    </body>

</x-app-layout>

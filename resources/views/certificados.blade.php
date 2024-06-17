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

    .sidebar-content {
        margin-left: 4rem;
        transition: margin-left 0.3s ease-in-out;
    }

    .sidebar:hover ~ .sidebar-content {
        margin-left: 10rem;
    }
</style>
</head>
<body class="bg-gray-100">

<div class="fixed top-0 left-0 z-10 h-screen transition-all duration-300 ease-in-out sidebar">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        padding: 20px;
        background-color: #f0f0f0;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-left: 10px solid #0F293E;
        border-right: 10px solid #5e020c;
    }

    .container h2 {
        color: #0F293E;
    }

    .certificate {
        position: relative;
        width: 800px;
        height: 600px;
        background: url('/images/Certificado de Reconocimiento Médico Moderno Azul.png') no-repeat center center;
        background-size: cover;
        color: black;
        padding: 50px;
        text-align: center;
        margin: auto;
    }

    .certificate h1 {
        font-size: 2em;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .certificate h2 {
        font-size: 1.5em;
        margin-top: 20px;
    }

    .certificate h3 {
        font-size: 1.2em;
    }

    .certificate p {
        font-size: 1em;
        margin-top: 20px;
    }

    .certificate .header {
        margin-bottom: 30px;
    }

    .certificate .logo {
        width: 100px;
        margin-bottom: 20px;
    }

    .certificate .signature {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 50px;
        font-size: 1em;
    }

    .certificate .signature img {
        width: 150px;
    }

    .certificate .signature div {
        text-align: center;
    }

    .certificate .footer {
        margin-top: 50px;
    }

    .certificate .footer p {
        margin: 0;
    }
</style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Certificado</h2>
    <form id="certForm">
        <div class="form-group">
            <label for="name">Nombre del Participante:</label>
            <input type="text" class="form-control" id="name" required>
            <p>Colocar nombre completo en MAYUSCULA</p>
        </div>
        <div class="form-group">
            <label for="course">Nombre del Curso:</label>
            <input type="text" class="form-control" id="course" required>
        </div>
        <div class="form-group">
            <label for="date">Fecha de Finalización:</label>
            <input type="date" class="form-control" id="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Generar Certificado</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    document.getElementById('certForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const course = document.getElementById('course').value;
        const date = new Date(document.getElementById('date').value).getDate();

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
</body>


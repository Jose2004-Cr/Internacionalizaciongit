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

    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 500px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h2 {
        margin: 0;
    }

    .modal-body {
        margin-top: 1rem;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 1rem;
    }

    .slide-in {
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 0;
        overflow: hidden;
        background: white;
        transition: width 0.3s ease-in-out;
        box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .slide-in.active {
        width: 20rem;
    }
</style>
</head>

<body class="bg-gray-100">

    <div class="fixed top-0 left-0 z-10 h-screen transition-all duration-300 ease-in-out sidebar">
        <h5 class="text-xs font-bold uppercase">Hermes</h5>
        <div class="drawer-content">
            <ul>
                <li>
                    <a href="/iniciodasboard" onclick="estadisticas()" id="showContent" class="sidebar-item">
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

    <div class="container px-40 mx-auto mt-20">
        <div class="flex items-center justify-between mb-10">
            <h1 class="text-2xl font-bold">Editar Perfil ...</h1>
        </div>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            .hidden { display: none; }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const photoInput = document.getElementById('photo');
                const photoPreviewContainer = document.getElementById('photo-preview-container');
                const currentPhotoContainer = document.getElementById('current-photo-container');
                const photoPreview = document.getElementById('photo-preview');
                const deletePhotoButton = document.getElementById('delete-photo-button');
                const verificationLinkSent = document.getElementById('verification-link-sent');

                photoInput.addEventListener('change', function () {
                    const file = photoInput.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            photoPreview.src = e.target.result;
                            photoPreviewContainer.classList.remove('hidden');
                            currentPhotoContainer.classList.add('hidden');
                        };
                        reader.onerror = function () {
                            alert('Failed to read file. Please try again.');
                        };
                        reader.readAsDataURL(file);
                    }
                });

                deletePhotoButton.addEventListener('click', function () {
                    currentPhotoContainer.classList.add('hidden');
                    photoPreviewContainer.classList.add('hidden');
                    photoInput.value = '';
                });

                window.sendEmailVerification = function () {
                    // Logic to send email verification
                    verificationLinkSent.classList.remove('hidden');
                };
            });
        </script>
    </head>
    <body class="flex items-center justify-center min-h-screen bg-gray-100">
        <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">Informacion De Perfil</h2>
            <p class="mb-6"></p>

            <form action="{{ route('editarperfil') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Profile Photo -->
                <div class="mb-6">
                    <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="photo" name="photo" class="hidden">

                    <!-- Current Profile Photo -->
                    <div id="current-photo-container" class="mt-2">
                        <img id="current-photo" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="object-cover w-20 h-20 rounded-full">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div id="photo-preview-container" class="hidden mt-2">
                        <img id="photo-preview" class="object-cover w-20 h-20 rounded-full">
                    </div>

                    <button type="button" class="px-4 py-1 mt-2 text-white bg-blue-500 rounded hover:bg-blue-700" onclick="document.getElementById('photo').click();">Seleccionar Nueva Foto</button>
                    <button type="button" id="delete-photo-button" class="px-4 py-1 mt-2 text-white bg-red-500 rounded hover:bg-red-700">Eliminar Foto</button>
                </div>

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ $user->name }}" required autocomplete="name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                    <input id="email" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $user->hasVerifiedEmail())
                        <p class="mt-2 text-sm text-red-600">Your email address is unverified.</p>
                        <button type="button" class="px-4 py-1 mt-2 text-white bg-yellow-500 rounded hover:bg-yellow-700" onclick="sendEmailVerification()">Click here to re-send the verification email.</button>
                    @endif
                </div>

                <div class="mb-6">
                    <p id="verification-link-sent" class="hidden text-sm text-green-600">A new verification link has been sent to your email address.</p>
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Guardar</button>
                </div>
            </form>
        </section>
    </body>
    </div>
</body>




























{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

</html> --}}

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    @vite(['resources/css/perfil.css'])
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
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
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>















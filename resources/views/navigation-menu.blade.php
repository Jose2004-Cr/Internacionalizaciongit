<nav x-data="{ open: false }" class="bg-white px-6 py-[20px] flex items-center justify-between shadow-sm">
    <!-- Menu Toggle Button -->
    <a @click="open = !open" href="#" class="text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </a>

    <!-- Search Input -->
    <div class="flex items-center">
        <div x-data="{ open: false }" @click.away="open = false" class="relative ml-3">
            <a @click="open = !open" href="#" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"/>
                  </svg>
            </a>

            <div x-show="open" class="absolute right-0 w-64 mt-2 bg-white rounded-md shadow-lg">
                <div class="flex items-center justify-between px-3 pt-2 pb-3 border-b">
                    <span class="text-lg font-semibold text-gray-800">Notifications</span>
                    <a href="#" @click="open = false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            </svg>
                        </span>
                    </a>
                </div>

                <ul class="h-56" data-simplebar="">
                    <li class="px-3 py-2 bg-gray-100 border-b">
                        <a href="#">
                            <h5 class="mb-1">Rishi Chopra</h5>
                            <p class="mb-0">Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.</p>
                        </a>
                    </li>
                    <!-- Additional Notification Items Here -->
                    <div class="px-3 py-2 border-t">
                        <a href="#" class="text-indigo-500">See All Notifications</a>
                    </div>
                </ul>
            </div>
        </div>

        <!-- Profile Dropdown -->
        <div x-data="{ open: false }" @click.away="open = false" class="relative ml-3">
            <a @click="open = !open" href="#" class="flex-shrink-0">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Avatar">
            </a>

            <div x-show="open" class="absolute right-0 w-48 mt-2 bg-white rounded-md shadow-lg">
                <a href="{{ route('editarperfil') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                   Perfil
                </a>
                <a href="{{ route('comfiguracionAva') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                   Configuracion
                </a>
                <div class="border-t border-gray-100"></div>
                <a href="#" onclick="logout()"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Sign Out</a>
            </div>
            <script>
                function logout() {
                    fetch('/logout', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = '/';
                            } else {
                                alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
                            }
                        })
                        .catch(error => {
                            alert('Error al cerrar la sesión. Por favor, inténtalo de nuevo.');
                            console.error(error);
                        });
                }
            </script>
        </div>
        <!-- Notification Dropdown -->
    </div>
</nav>

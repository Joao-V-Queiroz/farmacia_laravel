@include('layouts.header')

<body class="bg-blue-100">
    <!-- Cabeçalho -->
    <header class="flex items-center justify-between bg-white shadow-md px-6 py-4">
        <div class="flex items-center space-x-4">
            <!-- Botão de menu lateral -->
            <button
                class="inline-flex items-center rounded-lg p-2 text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 sm:hidden"
                data-drawer-target="default-sidebar"
                data-drawer-toggle="default-sidebar"
                type="button"
                aria-controls="default-sidebar">
                <span class="sr-only">Abrir menu</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5h14a1 1 0 100-2H3a1 1 0 000 2zm0 6h14a1 1 0 100-2H3a1 1 0 000 2zm0 6h14a1 1 0 100-2H3a1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Painel de Controle</h1>
        </div>

        <!-- Botão de logout -->
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="rounded-md bg-red-500 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Sair
                </button>
            </form>
        @endauth
    </header>

    <!-- Menu lateral -->
    <aside
        class="fixed top-0 left-0 z-40 h-screen w-64 bg-gray-50 shadow-lg dark:bg-gray-800 sm:translate-x-0 transform -translate-x-full transition-transform"
        id="default-sidebar" aria-label="Sidebar">
        <div class="h-full overflow-y-auto px-4 py-6">
            <ul class="space-y-4">
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-blue-100 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a9 9 0 100 18 9 9 0 000-18zm0 2a7 7 0 110 14 7 7 0 010-14zm1 4H8v2h5V8zm0 4H8v2h5v-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-blue-100 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.75 2A1.75 1.75 0 005 3.75v16.5A1.75 1.75 0 006.75 22h10.5A1.75 1.75 0 0019 20.25V3.75A1.75 1.75 0 0017.25 2H6.75zM7 4h10v12H7V4zm0 14v2h10v-2H7z" />
                        </svg>
                        <span>Medicamentos</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-blue-100 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1 15H9V9h2v8zm4 0h-2v-4h2v4z" />
                        </svg>
                        <span>Usuários</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Conteúdo principal -->
    <main class="sm:ml-64 p-6">
        @yield('main-content')
    </main>

    @include('layouts.footer')
    @stack('js')
</body>

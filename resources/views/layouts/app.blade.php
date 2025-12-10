<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-gray-100 text-gray-800 font-sans flex flex-col min-h-screen">

    <header class="fixed top-0 left-0 w-full bg-white text-white flex justify-between items-center px-6 py-3 shadow-md z-50">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Sistem Absensi" class="w-10 h-10 rounded-full">
            <div>
                <h1 class="font-bold text-blue-900 text-lg">SISENSI</h1>
                <p class="text-xs text-blue-900">Sistem Absensi Mahasiswa</p>
            </div>
        </div>

        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                @if(Auth::user()->photo ?? false)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-8 h-8 rounded-full border border-gray-400" alt="Foto Profil">
                @else
                    <i class="fas fa-user-circle text-3xl text-gray-300"></i>
                @endif

                <div class="text-left hidden md:block">
                    <p class="font-semibold text-blue-900 text-sm">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-400 capitalize">{{ Auth::user()->role ?? '-' }}</p>
                </div>

                <i class="fas fa-chevron-down text-xs"></i>
            </button>

            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg py-2 z-50">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">
                    <i class="fas fa-user mr-2 text-gray-500"></i> Profil
                </a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="flex flex-1 pt-16">
        @include('layouts.sidebar')

        <main id="mainContent" class="ml-64 flex-1 p-6 transition-all duration-300">
            <div class="bg-white shadow p-4 rounded-lg mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold">@yield('page-title', 'Dashboard')</h1>
            </div>
            @yield('content')
        </main>
    </div>

    @yield('scripts')

<script>
window.addEventListener("load", () => {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    const textElements = sidebar.querySelectorAll('nav a span');
    const mainContent = document.getElementById('mainContent');

    if (!sidebar || !toggleBtn) {
        console.warn("Sidebar toggle button not found");
        return;
    }

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20');

        textElements.forEach(el => el.classList.toggle('hidden'));

        if (mainContent) {
            mainContent.classList.toggle('ml-64');
            mainContent.classList.toggle('ml-20');
        }
    });
});
</script>

</body>
</html>

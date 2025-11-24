<div id="sidebar" class="bg-white text-blue-900 h-[calc(100vh-4rem)] fixed left-0 top-16 w-64 p-4 flex flex-col transition-all duration-300 shadow-lg z-40">
    <div class="flex items-center justify-end mb-6">
        <button id="sidebarToggleBtn" class="text-blue-900 hover:text-blue-600 text-2xl focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <nav class="flex-1 space-y-2 overflow-y-auto">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-300' : '' }}">
                <i class="fas fa-home mr-3"></i>
                <span>Dashboard Admin</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-user-graduate mr-3"></i>
                <span>Data Mahasiswa</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-chalkboard-teacher mr-3"></i>
                <span>Data Dosen</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-calendar-alt mr-3"></i>
                <span>Jadwal Kuliah</span>
            </a>
            <a href="{{ route('admin.absensi.index') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-file-alt mr-3"></i>
                <span>Laporan Absensi</span>
            </a>
        @endif

        @if(Auth::user()->role === 'dosen')
            <a href="{{ route('dosen.dashboard') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200 {{ request()->routeIs('dosen.dashboard') ? 'bg-blue-300' : '' }}">
                <i class="fas fa-home mr-3"></i>
                <span>Dashboard Dosen</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-users mr-3"></i>
                <span>Data Kelas</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-user-check mr-3"></i>
                <span>Kehadiran Mahasiswa</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-chart-bar mr-3"></i>
                <span>Rekap Absensi</span>
            </a>
        @endif

        @if(Auth::user()->role === 'mahasiswa')
            <a href="{{ route('mahasiswa.dashboard') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-blue-300' : '' }}">
                <i class="fas fa-home mr-3"></i>
                <span>Dashboard Mahasiswa</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-book mr-3"></i>
                <span>Jadwal Mata Kuliah</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-200">
                <i class="fas fa-clock mr-3"></i>
                <span>Riwayat Absensi</span>
            </a>
        @endif
    </nav>
</div>
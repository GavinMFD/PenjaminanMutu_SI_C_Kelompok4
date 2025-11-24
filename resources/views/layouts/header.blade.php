<div class="flex justify-between items-center bg-white p-4 shadow-sm rounded-lg mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Manajemen Absensi')</h1>
        <p class="text-sm text-gray-500">@yield('page-subtitle', 'Catat dan kelola absensi mahasiswa')</p>
    </div>

    <div class="flex items-center space-x-3">
        <div class="text-right">
            <h2 class="font-semibold text-gray-700">CJ</h2>
            <p class="text-sm text-gray-500">Administrator</p>
        </div>
        <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full border">
    </div>
</div>

@extends('layouts.app')
@section('title', 'Dashboard Mahasiswa')
@section('page-title', 'Dashboard Mahasiswa')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <i class="fas fa-book-open text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Mata Kuliah Diambil</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $mataKuliah }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full text-green-600">
                <i class="fas fa-clipboard-check text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Pertemuan Dihadiri</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $hadir }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <i class="fas fa-percent text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Kehadiran Keseluruhan</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $persentaseKehadiran }}%</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-red-100 p-3 rounded-full text-red-600">
                <i class="fas fa-tasks text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Tugas Aktif</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $tugasAktif }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-center mb-10">
        <a href="{{ route('mahasiswa.scan') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition">
            <i class="fas fa-qrcode text-lg"></i>
            <span class="font-medium">Scan QR Code</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Rekap Kehadiran</h2>
            <canvas id="pieChart"></canvas>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Kehadiran per Mata Kuliah</h2>
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const pieCtx = document.getElementById('pieChart');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Hadir', 'Izin', 'Alpha'],
            datasets: [{
                data: [{{ $kehadiranPie['hadir'] }}, {{ $kehadiranPie['izin'] }}, {{ $kehadiranPie['alpha'] }}],
                backgroundColor: ['#16a34a', '#facc15', '#ef4444']
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    const barCtx = document.getElementById('barChart');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($kehadiranMatkul)) !!},
            datasets: [{
                label: 'Persentase Kehadiran (%)',
                data: {!! json_encode(array_values($kehadiranMatkul)) !!},
                backgroundColor: '#3b82f6'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
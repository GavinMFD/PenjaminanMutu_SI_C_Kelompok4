@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

{{-- === Statistik Cards === --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
        <div class="bg-blue-100 p-3 rounded-full text-blue-600">
            <i class="fas fa-user-graduate text-xl"></i>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm">Total Mahasiswa</h3>
            <p class="text-xl font-semibold text-gray-800">1,240</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
        <div class="bg-green-100 p-3 rounded-full text-green-600">
            <i class="fas fa-chalkboard-teacher text-xl"></i>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm">Total Dosen</h3>
            <p class="text-xl font-semibold text-gray-800">32</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
        <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
            <i class="fas fa-users text-xl"></i>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm">Kelas Aktif</h3>
            <p class="text-xl font-semibold text-gray-800">18</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
        <div class="bg-red-100 p-3 rounded-full text-red-600">
            <i class="fas fa-calendar-check text-xl"></i>
        </div>
        <div>
            <h3 class="text-gray-500 text-sm">Kehadiran Hari Ini</h3>
            <p class="text-xl font-semibold text-gray-800">87%</p>
        </div>
    </div>
</div>

{{-- === Grafik Kehadiran Mingguan === --}}
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Grafik Kehadiran Mingguan</h2>
    <canvas id="attendanceChart" height="100"></canvas>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('attendanceChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Persentase Kehadiran (%)',
                data: [92, 88, 90, 94, 87],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, max: 100 }
            }
        }
    });
</script>
@endsection

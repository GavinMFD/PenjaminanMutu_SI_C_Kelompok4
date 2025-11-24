@extends('layouts.app')
@section('title', 'Dashboard Dosen')
@section('page-title', 'Dashboard Dosen')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <i class="fas fa-chalkboard-teacher text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Kelas Diampu</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $kelas }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full text-green-600">
                <i class="fas fa-user-graduate text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Mahasiswa Terdaftar</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $mahasiswa }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <i class="fas fa-clipboard-check text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Rata-Rata Kehadiran</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $rataKehadiran }}%</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center space-x-4">
            <div class="bg-red-100 p-3 rounded-full text-red-600">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Aktivitas Minggu Ini</h3>
                <p class="text-xl font-semibold text-gray-800">
                    {{ array_sum($grafikKehadiran) / count($grafikKehadiran) }}%
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Grafik Kehadiran Mingguan</h2>
        </div>
        <canvas id="kehadiranChart" height="100"></canvas>
    </div>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold text-gray-800">Absensi Terbaru</h2>
        <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Nama Mahasiswa</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Waktu Check-in</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">2025-11-09</td>
                    <td class="py-3 px-4">Ahmad Fauzi</td>
                    <td class="py-3 px-4">SI-C</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Hadir</span>
                    </td>
                    <td class="py-3 px-4">07:55</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">2025-11-09</td>
                    <td class="py-3 px-4">Rina Putri</td>
                    <td class="py-3 px-4">SI-A</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Izin</span>
                    </td>
                    <td class="py-3 px-4">-</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">2025-11-09</td>
                    <td class="py-3 px-4">Dedi Saputra</td>
                    <td class="py-3 px-4">SI-B</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Alpha</span>
                    </td>
                    <td class="py-3 px-4">-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('kehadiranChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($grafikKehadiran)) !!},
            datasets: [{
                label: 'Persentase Kehadiran (%)',
                data: {!! json_encode(array_values($grafikKehadiran)) !!},
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,0.2)',
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointBackgroundColor: '#2563eb'
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
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
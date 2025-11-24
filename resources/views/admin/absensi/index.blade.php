@extends('layouts.app')

@section('page-title', 'Laporan Absensi')

@section('content')
<div class="p-6">

    <div class="bg-white p-5 rounded-xl shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="text-sm font-semibold">Tanggal Mulai</label>
                <input type="date" class="w-full p-2 rounded border">
            </div>

            <div>
                <label class="text-sm font-semibold">Tanggal Selesai</label>
                <input type="date" class="w-full p-2 rounded border">
            </div>

            <div>
                <label class="text-sm font-semibold">Mata Kuliah</label>
                <select class="w-full p-2 rounded border">
                    <option>Contoh Mata Kuliah 1</option>
                    <option>Contoh Mata Kuliah 2</option>
                </select>
            </div>

            <div>
                <label class="text-sm font-semibold">Status</label>
                <select class="w-full p-2 rounded border">
                    <option>Semua</option>
                    <option>Hadir</option>
                    <option>Terlambat</option>
                    <option>Izin</option>
                    <option>Alpha</option>
                </select>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-600">Hadir</p>
            <h2 class="text-2xl font-bold text-green-600">20</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-600">Terlambat</p>
            <h2 class="text-2xl font-bold text-yellow-600">4</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-600">Izin</p>
            <h2 class="text-2xl font-bold text-blue-600">2</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-600">Alpha</p>
            <h2 class="text-2xl font-bold text-red-600">1</h2>
        </div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <div class="flex justify-between mb-3">
            <h2 class="font-semibold text-lg">Data Laporan Absensi</h2>

            <div class="flex gap-2">
                <button class="px-3 py-2 bg-green-600 text-white rounded-lg">Export Excel</button>
                <button class="px-3 py-2 bg-red-600 text-white rounded-lg">Export PDF</button>
            </div>
        </div>

        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Mahasiswa</th>
                    <th class="p-3 text-left">NIM</th>
                    <th class="p-3 text-left">Mata Kuliah</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="p-3">Budi Setiawan</td>
                    <td class="p-3">22031001</td>
                    <td class="p-3">Pemrograman Web</td>
                    <td class="p-3">2025-01-12</td>
                    <td class="p-3"><span class="bg-green-200 text-green-700 px-3 py-1 rounded-full text-sm">Hadir</span></td>
                    <td class="p-3"><a class="text-blue-600 hover:underline">Detail</a></td>
                </tr>

                <tr class="border-b">
                    <td class="p-3">Siti Rahma</td>
                    <td class="p-3">22031002</td>
                    <td class="p-3">Basis Data</td>
                    <td class="p-3">2025-01-12</td>
                    <td class="p-3"><span class="bg-red-200 text-red-700 px-3 py-1 rounded-full text-sm">Alpha</span></td>
                    <td class="p-3"><a class="text-blue-600 hover:underline">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection

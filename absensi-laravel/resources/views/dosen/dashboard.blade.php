@extends('layouts.app')
@section('content')
<h3>Dashboard Dosen</h3>
<a href="#" class="btn btn-sm btn-success mb-2">Buat Sesi Baru</a>
<table class="table">
  <thead><tr><th>Mata Kuliah</th><th>Hari</th><th>Jam</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($jadwals as $j)
    <tr>
      <td>{{ $j->mataKuliah->nama_mk ?? '-' }}</td>
      <td>{{ $j->hari }}</td>
      <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
      <td>
        <a href="{{ route('dosen.sesi.create', $j->id_jadwal) }}" class="btn btn-sm btn-primary">Buat Sesi</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

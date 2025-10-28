@extends('layouts.app')
@section('content')
<h3>Sesi: {{ $sesi->jadwal->mataKuliah->nama_mk ?? '' }}</h3>
<div class="mb-3">
  <p>Tanggal: {{ $sesi->tanggal }}</p>
  <p>Status: {{ $sesi->status }}</p>
  <p>QR Code:</p>
  <div>{!! $qrcode !!}</div>
</div>

<h5>Daftar Absensi</h5>
<table class="table">
  <thead><tr><th>NIM</th><th>Nama</th><th>Waktu</th></tr></thead>
  <tbody>
    @foreach($sesi->absensi as $a)
      <tr><td>{{ $a->nim_mahasiswa }}</td><td>{{ $a->mahasiswa->nama ?? '' }}</td><td>{{ $a->waktu_absen }}</td></tr>
    @endforeach
  </tbody>
</table>
@endsection

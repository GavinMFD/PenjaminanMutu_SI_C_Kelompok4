@extends('layouts.app')
@section('content')
<h3>Dashboard Mahasiswa</h3>
<p>Daftar sesi hari ini:</p>
@foreach($sesi as $s)
  <div class="card mb-2 p-2">
    <div><strong>{{ $s->jadwal->mataKuliah->nama_mk ?? '' }}</strong> - {{ $s->jadwal->hari }}</div>
    <div><a href="{{ route('absensi.scan.form', ['code' => $s->qr_code]) }}" class="btn btn-sm btn-success mt-1">Buka untuk Absen</a></div>
  </div>
@endforeach
@endsection

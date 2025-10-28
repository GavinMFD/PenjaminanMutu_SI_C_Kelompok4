@extends('layouts.app')
@section('content')
<h3>Buat Sesi - {{ $jadwal->mataKuliah->nama_mk ?? '' }}</h3>
<form method="POST" action="{{ route('dosen.sesi.store') }}">
  @csrf
  <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
  <div class="mb-3"><label>Tanggal</label><input type="date" name="tanggal" class="form-control" required></div>
  <div class="mb-3"><label>Batas Waktu (optional)</label><input type="datetime-local" name="batas_waktu" class="form-control"></div>
  <button class="btn btn-success">Buat Sesi</button>
</form>
@endsection

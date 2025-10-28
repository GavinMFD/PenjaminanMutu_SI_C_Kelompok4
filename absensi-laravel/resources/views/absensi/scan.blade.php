@extends('layouts.app')
@section('content')
<h3>Scan / Absen</h3>
<form method="POST" action="{{ route('absensi.scan.store') }}">
  @csrf
  <input type="hidden" name="qr_code" value="{{ $code ?? '' }}">
  <div class="mb-3"><label>NIM</label><input name="nim" class="form-control" required></div>
  <div class="mb-3"><label>Lokasi (optional)</label><input name="lokasi" class="form-control"></div>
  <button class="btn btn-primary">Absen</button>
</form>
@if(session('message')) <div class="alert alert-success mt-2">{{ session('message') }}</div> @endif
@endsection

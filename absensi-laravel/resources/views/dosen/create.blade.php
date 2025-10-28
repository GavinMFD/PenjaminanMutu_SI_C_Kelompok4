@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Dosen</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

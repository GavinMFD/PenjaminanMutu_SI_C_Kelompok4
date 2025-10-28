@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Dosen</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" name="nidn" value="{{ $dosen->nidn }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ $dosen->nama }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $dosen->email }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" value="{{ $dosen->jurusan }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

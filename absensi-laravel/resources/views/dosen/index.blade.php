@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Dosen</h2>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary">+ Tambah Dosen</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dosen as $index => $dsn)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dsn->nidn }}</td>
                <td>{{ $dsn->nama }}</td>
                <td>{{ $dsn->email }}</td>
                <td>{{ $dsn->jurusan }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data dosen</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

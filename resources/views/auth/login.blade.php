<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Absensi Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/login.css')
</head>
<body>
    <div class="login-container">

        <div class="logo-wrapper">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SISENSI">
        </div>

        <h1>Sistem Absensi Mahasiswa</h1>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <input type="text" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required>
            
            <input type="password" id="password" name="password" placeholder="Kata sandi" required>

            <select name="role" id="role" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>

            <div class="form-row">
              <div class="remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>

            <div class="forgot">
                <a href="#">Lupa password?</a>
            </div>
            </div>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
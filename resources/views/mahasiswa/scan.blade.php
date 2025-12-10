@extends('layouts.app')
@section('page-title', 'Scan QR Code Kehadiran')

@section('content')
<div class="p-6">
    
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-600 mb-4 text-sm">
            Tekan tombol di bawah untuk memulai proses scan QR Code.
        </p>

        <button id="btn-start-scan" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 mb-4">
            Mulai Scan
        </button>

        <div id="reader" class="w-full rounded-xl overflow-hidden shadow-md" style="display:none;"></div>

        <div id="scan-status" class="text-center mt-4 text-gray-500 text-sm"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    let scanner = null;
    const reader = document.getElementById("reader");
    const statusText = document.getElementById("scan-status");

    document.getElementById("btn-start-scan").addEventListener("click", function() {

        reader.style.display = "block";
        statusText.innerHTML = "Menyalakan kamera...";

        scanner = new Html5Qrcode("reader");

        scanner.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: { width: 250, height: 250 }
            },
            function(decodedText) {

                statusText.innerHTML = "QR berhasil dibaca! Mengirim data...";


                scanner.stop().then(() => {
                    reader.innerHTML = "";
                });

                window.location.href = "{{ route('mahasiswa.scan') }}?code=" + encodeURIComponent(decodedText);
            },
            function(err) {
            }
        ).then(() => {
            statusText.innerHTML = "Silakan arahkan kamera ke QR Code.";
        }).catch(err => {
            statusText.innerHTML = "Gagal mengakses kamera: " + err;
        });
    });
</script>
@endsection

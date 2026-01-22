<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aktivasi Akun</title>
    <style>
        .card { max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; font-family: sans-serif; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff !important; text-decoration: none; border-radius: 5px; }
        .pw-box { background: #f4f4f4; padding: 10px; border-radius: 5px; margin: 15px 0; font-family: monospace; font-size: 1.2em; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Halo, {{ $name }}!</h2>
        <p>Anda telah didaftarkan sebagai user. Berikut adalah password sementara Anda:</p>
        
        <div class="pw-box">
            <strong>{{ $password }}</strong>
        </div>

        <p>Silakan klik tombol di bawah ini untuk memverifikasi email dan mengaktifkan akun Anda:</p>
        
        <div style="text-align: center;">
            <a href="{{ $verificationUrl }}" class="btn">Verifikasi & Aktifkan Akun</a>
        </div>

        <p style="font-size: 0.8em; color: #666; margin-top: 20px;">
            *Link ini hanya berlaku 24 jam. Data Anda baru akan tersimpan di sistem setelah Anda menekan tombol verifikasi.
        </p>
    </div>
</body>
</html>
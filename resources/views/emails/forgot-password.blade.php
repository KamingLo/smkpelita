<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .button {
            background-color: #2563eb;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
        }
        .container {
            font-family: sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #1f2937;">Halo, {{ $name }}!</h2>
        <p style="color: #4b5563; line-height: 1.6;">
            Kami menerima permintaan untuk mengatur ulang kata sandi akun SMK Pelita Anda. 
            Silakan klik tombol di bawah ini untuk melanjutkan proses reset password:
        </p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $resetUrl }}" class="button" style="color: #ffffff;">Reset Password Saya</a>
        </div>

        <p style="color: #4b5563; line-height: 1.6;">
            Link ini akan kadaluarsa dalam <strong>60 menit</strong>. Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.
        </p>
        
        <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        
        <p style="font-size: 12px; color: #9ca3af;">
            Jika tombol di atas tidak berfungsi, salin dan tempel URL berikut ke browser Anda:<br>
            <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
        </p>
        
        <p style="font-size: 12px; color: #9ca3af; margin-top: 20px;">
            &copy; {{ date('Y') }} SMK PELITA IV JAKARTA. All rights reserved.
        </p>
    </div>
</body>
</html>
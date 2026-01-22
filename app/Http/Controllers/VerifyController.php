<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class VerifyController extends Controller
{
    public function verify(Request $request)
    {
        $token = $request->query('token');

        try {
            // Pastikan JWT_SECRET di .env minimal 32 karakter
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // Cek apakah sudah ada untuk menghindari duplikasi
            if (User::where('email', $decoded->email)->exists()) {
                return redirect()->route('login')->with('info', 'Akun sudah aktif. Silakan login.');
            }

            // SIMPAN USER BARU KE DATABASE
            User::create([
                'name' => $decoded->name,
                'email' => $decoded->email,
                'password' => $decoded->password, // Pastikan sudah di-hash di controller Register
                'email_verified_at' => now(),
            ]);

            // Redirect ke route bernama 'login' dengan pesan sukses
            return redirect()->route('login')->with('success', 'Email Berhasil Diverifikasi! Silakan login.');

        } catch (\Exception $e) {
            // Jika token error/expired, arahkan ke login dengan pesan error
            return redirect()->route('login')->with('error', 'Link tidak valid atau sudah kadaluarsa.');
        }
    }
}
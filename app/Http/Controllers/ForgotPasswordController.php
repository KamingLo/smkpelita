<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form input password baru berdasarkan token
     */
    public function showResetForm($token)
    {
        try {
            // Decode token untuk memastikan link masih valid/belum expired
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            
            // Jika valid, tampilkan view reset password dan oper tokennya
            return view('admin.passwords.reset', ['token' => $token, 'email' => $decoded->email]);
            
        } catch (\Exception $e) {
            // Jika expired atau token dimanipulasi, balikkan ke login dengan error
            return redirect()->route('login')->with('error', 'Link reset tidak valid atau sudah kadaluarsa.');
        }
    }

    /**
     * Memproses update password baru ke database
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            // Decode ulang token untuk mengambil email
            $decoded = JWT::decode($request->token, new Key(env('JWT_SECRET'), 'HS256'));
            
            $user = User::where('email', $decoded->email)->first();

            if (!$user) {
                return redirect()->route('login')->with('error', 'User tidak ditemukan.');
            }

            // Update password user
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')->with('success', 'Password berhasil diperbarui! Silakan login.');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan. Silakan minta link reset baru.');
        }
    }
}
<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class Login extends Component
{
    public $email, $password, $remember = false;
    public $email_reset;

    public function sendResetLink()
    {
        $this->validate([
            'email_reset' => 'required|email'
        ], [
            'email_reset.required' => 'Email harus diisi.',
            'email_reset.email' => 'Format email tidak valid.'
        ]);

        // 1. Cek apakah user ada di database
        $user = User::where('email', $this->email_reset)->first();

        if (!$user) {
            // Kita gunakan pesan yang sama demi keamanan agar tidak terdeteksi email mana yang terdaftar
            session()->flash('success', 'Jika email terdaftar, link reset akan dikirimkan.');
            return;
        }

        // 2. Buat Token JWT (Masa berlaku 1 jam)
        $payload = [
            'sub' => $user->id,
            'email' => $user->email,
            'iat' => time(),
            'exp' => time() + 3600 // Expired dalam 60 menit
        ];

        // Gunakan config('app.jwt_secret') atau env('JWT_SECRET') yang sudah Anda perbaiki panjangnya
        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
        $resetUrl = route('password.reset', ['token' => $token]);

        // 3. Kirim Email
        try {
            Mail::send('emails.forgot-password', [
                'name' => $user->name,
                'resetUrl' => $resetUrl
            ], function($message) {
                $message->to($this->email_reset)->subject('Reset Password Akun SMK Pelita');
            });

            session()->flash('success', 'Link reset password telah dikirim ke email Anda.');
            $this->email_reset = ''; // Reset input
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengirim email. Silakan coba lagi nanti.');
        }
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function authenticate(){
        $this->validate();

        $throttleKey = Str::transliterate(Str::lower($this->email).'|'.request()->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            
            // Menggunakan ValidationException untuk return error
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan. Silakan coba lagi dalam $seconds detik.",
            ]);
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::clear($throttleKey);
            session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        RateLimiter::hit($throttleKey, 60);

        // Menggunakan ValidationException untuk return error login gagal
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
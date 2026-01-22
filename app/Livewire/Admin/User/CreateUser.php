<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Livewire\Attributes\Layout;

class CreateUser extends Component
{
    use WithPagination;

    // Form Properties (Password dihapus karena digenerate otomatis)
    public $name, $email;
    
    // Search Property
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function save(){
        $this->validate();

        // 1. Password random untuk dilihat user di email
        $randomPassword = Str::random(10); 

        // 2. Payload JWT (Menyimpan hash password)
        $payload = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($randomPassword), 
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24)
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
        
        // 3. Link verifikasi mengarah ke endpoint /verify-email
        $verificationUrl = url("/verify-email?token=$token");

        // 4. Kirim email menggunakan template tadi
        Mail::send('emails.verify-email', [
            'name' => $this->name,
            'password' => $randomPassword,
            'verificationUrl' => $verificationUrl
        ], function($message) {
            $message->to($this->email)->subject('Aktivasi Akun User Baru');
        });

        $this->reset(['name', 'email']);
        session()->flash('success', 'Email instruksi verifikasi telah dikirim.');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'User berhasil dihapus!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.user.create-user', [
            'users' => User::where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5)
        ]);
    }
}
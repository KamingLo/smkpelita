<?php
namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

class CreateUser extends Component
{
    use WithPagination;

    // Form Properties
    public $name, $email, $password, $password_confirmation;
    
    // Search Property
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['name', 'email', 'password', 'password_confirmation']);
        session()->flash('success', 'User berhasil ditambahkan!');
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
            'users' => User::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%')
                            ->latest()
                            ->paginate(5)
        ]);
    }
}
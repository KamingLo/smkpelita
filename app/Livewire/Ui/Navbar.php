<?php
namespace App\Livewire\Ui;

use Livewire\Component;

class Navbar extends Component
{
    public $mobileMenu = false;
    public $scrolled = false;
    public $openDropdown = null;

    public $navItems = [
        'Beranda' => '/',
        'Jenjang' => '/jenjang',
        'Fasilitas' => '/fasilitas',
        'Admisi' => '/admisi',
        'Profil' => '/profil',
    ];

    public function toggleMobileMenu()
    {
        $this->mobileMenu = !$this->mobileMenu;
    }

    public function render()
    {
        return view('livewire.ui.navbar');
    }
}
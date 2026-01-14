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
        'Jurusan' => '/jurusan',
        'Fasilitas' => '/fasilitas',
        'Admisi' => '/admisi',
        'Berita' => '/berita',
        'Pengumuman' => '/pengumuman',
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
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\Post\PostIndex;
use App\Livewire\Admin\Post\PostForm;
use App\Livewire\Admin\Tool\WebpConverter;
use App\Livewire\Admin\User\CreateUser;
use App\Http\Controllers\Public\BlogController;

Route::get('/berita', [BlogController::class, 'index'])->name('public.berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('public.berita.show');

Route::get('/pengumuman', [BlogController::class, 'index'])->name('public.pengumuman.index');
Route::get('/pengumuman/{slug}', [BlogController::class, 'show'])->name('public.pengumuman.show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function(){
    return view('profile');
});

Route::get('/admisi', function(){
    return view('admissions');
});

Route::get('/jurusan', function(){
    return view('school-major');
});

Route::get('/fasilitas', function(){
    return view('facility');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function(){
        return view('admin.login');
    })->name('login');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/postingan', PostIndex::class)->name('posts.index');
    Route::get('/postingan/create', PostForm::class)->name('posts.create');
    Route::get('/postingan/edit/{id}', PostForm::class)->name('posts.edit');
    Route::get('/converter', WebpConverter::class)->name('tools.converter');
    Route::get('/user', CreateUser::class)->name('users.create');
    
    Route::post('/logout', function () {
    auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});


Route::fallback(function () {
    return view('errors.404'); // Mengarah ke file custom error Anda
});
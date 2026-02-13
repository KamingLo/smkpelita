<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\Post\PostIndex;
use App\Livewire\Admin\Post\PostForm;
use App\Livewire\Admin\Tool\WebpConverter;
use App\Livewire\Admin\User\CreateUser;
use App\Livewire\Admin\Profile\UpdateProfile;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\DepartmentController;

use Illuminate\Support\Facades\Mail;

use App\Models\Post;

Route::get('/', function () {
    $posts = Post::latest()->paginate(6);
    
    return view('public.welcome', compact('posts'));
});

Route::get('/verify-email', [VerifyController::class, 'verify'])->name('verify.email');
Route::get('/password-reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password-reset', [ForgotPasswordController::class, 'updatePassword'])->name('password.update.process');
Route::get('/profil', function(){
    return view('public.profile');
});

Route::get('/admisi', function(){
    return view('public.admissions');
});

Route::get('/fasilitas', function(){
    return view('public.facility');
});

Route::get('/berita', [BlogController::class, 'index'])->name('public.berita.index');
Route::get('/berita/{slug}', [BlogController::class, 'show'])->name('public.berita.show');

Route::get('/pengumuman', [BlogController::class, 'index'])->name('public.pengumuman.index');
Route::get('/pengumuman/{slug}', [BlogController::class, 'show'])->name('public.pengumuman.show');

Route::get('/jurusan/{slug}', [DepartmentController::class, 'show'])->name('public.department.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', function(){
        return view('admin.login');
    })->name('login');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/postingan', PostIndex::class)->name('posts.index');
    Route::get('/postingan/create', PostForm::class)->name('posts.create');
    Route::get('/postingan/edit/{id}', PostForm::class)->name('posts.edit');
    Route::get('/converter', WebpConverter::class)->name('tools.converter');
    Route::get('/user', CreateUser::class)->name('users.create');
    
    Route::get('/user/profile', UpdateProfile::class)->name('users.profile');
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
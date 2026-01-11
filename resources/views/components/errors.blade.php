@props([
    'code' => '404',
    'title' => 'Halaman Tidak Ditemukan',
    'message' => 'Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.',
    'showHome' => true,
    'showBack' => true
])

<div class="min-h-[60vh] flex items-center justify-center px-6 py-12">
    <div class="max-w-xl w-full text-center">
        <h1 class="text-9xl font-black text-gray-200 dark:text-gray-800 leading-none select-none">
            {{ $code }}
        </h1>
        
        <div class="relative -mt-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                {{ $title }}
            </h2>
            <p class="mt-4 text-base text-gray-600 max-w-md mx-auto">
                {{ $message }}
            </p>
        </div>

        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
            @if($showHome)
                <a href="{{ url('/') }}" 
                   class="rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all">
                    Beranda
                </a>
            @endif
            
            @if($showBack)
                <button onclick="window.history.back()" 
                   class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all">
                    Kembali
                </button>
            @endif
        </div>
    </div>
</div>
@props([
    'img' => '',
    'title' => '',
    'desc' => ''
])

<section {{ $attributes->merge(['class' => 'relative w-full bg-slate-900 overflow-hidden h-120']) }}>
    
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ str_starts_with($img, 'http') ? $img : asset($img) }}" 
            class="w-full h-full object-cover opacity-50 transform scale-105 animate-slow-zoom"
            alt="Hero Image"
        >
    </div>

    <div class="absolute inset-0 z-10 bg-slate-900/60 flex items-center justify-center px-6 text-center">
        <div class="max-w-5xl">
            @if($title)
                <h1 class="text-white text-5xl md:text-8xl font-bold mb-6 tracking-tighter fade-in-up">
                    {{ $title }}
                </h1>
            @endif

            @if($desc)
                <p class="mx-auto text-slate-300 text-xl md:text-2xl leading-relaxed font-light max-w-2xl fade-in-up-delay">
                    {{ $desc }}
                </p>
            @endif

            {{-- TAMBAHKAN INI AGAR BUTTON BISA MUNCUL --}}
            @if($slot->isNotEmpty())
                <div class="mt-10 fade-in-up-delay-more">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .fade-in-up-delay { animation: fadeInUp 1s ease-out 0.3s forwards; opacity: 0; }
        
        /* Animasi tambahan untuk slot agar muncul paling akhir */
        .fade-in-up-delay-more { animation: fadeInUp 1s ease-out 0.6s forwards; opacity: 0; }
        
        @keyframes slowZoom {
            from { transform: scale(1.1); }
            to { transform: scale(1); }
        }
        .animate-slow-zoom { animation: slowZoom 15s ease-out forwards; }
    </style>
</section>
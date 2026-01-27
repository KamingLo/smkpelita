@props([
    'img' => '',
    'title' => '',
    'desc' => ''
])

<section {{ $attributes->merge(['class' => 'relative w-full bg-slate-900 overflow-hidden h-120']) }}>
    
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ str_starts_with($img, 'http') ? $img : asset($img) }}" 
            class="w-full h-full object-cover opacity-50" 
            alt="Hero Image"
        >
    </div>

    {{-- Content --}}
    <div class="absolute inset-0 z-10 bg-blue-200/20 flex items-center justify-center px-6 text-center">
        <div class="max-w-5xl">
            @if($title)
                <h1 class="text-white text-5xl md:text-8xl font-bold mb-6 tracking-tighter">
                    {{ $title }}
                </h1>
            @endif

            @if($desc)
                <p class="mx-auto text-slate-300 text-xl md:text-2xl leading-relaxed font-light max-w-2xl">
                    {{ $desc }}
                </p>
            @endif

            @if($slot->isNotEmpty())
                <div class="mt-10">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>
<section class="relative h-screen w-full bg-slate-900 overflow-hidden">
    
    <div 
        id="slider-container"
        class="flex h-full w-full overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth"
        style="scrollbar-width: none; -ms-overflow-style: none;"
    >
        @foreach($slides as $index => $slide)
            <div 
                id="slide-{{ $index }}" 
                class="relative h-screen w-screen shrink-0 snap-start overflow-hidden group"
            >
                <div class="absolute inset-0 z-0">
                    <img 
                        src="{{ str_starts_with($slide['img'], 'http') ? $slide['img'] : asset($slide['img']) }}" 
                        class="w-full h-full object-cover opacity-40 transform scale-110 transition-transform duration-[10000ms]"
                        alt="Slider Image"
                    >
                </div>

                <div class="absolute inset-0 z-10 bg-gradient-to-r from-blue-900/30 via-blue-900/40 to-transparent flex items-center px-6 md:px-24">
                    <div class="max-w-4xl" wire:transition.fade>
                        <h1 class="text-white text-5xl md:text-8xl font-bold mb-6 tracking-tighter">
                            {{ $slide['title'] }}
                        </h1>
                        <p class="text-blue-100 text-xl md:text-2xl mb-10 leading-relaxed font-light">
                            {{ $slide['desc'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-30 flex gap-3">
        @foreach($slides as $index => $slide)
            <button 
                wire:click="setSlide({{ $index }})"
                class="h-1.5 transition-all duration-500 rounded-full cursor-pointer {{ $activeSlide === $index ? 'w-16 bg-blue-500' : 'w-4 bg-white/30' }}"
            ></button>
        @endforeach
    </div>

    <script>
        window.addEventListener('scroll-to-slide', event => {
            const el = document.getElementById(event.detail.id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
            }
        });
    </script>
</section>
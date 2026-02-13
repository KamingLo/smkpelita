<section 
    x-data="{ 
        active: @entangle('activeSlide'), 
        slidesCount: {{ count($slides) }},
        autoplay: null,
        
        start() {
            this.autoplay = setInterval(() => {
                this.active = (this.active + 1) % this.slidesCount;
            }, 5000);
        },
        
        stop() {
            clearInterval(this.autoplay);
        },

        // Update active index secara instan berdasarkan posisi scroll
        syncIndex() {
            const container = this.$refs.sliderContainer;
            const scrollLeft = container.scrollLeft;
            const width = container.offsetWidth;
            // Menggunakan Math.round agar index berubah tepat saat melewati titik tengah slide
            const newIndex = Math.round(scrollLeft / width);
            
            if (this.active !== newIndex && newIndex >= 0 && newIndex < this.slidesCount) {
                this.active = newIndex;
            }
        },

        scrollToActive() {
            const container = this.$refs.sliderContainer;
            const targetSlide = container.children[this.active];
            if (targetSlide) {
                container.scrollTo({
                    left: targetSlide.offsetLeft,
                    behavior: 'smooth'
                });
            }
        }
    }"
    x-init="
        start();
        // Watcher hanya untuk perubahan dari sistem (timer/button), bukan dari scroll manual
        $watch('active', (val) => {
            const container = $refs.sliderContainer;
            const currentIndex = Math.round(container.scrollLeft / container.offsetWidth);
            if(val !== currentIndex) {
                scrollToActive();
            }
        });
    "
    @mouseenter="stop()"
    @mouseleave="start()"
    class="relative w-full overflow-hidden bg-slate-900 aspect-[1/1] sm:aspect-video md:aspect-none md:h-screen"
>
    
    <div 
        x-ref="sliderContainer"
        {{-- Gunakan @scroll tanpa debounce untuk respon instan --}}
        @scroll="syncIndex()"
        class="flex h-full w-full overflow-x-auto snap-x snap-mandatory no-scrollbar"
        style="scrollbar-width: none; -ms-overflow-style: none; scroll-behavior: smooth;"
    >
        @foreach($slides as $index => $slide)
            <div class="relative flex-none w-full h-full snap-start overflow-hidden">
                <div class="absolute inset-0 z-0">
                    <img 
                        src="{{ str_starts_with($slide['img'], 'http') ? $slide['img'] : asset($slide['img']) }}" 
                        class="w-full h-full object-cover opacity-80 transform scale-105 transition-transform duration-1000"
                        :class="active === {{ $index }} ? 'scale-100' : 'scale-110'"
                        alt="Slider Image"
                    >
                </div>

                <div class="absolute inset-0 z-10 bg-black/20 flex items-end md:items-center px-6 md:px-24 pb-20 md:pb-0">
                    <div class="max-w-5xl transition-all duration-700"
                         :class="active === {{ $index }} ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"> 
                        <h1 class="text-white text-4xl sm:text-5xl md:text-7xl lg:text-8xl font-bold mb-4 md:mb-8 tracking-tighter leading-[0.9] md:leading-tight">
                            {{ $slide['title'] }}
                        </h1>
                        <p class="text-blue-100 text-lg md:text-2xl lg:text-3xl mb-6 md:mb-12 leading-relaxed font-light line-clamp-3 md:line-clamp-none max-w-2xl">
                            {{ $slide['desc'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="absolute bottom-8 md:bottom-12 left-6 md:left-24 z-30 flex gap-3">
        @foreach($slides as $index => $slide)
            <button 
                @click="active = {{ $index }}; stop(); start();"
                class="h-2 transition-all duration-500 rounded-full cursor-pointer"
                :class="active === {{ $index }} ? 'w-12 md:w-20 bg-blue-500' : 'w-4 md:w-6 bg-white/30'"
            ></button>
        @endforeach
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</section>
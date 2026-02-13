<section class="py-24 px-6 bg-[#fcfcfc]" 
    x-data="{ 
        active: @entangle('active'), 
        count: {{ count($testimonials) }},
        isUserInteracting: false,
        timer: null,
        init() {
            this.startTimer();
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.active = parseInt(entry.target.getAttribute('data-index'));
                    }
                });
            }, { threshold: 0.6 });

            this.$refs.container.querySelectorAll('[data-index]').forEach(el => observer.observe(el));
        },
        startTimer() {
            this.timer = setInterval(() => {
                if(!this.isUserInteracting) {
                    let next = (this.active + 1) % this.count;
                    this.scrollToIndex(next);
                }
            }, 5000);
        },
        scrollToIndex(idx) {
            this.$refs.container.scrollTo({
                left: this.$refs.container.offsetWidth * idx,
                behavior: 'smooth'
            });
        }
    }"
>
    <div class="max-w-7xl mx-auto grid lg:grid-cols-12 items-center">
        
        <div class="lg:col-span-8">
            <div class="space-y-6 mb-8">
                <h2 class="text-5xl lg:text-7xl text-slate-900">
                    Cerita Nyata <br> <span class="font-medium text-blue-600">Keluarga Kami.</span>
                </h2>
                <p class="text-xl text-slate-500 leading-relaxed max-w-xl">
                    Dengarkan pengalaman langsung mengenai perjalanan mereka tumbuh dan berkembang bersama komunitas kami.
                </p>
            </div>

            <div class="max-w-md mb-16">
                <div class="w-full h-[1px] bg-slate-200 relative">
                    <div class="absolute h-full bg-blue-600 transition-all duration-700 ease-out"
                         :style="`width: ${((active + 1) / count) * 100}%` "></div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 relative">
            <div class="relative mx-auto lg:ml-auto"> <div x-ref="container"
                     @mousedown="isUserInteracting = true"
                     @mouseup="isUserInteracting = false"
                     @touchstart="isUserInteracting = true"
                     @touchend="isUserInteracting = false"
                     class="relative flex overflow-x-auto snap-x snap-mandatory no-scrollbar rounded-[2.5rem] shadow-2xl aspect-[3/4] bg-slate-200"
                     style="scroll-behavior: smooth;">
                    
                    @foreach($testimonials as $index => $item)
                    <div data-index="{{ $index }}" class="min-w-full snap-center relative overflow-hidden">
                        <img src="{{ $item['image'] }}" class="absolute inset-0 w-full h-full object-cover">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent"></div>

                        <div class="absolute inset-0 p-8 flex flex-col justify-end text-white">
                            <p class="text-lg md:text-xl font-light leading-relaxed mb-6 italic opacity-90">
                                “{{ $item['quote'] }}”
                            </p>
                            
                            <div class="flex flex-col border-l-2 border-blue-500 pl-4">
                                <h4 class="font-bold text-lg tracking-tight">{{ $item['name'] }}</h4>
                                <p class="text-[10px] text-blue-300 uppercase tracking-widest mt-1">{{ $item['role'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 flex gap-2">
                    @foreach($testimonials as $index => $item)
                    <button @click="scrollToIndex({{ $index }})" 
                            class="h-1 transition-all duration-500 rounded-full"
                            :class="active === {{ $index }} ? 'w-8 bg-blue-600' : 'w-2 bg-slate-300'"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</section>
<section class="py-24 px-6 bg-slate-50 overflow-hidden">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center">
        
        <div data-aos="fade-right">
            <span class="text-blue-500 font-bold tracking-widest uppercase text-sm">Testimoni</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-8 leading-tight tracking-tighter">
                Apa yang Dikatakan <br> Komunitas Kami?
            </h2>
            <p class="text-lg text-slate-600 mb-8 font-light leading-relaxed">
                Dengarkan langsung pengalaman berharga dari para orang tua dan alumni yang telah menjadi bagian dari perjalanan pendidikan kami.
            </p>
            
            <div class="flex items-center space-x-4">
                <div class="flex -space-x-2">
                    <img class="w-10 h-10 rounded-full border-2 border-white shadow" src="https://i.pravatar.cc/100?u=1">
                    <img class="w-10 h-10 rounded-full border-2 border-white shadow" src="https://i.pravatar.cc/100?u=2">
                    <img class="w-10 h-10 rounded-full border-2 border-white shadow" src="https://i.pravatar.cc/100?u=3">
                </div>
                <span class="text-sm font-semibold text-slate-700">500+ Testimoni Positif</span>
            </div>
        </div>

        <div class="relative" 
             x-data="{ 
                active: @entangle('active'),
                scrollTo(index) {
                    const container = this.$refs.container;
                    const cardWidth = container.firstElementChild.offsetWidth;
                    container.scrollTo({ left: cardWidth * index, behavior: 'smooth' });
                }
             }" 
             x-init="
                $watch('active', value => scrollTo(value));
                setInterval(() => { $wire.next() }, 5000);
             "
             data-aos="fade-left">
            
            <div class="absolute -inset-4 bg-blue-100 rounded-[3rem] -rotate-3 opacity-50"></div>
            
            <div x-ref="container"
                 @scroll.debounce.100ms="active = Math.round($el.scrollLeft / $el.firstElementChild.offsetWidth)"
                 class="relative flex overflow-x-auto snap-x snap-mandatory no-scrollbar space-x-4 pb-4">
                
                @foreach($testimonials as $index => $item)
                <div class="min-w-full snap-center snap-always" wire:key="testi-{{ $index }}">
                    <div class="relative aspect-square rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white bg-slate-200">
                        <img src="{{ $item['image'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" alt="{{ $item['name'] }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-950 via-blue-900/10 to-transparent"></div>
                        
                        <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end text-white">
                            <p class="text-lg md:text-xl italic font-light mb-6 line-clamp-4 leading-relaxed tracking-wide">
                                "{{ $item['quote'] }}"
                            </p>
                            <div>
                                <h4 class="font-bold text-xl tracking-tight">{{ $item['name'] }}</h4>
                                <span class="text-blue-300 text-xs uppercase tracking-widest font-bold">{{ $item['role'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-8 space-x-3">
                @foreach($testimonials as $index => $item)
                <button wire:click="setTab({{ $index }})" 
                        class="h-2 transition-all duration-500 rounded-full focus:outline-none"
                        :class="active === {{ $index }} ? 'bg-blue-600 w-10' : 'bg-blue-200 w-2 hover:bg-blue-300'"></button>
                @endforeach
            </div>
        </div>

    </div>
    <style>
        /* Utilitas untuk menyembunyikan scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</section>

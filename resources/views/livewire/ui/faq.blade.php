<section class="py-24 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h3 class="text-blue-600 font-bold uppercase tracking-[0.2em] text-sm mb-4">Pertanyaan Umum</h3>
            <h2 class="text-4xl font-bold text-slate-900 tracking-tight">Mungkin Anda Penasaran?</h2>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
                {{-- Gunakan x-data mandiri untuk tiap item agar tidak bentrok --}}
                <div 
                    x-data="{ open: false }"
                    class="bg-white rounded-3xl border border-slate-100 overflow-hidden transition-all duration-500"
                    :class="open ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                >
                    <button 
                        type="button"
                        @click="open = !open"
                        class="w-full px-8 py-6 text-left flex justify-between items-center gap-4 hover:bg-slate-50 transition-colors focus:outline-none"
                    >
                        <span class="text-lg font-bold text-slate-800 tracking-tight">
                            {{ $faq['question'] }}
                        </span>
                        
                        <div class="shrink-0 w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 transition-all duration-300"
                             :class="open ? 'rotate-180 bg-blue-600 text-white' : ''">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      :d="open ? 'M18 12H6' : 'M12 6v12m6-6H6'" />
                            </svg>
                        </div>
                    </button>

                    {{-- x-collapse untuk animasi meluncur turun --}}
                    <div 
                        x-show="open" 
                        x-collapse
                        x-cloak
                    >
                        <div class="px-8 pb-8">
                            <div class="pt-6 border-t border-slate-50 text-slate-600 leading-relaxed text-lg font-light">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center" data-aos="fade-up">
            <p class="text-slate-500 text-lg">
                Punya pertanyaan lain? 
                <a href="#" class="text-blue-600 font-bold hover:underline ml-1">Tanyakan langsung pada tim kami →</a>
            </p>
        </div>
    </div>
</section>
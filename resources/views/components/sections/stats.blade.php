<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="max-w-3xl mx-auto text-center mb-20" data-aos="fade-up">
            <h3 class="text-blue-600 font-medium uppercase text-lg mb-4">Our Milestones</h3>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 tracking-tight mb-6">
                Dedikasi Kami dalam Angka
            </h2>
            <p class="text-slate-500 text-lg leading-relaxed">
                Lebih dari sekadar angka, ini adalah bukti nyata komitmen kami dalam mendampingi setiap siswa mencapai potensi terbaik mereka melalui pendidikan berkualitas.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
            @php
                $stats = [
                    ['target' => 100, 'suffix' => '%', 'title' => 'Uni Acceptance', 'desc' => 'Diterima di PTN & Universitas terbaik.'],
                    ['target' => 15, 'suffix' => '+', 'title' => 'Nationalities', 'desc' => 'Lingkungan belajar lintas budaya.'],
                    ['target' => 40, 'suffix' => '+', 'title' => 'Ekskul & Klub', 'desc' => 'Wadah minat bakat luar akademik.'],
                    ['target' => 25, 'suffix' => 'th', 'title' => 'Anniversary', 'desc' => 'Berpengalaman mencetak pemimpin.']
                ];
            @endphp

            @foreach($stats as $s)
                <div 
                    class="flex flex-col items-center text-center group"
                    x-data="{ 
                        current: 0, 
                        target: {{ $s['target'] }}, 
                        time: 2000,
                        animate() {
                            let start = null;
                            const step = (timestamp) => {
                                if (!start) start = timestamp;
                                const progress = Math.min((timestamp - start) / this.time, 1);
                                this.current = Math.floor(progress * this.target);
                                if (progress < 1) {
                                    window.requestAnimationFrame(step);
                                }
                            };
                            window.requestAnimationFrame(step);
                        }
                    }"
                    x-intersect:enter.once="animate()"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $loop->index * 150 }}"
                >
                    <div class="flex items-baseline text-slate-900 mb-2">
                        <span class="text-6xl md:text-7xl font-bold" x-text="current">0</span>
                        <span class="text-3xl font-bold tracking-tighter text-slate-400">{{ $s['suffix'] }}</span>
                    </div>
                    
                    <div class="w-8 h-1 bg-slate-200 mb-6 transition-all duration-500 group-hover:w-16 group-hover:bg-blue-600"></div>

                    <div class="space-y-2">
                        <h4 class="text-lg font-bold text-slate-800 uppercase tracking-widest">
                            {{ $s['title'] }}
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-[200px] mx-auto">
                            {{ $s['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
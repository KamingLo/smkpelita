<section class="py-16 md:py-24 bg-[#FAFBFC]" x-data="{ activeTab: @entangle('activeTab') }">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center max-w-4xl mx-auto mb-12 md:mb-20">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="h-[2px] w-6 bg-blue-600"></span>
                <span class="text-blue-600 font-bold tracking-[0.2em] uppercase text-[10px] md:text-xs">Vokasi Unggulan</span>
                <span class="h-[2px] w-6 bg-blue-600"></span>
            </div>
            <h2 class="text-3xl md:text-6xl font-bold text-slate-900 tracking-tight mb-6 leading-tight">
                Membangun Kompetensi <br class="hidden md:block"> Industri Masa Depan.
            </h2>
            <p class="text-slate-500 text-base md:text-xl leading-relaxed font-medium">
                Kurikulum berbasis industri untuk mencetak tenaga ahli yang siap bersaing secara global.
            </p>
        </div>

        <div class="flex overflow-x-auto no-scrollbar md:justify-center mb-10 pb-4 md:pb-0">
            <nav class="flex p-1.5 bg-slate-100 rounded-2xl md:rounded-full border border-slate-200 min-w-max">
                @foreach($vocationalMajors as $index => $major)
                    <button 
                        @click="activeTab = {{ $index }}; $wire.setTab({{ $index }})"
                        class="px-6 md:px-10 py-3 md:py-4 rounded-xl md:rounded-full text-sm md:text-base font-bold transition-all duration-300 outline-none whitespace-nowrap"
                        :class="activeTab === {{ $index }} ? 'bg-white text-blue-600 shadow-sm border border-slate-200' : 'text-slate-400 hover:text-slate-600'">
                        {{ $major['name'] }}
                    </button>
                @endforeach
            </nav>
        </div>

        <div class="relative min-h-[600px]">
            @foreach($vocationalMajors as $index => $major)
                <div 
                    x-show="activeTab === {{ $index }}"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="flex flex-col lg:flex-row bg-white rounded-[2rem] md:rounded-[3.5rem] border border-slate-200 shadow-xl shadow-slate-200/40 overflow-hidden"
                    style="display: none;">
                    
                    <div class="lg:w-[40%] relative min-h-[300px] lg:min-h-[600px] overflow-hidden group">
                        <img src="{{ asset($major['image']) }}" 
                             alt="{{ $major['name'] }}" 
                             class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                        
                        <div class="absolute bottom-8 left-8 right-8 z-20">
                            <span class="text-blue-400 font-bold text-sm tracking-widest uppercase mb-2 block">Focus Area</span>
                            <h4 class="text-white font-bold text-3xl md:text-4xl tracking-tighter uppercase italic leading-none">
                                {{ $major['alias'] }}
                            </h4>
                        </div>
                    </div>

                    <div class="lg:w-[60%] p-8 md:p-16 flex flex-col justify-center bg-white relative">
                        <div class="grid grid-cols-3 gap-4 mb-10 pb-8 border-b border-slate-100">
                            @foreach($major['stats'] as $label => $value)
                            <div>
                                <p class="text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">{{ $label }}</p>
                                <p class="text-lg md:text-2xl font-bold text-slate-900">{{ $value }}</p>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="relative z-10">
                            <h3 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6 tracking-tight">
                                {{ $major['name'] }}
                            </h3>
                            
                            <p class="text-slate-500 text-base md:text-lg leading-relaxed mb-10">
                                {{ $major['desc'] }}
                            </p>

                            <div class="grid md:grid-cols-2 gap-10 mb-10">
                                <div>
                                    <p class="text-base font-bold text-blue-600 uppercase mb-4">Core Curriculum</p>
                                    <ul class="space-y-3">
                                        @foreach($major['features'] as $feature)
                                        <li class="flex items-center gap-3 text-slate-700 font-semibold text-base">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            {{ $feature }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-md font-bold text-blue-600 uppercase mb-4">Career Paths</p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($major['career_paths'] as $path)
                                        <span class="px-3 py-1 bg-slate-50 border border-slate-200 rounded-lg text-slate-600 font-bold text-sm uppercase">
                                            {{ $path }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center gap-6 pt-8 border-t border-slate-100">
                                <a href="{{ $major['url'] }}" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-xl font-bold text-sm transition-all duration-300 hover:bg-blue-600 group">
                                    <span>Detail Kurikulum</span>
                                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                                <span class="text-xs text-slate-400 font-medium italic text-center sm:text-left">
                                    *Tersedia Beasiswa Prestasi & Industri
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center items-center gap-4">
            @foreach($vocationalMajors as $index => $major)
                <button @click="activeTab = {{ $index }}; $wire.setTab({{ $index }})" 
                        class="h-1.5 transition-all duration-500 rounded-full"
                        :class="activeTab === {{ $index }} ? 'w-10 bg-blue-600' : 'w-2 bg-slate-200'"></button>
            @endforeach
        </div>
    </div>
</section>
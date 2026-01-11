<section class="py-12 md:py-24 bg-white overflow-hidden" 
    x-data="{ 
        activeTab: @entangle('activeTab')
    }">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-8 md:mb-16 border-b border-slate-200">
            <h2 class="text-2xl md:text-4xl font-bold text-slate-900 mb-6 md:mb-8 tracking-tight uppercase">
                Jenjang Pendidikan
            </h2>
            
            <div class="flex flex-nowrap overflow-x-auto -mb-px
                [&::-webkit-scrollbar]:h-1.5
                [&::-webkit-scrollbar-track]:bg-slate-100
                [&::-webkit-scrollbar-thumb]:bg-slate-300
                [&::-webkit-scrollbar-thumb]:rounded-full">
                
                @foreach($levels as $index => $level)
                    <button 
                        type="button"
                        @click="activeTab = {{ $index }}"
                        :class="activeTab === {{ $index }} 
                            ? 'border-blue-600 text-blue-600 bg-slate-50' 
                            : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
                        class="px-6 md:px-10 py-3 md:py-5 border-b-2 font-bold text-sm uppercase tracking-[0.2em] transition-all duration-300 whitespace-nowrap shrink-0"
                    >
                        {{ $level['alias'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-0 border border-slate-200 shadow-sm rounded-[1.5rem] md:rounded-[3rem] overflow-hidden bg-white">
            
            <div class="w-full lg:w-1/2 relative min-h-[300px] md:min-h-[500px] lg:min-h-[650px] bg-slate-100 overflow-hidden">
                @foreach($levels as $index => $level)
                    <div 
                        x-show="activeTab === {{ $index }}"
                        x-transition:enter="transition duration-700 ease-in-out"
                        x-transition:enter-start="opacity-0 scale-105"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition duration-300 ease-in"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0"
                        x-cloak
                    >
                        <img 
                            src="{{ str_contains($level['image'], 'http') ? $level['image'] : asset($level['image']) }}" 
                            class="w-full h-full object-cover"
                            alt="{{ $level['name'] }}"
                        >
                        <div class="absolute inset-0 bg-slate-900/10"></div>
                    </div>
                @endforeach
            </div>

            <div class="w-full lg:w-1/2 p-8 md:p-20 flex flex-col justify-center bg-white">
                @foreach($levels as $index => $level)
                    <div 
                        x-show="activeTab === {{ $index }}"
                        x-transition:enter="transition ease-out duration-500 delay-200"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-cloak
                    >
                        <div class="space-y-6 md:space-y-10">
                            <div>
                                <span class="text-blue-600 text-sm md:text-lg font-bold tracking-widest uppercase mb-2 md:mb-3 block">
                                    Program {{ $level['alias'] }}
                                </span>
                                <h3 class="text-2xl md:text-5xl font-extrabold text-slate-900 tracking-tighter leading-tight">
                                    {{ $level['name'] }}
                                </h3>
                            </div>
                            
                            <p class="text-base md:text-xl text-slate-600 leading-relaxed font-light italic">
                                {{ $level['desc'] }}
                            </p>
                            
                            <div class="pt-2 md:pt-6">
                                <a href="{{ $level['url'] }}" wire:navigate class="inline-flex items-center justify-center w-full md:w-auto px-8 md:px-10 py-3 md:py-4 bg-slate-900 text-white text-[10px] md:text-sm font-bold uppercase tracking-widest hover:bg-blue-600 transition-all rounded-lg md:rounded-xl shadow-lg">
                                    Pelajari Program Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
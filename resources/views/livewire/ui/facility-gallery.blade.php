<div x-data="{ 
    activeCategory: @entangle('activeCategory'),
    allFacilities: @js($facilities),
    showModal: false, 
    selectedItem: { title: '', desc: '', cat: '', img: '' },
    
    get filteredFacilities() {
        if (this.activeCategory === 'Semua') return this.allFacilities;
        return this.allFacilities.filter(f => f.cat === this.activeCategory);
    }
}" class="w-full py-20 bg-[#fafafa] font-sans">
    
    <div class="max-w-7xl mx-auto px-6 mb-16 text-center" data-aos="fade-up">
        <p class="text-blue-600 font-bold tracking-[0.3em] text-[10px] uppercase mb-4">Campus Experience</p>
        <h2 class="text-4xl md:text-6xl font-medium text-slate-900 tracking-tight mb-8">
            Fasilitas & Sarana
        </h2>
        
        <div class="flex flex-wrap justify-center gap-3">
            <template x-for="cat in ['Semua', 'Akademik', 'Olahraga', 'Kreativitas', 'Fasilitas']">
                <button 
                    @click="activeCategory = cat"
                    :class="activeCategory === cat ? 'bg-blue-600/70 text-white' : 'bg-white text-slate-500 border border-slate-100 hover:border-slate-300'"
                    class="px-8 py-3 rounded-2xl text-[11px] font-bold uppercase tracking-wider transition-all duration-300"
                    x-text="cat"
                ></button>
            </template>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="(item, index) in filteredFacilities" :key="item.title + index">
                <div 
                    @click="selectedItem = item; showModal = true"
                    class="group relative aspect-[3/2] cursor-pointer overflow-hidden rounded-[2rem] bg-white transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl"
                >
                    <img :src="item.img" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" :alt="item.title">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-70 group-hover:opacity-80 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-10 flex flex-col justify-end">
                        <div class="transform transition-all duration-500 group-hover:mb-2">
                            <span class="inline-block px-3 py-1 bg-blue-600/20 backdrop-blur-md border border-blue-400/30 rounded-lg text-[9px] font-bold uppercase tracking-widest text-blue-100 mb-4" x-text="item.cat"></span>
                            <h4 class="text-2xl font-bold text-white leading-tight mb-2" x-text="item.title"></h4>
                            <div class="h-1 w-0 group-hover:w-12 bg-blue-500 transition-all duration-500 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <div 
        x-show="showModal" 
        x-cloak
        x-transition:enter="transition duration-400 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="fixed inset-0 z-[1000] flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-md"
    >
        <div @click.away="showModal = false" 
             class="bg-white rounded-[3rem] max-w-5xl w-full max-h-[85vh] overflow-hidden shadow-2xl flex flex-col md:flex-row shadow-black/20">
            
            <div class="md:w-1/2 h-[300px] md:h-auto overflow-hidden bg-slate-100">
                <img :src="selectedItem.img" class="w-full h-full object-cover">
            </div>

            <div class="md:w-1/2 p-10 md:p-16 overflow-y-auto flex flex-col">
                <div class="mb-auto">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-[2px] bg-blue-600"></div>
                        <span class="text-blue-600 font-bold text-[10px] uppercase tracking-widest" x-text="selectedItem.cat"></span>
                    </div>
                    <h3 class="text-4xl font-black text-slate-900 mb-6 tracking-tight leading-tight" x-text="selectedItem.title"></h3>
                    <p class="text-slate-500 leading-relaxed text-lg" x-text="selectedItem.desc"></p>
                </div>
                
                <div class="mt-12">
                    <button @click="showModal = false" class="w-full py-5 bg-blue-600/70 text-white font-bold rounded-2xl hover:bg-blue-600 transition-all active:scale-95 shadow-lg">
                        Kembali ke Galeri
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
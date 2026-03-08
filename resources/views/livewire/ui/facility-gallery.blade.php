<div x-data="{ 
    activeCategory: @entangle('activeCategory'),
    allFacilities: @js($facilities),
    showModal: false, 
    selectedItem: { title: '', desc: '', cat: '', img: '' },
    
    get filteredFacilities() {
        if (this.activeCategory === 'Semua') return this.allFacilities;
        return this.allFacilities.filter(f => f.cat === this.activeCategory);
    }
}" class="w-full py-20 bg-white font-sans">
    
    <div class="max-w-7xl mx-auto px-6 mb-16" data-aos="fade-up">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="max-w-2xl">
                <p class="text-blue-600 font-bold text-[10px] uppercase mb-4">Campus Experience</p>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                    Fasilitas & Sarana
                </h2>
                <p class="text-slate-500 text-lg">
                    Lingkungan belajar yang kondusif dengan dukungan fasilitas modern untuk menunjang kreativitas siswa.
                </p>
            </div>
            
            <div class="flex flex-wrap gap-2">
                <template x-for="cat in @js($categories)">
                    <button 
                        @click="activeCategory = cat"
                        :class="activeCategory === cat ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'"
                        class="px-6 py-2.5 rounded-2xl text-[11px] font-bold uppercase transition-all duration-300"
                        x-text="cat"
                    ></button>
                </template>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            <template x-for="(item, index) in filteredFacilities" :key="index">
                <div 
                    @click="selectedItem = item; showModal = true"
                    class="break-inside-avoid group relative cursor-pointer overflow-hidden rounded-3xl bg-slate-100 transition-all duration-500 hover:shadow-xl"
                >
                    <img :src="item.img" class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105" :alt="item.title">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 transition-opacity duration-300 group-hover:opacity-90"></div>
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8">
                        <span class="text-blue-400 font-bold text-[9px] uppercase mb-2" x-text="item.cat"></span>
                        <h4 class="text-white font-bold text-xl mb-2" x-text="item.title"></h4>
                        <p class="text-white/80 text-sm line-clamp-2" x-text="item.desc"></p>
                        
                        <div class="h-1 w-0 group-hover:w-12 bg-blue-500 transition-all duration-500 rounded-full mt-4"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <div 
        x-show="showModal" 
        x-cloak
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="fixed inset-0 z-[1000] flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-sm"
    >
        <div @click.away="showModal = false" class="max-w-5xl w-full flex flex-col items-center">
            <div class="relative w-full rounded-3xl overflow-hidden bg-black mb-6">
                <img :src="selectedItem.img" class="max-h-[70vh] w-full object-contain mx-auto">
                <button @click="showModal = false" class="absolute top-6 right-6 w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-full text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="text-center max-w-2xl px-4">
                <span class="text-blue-400 font-bold text-[10px] uppercase mb-2 block" x-text="selectedItem.cat"></span>
                <h3 class="text-2xl font-bold text-white mb-3" x-text="selectedItem.title"></h3>
                <p class="text-slate-400 text-lg" x-text="selectedItem.desc"></p>
            </div>
        </div>
    </div>
</div>
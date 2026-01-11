<div x-data="{ 
    activeCategory: @entangle('activeCategory'),
    allFacilities: @js($facilities),
    showModal: false, 
    selectedItem: { title: '', desc: '', cat: '', img: '' },
    
    // Fungsi penyaringan di sisi client (instan)
    get filteredFacilities() {
        if (this.activeCategory === 'Semua') return this.allFacilities;
        return this.allFacilities.filter(f => f.cat === this.activeCategory);
    }
}" class="w-full mt-16 mb-32">
    
    <div class="max-w-7xl mx-auto px-6 text-center" data-aos="fade-up">
        <span class="text-blue-600 font-bold uppercase tracking-[0.3em] text-xs">Fasilitas Sekolah</span>
        <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-4 tracking-tighter">Sarana & Prasarana</h2>
        <div class="w-24 h-1.5 bg-blue-600 mx-auto mt-6 rounded-full"></div>
    </div>

    <div class="flex justify-center flex-wrap gap-4 mt-12 mb-12 px-6" data-aos="fade-up">
        <template x-for="cat in ['Semua', 'Akademik', 'Olahraga', 'Kreativitas', 'Fasilitas']">
            <button 
                @click="activeCategory = cat"
                :class="activeCategory === cat ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'"
                class="px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest transition-all duration-300"
                x-text="cat"
            ></button>
        </template>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="(item, index) in filteredFacilities" :key="item.title + index">
                <div 
                    @click="selectedItem = item; showModal = true"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group relative cursor-pointer overflow-hidden rounded-[2.5rem] bg-slate-200 aspect-[4/3] shadow-sm hover:shadow-2xl transition-all duration-500"
                >
                    <img :src="item.img" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" :alt="item.title">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-70 group-hover:opacity-90 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-10 flex flex-col justify-end text-white">
                        <span class="text-[10px] font-black uppercase tracking-widest text-blue-400 mb-2" x-text="item.cat"></span>
                        <h4 class="text-2xl font-bold tracking-tight leading-tight" x-text="item.title"></h4>
                        <div class="w-0 h-1 bg-blue-500 mt-4 transition-all duration-500 group-hover:w-full"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <div 
        x-show="showModal" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        class="fixed inset-0 z-[1000] flex items-center justify-center p-6 bg-slate-950/80 backdrop-blur-md"
    >
        <div @click.away="showModal = false" class="bg-white rounded-[3.5rem] max-w-5xl w-full overflow-hidden shadow-2xl relative">
            <button @click="showModal = false" class="absolute top-8 right-8 z-50 p-2 bg-slate-100 rounded-full hover:bg-red-500 hover:text-white transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>

            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-3/5 h-[350px] lg:h-[600px] overflow-hidden">
                    <img :src="selectedItem.img" class="w-full h-full object-cover">
                </div>
                <div class="lg:w-2/5 p-12 flex flex-col justify-center">
                    <div class="mb-6">
                        <span class="px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold uppercase tracking-widest" x-text="selectedItem.cat"></span>
                    </div>
                    <h3 class="text-4xl font-bold text-slate-900 mb-6 leading-[1.1]" x-text="selectedItem.title"></h3>
                    <p class="text-slate-500 leading-relaxed text-lg font-light mb-10" x-text="selectedItem.desc"></p>
                    <button @click="showModal = false" class="w-full py-5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">Kembali Menjelajah</button>
                </div>
            </div>
        </div>
    </div>
</div>
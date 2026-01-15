<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800  tracking-tight">
                WebP Image Converter
            </h1>
            <p class="text-sm text-gray-500">Konversi & Kompres gambar apapun menjadi WebP secara instan di browser.</p>
        </div>
        <a href="{{ route('posts.create') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800   transition-colors flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            Kembali ke Form
        </a>
    </div>

    <div x-data="webpConverter()" class="space-y-6">
        
        <div class="bg-white p-8 rounded-2xl border-2 border-dashed border-gray-200 shadow-sm text-center hover:border-blue-400 transition-all">
            <input type="file" id="conv_upload" class="hidden" accept="image/*" @change="processImage">
            <label for="conv_upload" class="cursor-pointer group">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                    <span class="text-lg font-bold text-gray-700">Pilih atau Seret Foto Disini</span>
                    <p class="text-sm text-gray-400 mt-1">Mendukung JPG, PNG, atau format gambar lainnya.</p>
                </div>
            </label>
        </div>

        <div x-show="showResult" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm space-y-4">
                <h3 class="text-xs font-bold  text-blue-600">Pengaturan WebP</h3>
                
                <div>
                    <label class="block text-xs font-bold text-gray-400  mb-2">Kualitas Kompresi: <span x-text="quality + '%'" class="text-blue-600"></span></label>
                    <input type="range" x-model="quality" min="10" max="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                </div>

                <div class="pt-4 border-t border-gray-50 space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Ukuran Asli:</span>
                        <span class="font-bold text-red-500" x-text="originalSize"></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Ukuran WebP:</span>
                        <span class="font-bold text-green-500" x-text="newSize"></span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-xl mt-4">
                        <span class="text-xs font-bold text-blue-700 ">Hemat Ruang:</span>
                        <span class="text-lg font-bold text-blue-700" x-text="reduction"></span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center justify-center">
                <h3 class="text-xs font-bold   text-gray-400 mb-4 self-start">Hasil Preview (Klik untuk memperbesar)</h3>
                
                <div class="relative group cursor-zoom-in" @click="showModal = true">
                    <img :src="webpUrl" class="max-h-64 rounded-xl shadow-md border border-gray-100 transition-all group-hover:brightness-90">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-white/20 backdrop-blur-md p-2 rounded-full text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
                
                <a :href="webpUrl" :download="fileName" class="w-full mt-6 py-3 bg-blue-600 text-white text-center font-bold rounded-xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all   text-xs">
                    Download WebP
                </a>
            </div>
        </div>

        <canvas x-ref="canvas" class="hidden"></canvas>

        <template x-teleport="body">
            <div x-show="showModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[999] flex items-center justify-center bg-black/95 p-4 md:p-10"
                 @keydown.escape.window="showModal = false"
                 style="display: none;">
                
                <button @click="showModal = false" class="absolute top-5 right-5 text-white/70 hover:text-white transition-colors z-[1000]">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </button>

                <div class="relative max-w-5xl w-full flex flex-col items-center justify-center" @click.away="showModal = false">
                    <img :src="webpUrl" class="max-w-full max-h-[85vh] rounded-lg shadow-2xl">
                    <div class="mt-6 text-center space-y-1">
                        <p class="text-white font-bold text-lg" x-text="fileName"></p>
                        <p class="text-white/50 text-xs font-bold  tracking-[0.2em]" x-text="'WebP Format • ' + newSize"></p>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

@push('scripts')
<script>
function webpConverter() {
    return {
        quality: 80,
        showResult: false,
        showModal: false,
        webpUrl: '',
        originalSize: '',
        newSize: '',
        reduction: '',
        fileName: 'image.webp',
        rawImage: null,

        init() {
            this.$watch('quality', () => {
                if(this.rawImage) this.convert();
            });
        },

        processImage(e) {
            const file = e.target.files[0];
            if (!file) return;

            this.fileName = file.name.split('.')[0] + '.webp';
            this.originalSize = this.formatBytes(file.size);
            
            const reader = new FileReader();
            reader.onload = (event) => {
                const img = new Image();
                img.onload = () => {
                    this.rawImage = img;
                    this.convert();
                    this.showResult = true;
                };
                img.src = event.target.result;
            };
            reader.readAsDataURL(file);
        },

        convert() {
            const canvas = this.$refs.canvas;
            const ctx = canvas.getContext('2d');
            const img = this.rawImage;

            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);

            const dataUrl = canvas.toDataURL('image/webp', this.quality / 100);
            this.webpUrl = dataUrl;

            const stringLength = dataUrl.split(',')[1].length;
            const sizeInBytes = Math.floor(stringLength * (3/4));
            this.newSize = this.formatBytes(sizeInBytes);

            const originalBytes = this.parseToBytes(this.originalSize);
            const saved = ((originalBytes - sizeInBytes) / originalBytes * 100).toFixed(1);
            this.reduction = (saved > 0 ? saved : 0) + '%';
        },

        formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },

        parseToBytes(formatted) {
            const num = parseFloat(formatted);
            if (formatted.includes('MB')) return num * 1024 * 1024;
            if (formatted.includes('KB')) return num * 1024;
            return num;
        }
    }
}
</script>
@endpush
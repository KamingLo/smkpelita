<x-layouts.admin>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Statistik</h1>
            <p class="text-sm text-gray-500">{{ now()->format('d F Y') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Postingan</p>
                <h3 class="text-3xl font-bold text-blue-600 mt-2">0</h3>
            </div>
            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Kunjungan Minggu Ini</p>
                <h3 class="text-3xl font-bold text-green-600 mt-2">0</h3>
            </div>
            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Populer Post</p>
                <h3 class="text-lg font-bold text-gray-800 mt-2">Belum ada data</h3>
            </div>
        </div>

        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm h-80 flex items-center justify-center">
            <p class="text-gray-400 italic">Grafik statistik mingguan akan tampil di sini</p>
        </div>
    </div>
</x-layouts.admin>
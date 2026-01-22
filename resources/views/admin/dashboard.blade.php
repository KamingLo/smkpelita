<x-layouts.admin>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Statistik</h1>
                <p class="text-sm text-gray-500">Pantau performa konten Anda secara real-time.</p>
            </div>
            <div class="px-4 py-2 bg-white border border-gray-200 rounded-xl shadow-sm text-sm font-medium text-gray-600">
                <i class="far fa-calendar-alt mr-2"></i> {{ now()->format('d F Y') }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Postingan</p>
                    <span class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="id-19"></path></svg>
                    </span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($totalPosts) }}</h3>
                <p class="text-xs text-gray-400 mt-2">Semua berita & pengumuman</p>
            </div>

            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Kunjungan Minggu Ini</p>
                    <span class="p-2 bg-green-50 text-green-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($weeklyViewsCount) }}</h3>
                <p class="text-xs text-gray-400 mt-2">Total views dalam 7 hari terakhir</p>
            </div>

            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider mb-4">Postingan Terpopuler</p>
                @if($popularPost)
                    <h3 class="text-lg font-bold text-gray-800 truncate">
                        <a href="{{ $popularPost->url }}" target="_blank" class="hover:text-blue-600 transition-colors" title="Lihat di halaman publik">
                            {{ $popularPost->title }}
                        </a>
                    </h3>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-sm font-semibold text-blue-600">{{ number_format($popularPost->view_count) }} Views</span>
                        <span class="px-2.5 py-0.5 text-[10px] font-bold uppercase rounded-full {{ $popularPost->type === 'berita' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                            {{ $popularPost->type }}
                        </span>
                    </div>
                @else
                    <h3 class="text-lg font-bold text-gray-400 mt-2 italic">Belum ada data</h3>
                @endif
            </div>
        </div>

        <div class="p-8 bg-white border border-gray-200 rounded-2xl shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Tren Kunjungan 7 Hari Terakhir</h3>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 bg-blue-600 rounded-full"></span>
                    <span class="text-xs text-gray-500 font-medium">Statistik Views</span>
                </div>
            </div>
            <div class="h-80 w-full">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('visitorChart').getContext('2d');
            
            // Konfigurasi Chart
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: @json($data),
                        borderColor: '#2563eb', // blue-600
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        fill: true,
                        tension: 0.4, // Membuat garis melengkung lembut
                        borderWidth: 3,
                        pointBackgroundColor: '#2563eb',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: '#1f2937',
                            padding: 12,
                            titleFont: { size: 14, weight: 'bold' },
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { strokeDashArray: 4, color: '#f3f4f6' },
                            ticks: { 
                                stepSize: 1,
                                font: { size: 12 }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 12 } }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.admin>
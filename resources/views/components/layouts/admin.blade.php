<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard - smk pelita</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
    @stack('styles')
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        
        <x-ui.admin.sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="flex items-center justify-between px-8 py-4 bg-gray-100 backdrop-blur-md border-b border-gray-300 shadow-sm relative z-30">
                
                <button @click="sidebarOpen = true" class="text-gray-400 focus:outline-none lg:hidden hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="flex items-center ml-auto space-x-6">
                    <div class="flex flex-col items-end">
                        <span class="text-sm font-medium text-blue-600 tracking-wider">Administrator</span>
                        <span class="text-md font-bold text-gray-800">{{ Auth::user()->name ?? "guest" }}</span>
                    </div>

                    {{-- garis pemisah --}}
                    <div class="h-8 w-px bg-gray-700"></div>

                    {{-- jam digital (alpine.js) --}}
                    <div x-data="{ 
                            time: '', 
                            updateTime() {
                                const now = new Date();
                                this.time = now.toLocaleTimeString('id-ID', { 
                                    hour: '2-digit', 
                                    minute: '2-digit', 
                                    second: '2-digit',
                                    hour12: false 
                                });
                            } 
                         }" 
                         x-init="updateTime(); setInterval(() => updateTime(), 1000)" 
                         class="flex flex-col items-start min-w-[100px]">
                        <span class="text-sm font-medium text-blue-400 tracking-wider">Waktu Server</span>
                        <span x-text="time" class="text-lg font-mono font-bold text-gray-800 leading-none"></span>
                    </div>
                </div>
            </header>

            {{-- area konten utama --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-8">
                <div class="container mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
<div>
    <div 
        x-show="sidebarOpen" 
        x-transition:opacity
        @click="sidebarOpen = false" 
        class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden">
    </div>

    <aside 
        class="fixed inset-y-0 left-0 z-50 w-72 bg-gray-100 border-r border-gray-200 transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0 shadow-sm flex flex-col h-screen"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        
        <div class="absolute top-5 right-5 lg:hidden">
            <button @click="sidebarOpen = false" class="p-2 rounded-lg text-gray-400 hover:bg-gray-200 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="flex-shrink-0 flex items-center justify-center px-6 h-28 border-b border-gray-200">
            <img src="{{ asset('image/logo/logo_pelita_project.png') }}" alt="Logo SMK Pelita" class="h-20 w-auto object-contain">
        </div>

        <nav class="flex-1 mt-8 px-4 space-y-1.5 overflow-y-auto custom-scrollbar">
            <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-4">Menu Utama</p>

            <x-ui.admin.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>Dashboard</span>
            </x-ui.admin.nav-link>

            <x-ui.admin.nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4"></path></svg>
                <span>Manajemen Berita</span>
            </x-ui.admin.nav-link>

            <x-ui.admin.nav-link href="#" :active="request()->routeIs('users.*')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span>Manajemen Admin</span>
            </x-ui.admin.nav-link>
        </nav>

        <div class="flex-shrink-0 p-4 border-t border-gray-200 bg-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-xs font-bold text-gray-500 hover:bg-red-600 hover:text-red-100 rounded-xl transition-all duration-300 uppercase tracking-widest">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout Akun Ini
                </button>
            </form>
        </div>
    </aside>
</div>
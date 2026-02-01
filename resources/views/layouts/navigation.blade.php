<aside 
    :class="mobileMenu ? 'translate-x-0' : '-translate-x-full'" 
    class="fixed inset-y-0 left-0 z-50 w-64 bg-indigo-900 dark:bg-indigo-950 text-white transform transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-auto">
    
    <div class="p-6 flex items-center justify-between border-b border-indigo-800/50">
        <span class="text-2xl font-black tracking-wider text-white">E-PRESENCE</span>
        <button @click="mobileMenu = false" class="md:hidden text-indigo-200 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <nav class="mt-6 px-4 space-y-1.5">


        @if(Auth::user()->role === 'admin')
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-indigo-600 shadow-lg shadow-indigo-900/50 text-white' : 'text-indigo-200 hover:bg-indigo-800/50 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard*') ? 'text-white' : 'text-indigo-400 group-hover:text-indigo-200' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="font-bold text-sm">Dashboard</span>
        </a>
            <div class="pt-6 pb-2 text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] px-4">Master Data</div>
            
            <a href="{{ route('admin.users.index') }}" 
               class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 shadow-lg shadow-indigo-900/50 text-white' : 'text-indigo-200 hover:bg-indigo-800/50 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-indigo-400 group-hover:text-indigo-200' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-bold text-sm">Kelola User</span>
            </a>

            <a href="#" 
               class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.classrooms.*') ? 'bg-indigo-600 shadow-lg shadow-indigo-900/50 text-white' : 'text-indigo-200 hover:bg-indigo-800/50 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 text-indigo-400 group-hover:text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span class="font-bold text-sm">Classrooms</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl text-indigo-200 hover:bg-indigo-800/50 hover:text-white transition group">
                <svg class="w-5 h-5 mr-3 text-indigo-400 group-hover:text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                <span class="font-bold text-sm">Locations</span>
            </a>
        @endif

        <div class="pt-6 pb-2 text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] px-4">Monitoring</div>
        
        <a href="#" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('attendance.*') ? 'bg-indigo-600 shadow-lg shadow-indigo-900/50 text-white' : 'text-indigo-200 hover:bg-indigo-800/50 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 text-indigo-400 group-hover:text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 002-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span class="font-bold text-sm">Attendance Logs</span>
        </a>
    </nav>
</aside>
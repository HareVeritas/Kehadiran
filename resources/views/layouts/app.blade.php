<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', mobileMenu: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SMK Presence</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="min-h-screen flex flex-col md:flex-row">

        @include('layouts.navigation')

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white dark:bg-gray-800 shadow-sm px-4 md:px-8 py-4 flex justify-between items-center transition-colors">
                <div class="flex items-center">
                    <button @click="mobileMenu = true" class="md:hidden mr-4 text-gray-600 dark:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h2 class="text-lg md:text-xl font-bold text-gray-800 dark:text-white truncate">Administrator Panel</h2>
                </div>

                <div class="flex items-center gap-2 md:gap-4">
                    <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-amber-400 transition">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" style="display: none;"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>

                    <div class="hidden sm:flex flex-col items-end mr-2">
                        <span class="text-sm font-bold text-gray-800 dark:text-white">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400 capitalize">{{ Auth::user()->role }}</span>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 text-red-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-4 md:p-8 overflow-y-auto">
                <div class="container mx-auto">
                    {{ $slot }}
                </div>
                <x-notification />
            </main>
        </div>

        <div x-show="mobileMenu" @click="mobileMenu = false" class="fixed inset-0 bg-black/50 z-40 md:hidden" x-transition:enter="transition opacity-20" x-transition:leave="transition opacity-0"></div>
    </div>
</body>
</html>
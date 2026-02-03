<x-guest-layout>
    <div class="min-h-screen flex flex-col lg:flex-row bg-gray-50">
        
        <div class="hidden lg:flex lg:w-7/12 bg-indigo-700 relative overflow-hidden items-center justify-center p-12">
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute w-96 h-96 bg-indigo-600 rounded-full -top-20 -left-20 opacity-50"></div>
                <div class="absolute w-64 h-64 bg-indigo-500 rounded-full bottom-10 right-10 opacity-30"></div>
            </div>

            <div class="relative z-10 max-w-lg text-center">
                <div class="mb-8 inline-block p-5 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3c1.268 0 2.39.234 3.414.659m-1.21 1.408a10.003 10.003 0 014.242 4.242M9.882 15.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-white mb-6 tracking-tight">E-Presence SMK</h1>
                <p class="text-indigo-100 text-xl leading-relaxed font-light">
                    Sistem Manajemen Kehadiran Terpadu. Pantau kedisiplinan siswa di sekolah maupun lokasi PKL secara presisi melalui teknologi Geofencing.
                </p>
                <div class="mt-12 flex justify-center gap-6">
                    <div class="text-white text-center">
                        <span class="block text-3xl font-bold">100%</span>
                        <span class="text-indigo-200 text-xs uppercase tracking-widest">Akurat</span>
                    </div>
                    <div class="w-px h-12 bg-indigo-500/50"></div>
                    <div class="text-white text-center">
                        <span class="block text-3xl font-bold">Realtime</span>
                        <span class="text-indigo-200 text-xs uppercase tracking-widest">Monitoring</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 flex items-center justify-center p-6 sm:p-12 lg:p-24 bg-white">
            <div class="w-full max-w-md">
                <div class="lg:hidden text-center mb-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 text-indigo-700 rounded-2xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3c1.268 0 2.39.234 3.414.659m-1.21 1.408a10.003 10.003 0 014.242 4.242M9.882 15.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900">Sign In</h2>
                    <p class="text-gray-500 mt-2">Masuk ke Dashboard Guru & Admin</p>
                </div>

                <div class="hidden lg:block mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Selamat Datang</h2>
                    <p class="text-gray-500 mt-2">Silakan masukkan detail akun Anda.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="login" class="text-sm font-semibold text-gray-700 ml-1">Username / Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="login" name="login" type="text" required autofocus 
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200 shadow-sm"
                                placeholder="Masukkan username/email">
                        </div>
                        <x-input-error :messages="$errors->get('login')" class="mt-1" />
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between ml-1">
                            <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-500">Lupa?</a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200 shadow-sm"
                                placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="flex items-center ml-1">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat perangkat ini</label>
                    </div>

                    <button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-200 transform transition active:scale-95 duration-150">
                        Login Sekarang
                    </button>
                </form>

                <div class="mt-12 text-center">
                    <p class="text-gray-400 text-xs">&copy; 2026  Integrated Management System. <br> Powered by TechSMK Nesas.</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
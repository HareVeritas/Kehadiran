<x-app-layout>
    <div class="max-w-12xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 text-gray-500 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Edit User</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                @csrf @method('PATCH')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Email Sekolah</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Role Akses</label>
                    <select name="role" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Guru</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                </div>

                <div class="pt-4 border-t dark:border-gray-700">
                    <div class="bg-amber-50 dark:bg-amber-900/10 p-4 rounded-2xl mb-6">
                        <p class="text-xs text-amber-700 dark:text-amber-400 font-bold uppercase tracking-widest">Peringatan</p>
                        <p class="text-xs text-amber-600 dark:text-amber-500">Kosongkan kolom password di bawah jika Anda tidak ingin mengubah password.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 dark:text-gray-300 text-opacity-50">Password Baru</label>
                            <input type="password" name="password" class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 dark:text-gray-300 text-opacity-50">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all">
                    PERBARUI USER
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
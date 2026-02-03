<x-app-layout>
    <div class="max-w-12xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 text-gray-500 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Tambah User</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        <x-input-error :messages="$errors->get('name')" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Username</label>
                        <input type="text" name="username" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        <x-input-error :messages="$errors->get('username')" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Email Sekolah</label>
                    <input type="email" name="email" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Role Akses</label>
                    <select name="role" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                        <option value="teacher">Guru</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t dark:border-gray-700">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" name="password" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required class="block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all">
                    SIMPAN USER
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
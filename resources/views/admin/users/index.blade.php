<x-app-layout>
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Manajemen User</h1>
                <p class="text-gray-500 dark:text-gray-400">Kelola akses akun Admin dan Guru dalam satu tempat.</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all transform active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Tambah User Baru
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 p-4 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau username..." class="block w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-700 border-none rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 dark:text-white">
                </div>
                <button type="submit" class="px-6 py-2.5 bg-gray-900 dark:bg-gray-700 text-white rounded-xl font-bold text-sm hover:bg-gray-800 transition">Filter</button>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 text-xs uppercase font-black">
                        <tr>
                            <th class="px-6 py-4">Nama & Akun</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $user->name }}</span>
                                    <span class="text-xs text-gray-500">@ {{ $user->username }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400' : 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/20 rounded-lg transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800/50">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
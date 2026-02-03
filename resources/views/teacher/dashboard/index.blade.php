<x-app-layout>
    <div class="space-y-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">
                    Panel Monitoring Guru
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">
                    Selamat datang kembali, <span class="text-indigo-600 dark:text-indigo-400 font-bold">{{ Auth::user()->name }}</span>
                </p>
            </div>
            <div class="flex items-center gap-3 bg-white dark:bg-gray-800 p-2 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                <div class="px-4 py-2 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl">
                    <span class="text-xs font-black text-indigo-700 dark:text-indigo-400 uppercase">{{ now()->format('l, d F Y') }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
                    <form action="{{ route('dashboard') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-1">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..." 
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 dark:bg-gray-700 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500 dark:text-white transition">
                        </div>
                        
                        <select name="status" class="bg-gray-50 dark:bg-gray-700 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500 dark:text-white py-3 px-4">
                            <option value="">Semua Status</option>
                            <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Hadir</option>
                            <option value="late" {{ request('status') == 'late' ? 'selected' : '' }}>Terlambat</option>
                        </select>

                        <button type="submit" class="px-8 py-3 bg-gray-900 dark:bg-indigo-600 text-white font-black rounded-2xl hover:bg-gray-800 dark:hover:bg-indigo-700 transition transform active:scale-95 shadow-lg shadow-gray-200 dark:shadow-none">
                            FILTER
                        </button>
                    </form>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-50 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="font-black text-gray-900 dark:text-white uppercase text-sm tracking-widest">Log Kehadiran Hari Ini</h3>
                        <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-[10px] font-black rounded-full animate-pulse">LIVE MONITOR</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50 dark:bg-gray-700/50 text-[10px] font-black uppercase text-gray-400 tracking-[0.15em]">
                                <tr>
                                    <th class="px-6 py-4">Siswa</th>
                                    <th class="px-6 py-4">Waktu</th>
                                    <th class="px-6 py-4">Status Lokasi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-gray-700 text-sm">
                                @forelse($recent_attendances as $attendance)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition">
                                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                        {{ $attendance->student->name }}
                                        <p class="text-[10px] font-medium text-gray-400 mt-0.5">{{ $attendance->student->classroom->class_name }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($attendance->check_in)->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($attendance->is_within_radius)
                                            <span class="inline-flex items-center text-[10px] font-black text-emerald-600 dark:text-emerald-400 uppercase bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-md">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                Valid
                                            </span>
                                        @else
                                            <span class="inline-flex items-center text-[10px] font-black text-red-600 dark:text-red-400 uppercase bg-red-50 dark:bg-red-900/20 px-2 py-1 rounded-md">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                                Luar Jangkauan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-10 text-center text-gray-400 italic">Data tidak ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-800/50">
                        {{ $recent_attendances->links() }}
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm transition-colors">
                    <h4 class="font-black text-gray-900 dark:text-white uppercase text-sm tracking-widest mb-8 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        Persentase Minggu Ini
                    </h4>
                    
                    <div class="space-y-7">
                        @foreach($weeklyStats as $stat)
                        <div>
                            <div class="flex justify-between items-end mb-2.5">
                                <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">{{ $stat['day'] }}</span>
                                <span class="text-sm font-black text-gray-900 dark:text-white">{{ $stat['percentage'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-700 h-2.5 rounded-full overflow-hidden shadow-inner">
                                <div class="bg-indigo-500 dark:bg-indigo-400 h-full rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ $stat['percentage'] }}%">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-10 p-4 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl border border-indigo-100 dark:border-indigo-800/50">
                        <p class="text-[11px] leading-relaxed text-indigo-700 dark:text-indigo-400 font-bold">
                            💡 Persentase dihitung berdasarkan total <span class="text-indigo-900 dark:text-white underline">{{ $totalStudents }} siswa</span> yang terdaftar di sistem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
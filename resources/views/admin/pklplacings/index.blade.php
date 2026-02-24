<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PKL Placings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">Daftar PKL Placings</h3>
                        <a href="{{ route('admin.pklplacings.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah PKL Placing
                        </a>
                    </div>

                    <!-- Search Form -->
                    <form method="GET" class="mb-4">
                        <div class="flex">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama siswa atau lokasi..." class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-r-md">
                                Cari
                            </button>
                        </div>
                    </form>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Selesai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pklplacings as $pklplacing)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $pklplacing->student->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $pklplacing->location->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $pklplacing->start_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $pklplacing->end_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($pklplacing->status == 'active') bg-green-100 text-green-800
                                            @elseif($pklplacing->status == 'completed') bg-blue-100 text-blue-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($pklplacing->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.pklplacings.edit', $pklplacing) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" action="{{ route('admin.pklplacings.destroy', $pklplacing) }}" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data PKL Placing.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $pklplacings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

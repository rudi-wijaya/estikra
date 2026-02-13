<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                💬 Kelola Pesan
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pesan</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Message::count() }}</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Belum Dibaca</h3>
                        <p class="text-3xl font-bold text-orange-600">{{ \App\Models\Message::where('status', 'belum dibaca')->count() }}</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Sudah Dibaca</h3>
                        <p class="text-3xl font-bold text-green-600">{{ \App\Models\Message::where('status', 'sudah dibaca')->count() }}</p>
                    </div>
                </div>
            </div>

            @if ($messages->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Nama</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Email</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Subjek</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Tanggal</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900 dark:text-gray-100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach ($messages as $message)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 {{ $message->status === 'belum dibaca' ? 'bg-yellow-50 dark:bg-yellow-900/10' : '' }}">
                                        <td class="px-6 py-4 text-sm">
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $message->status === 'belum dibaca' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' }}">
                                                {{ ucfirst($message->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $message->nama }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $message->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ Str::limit($message->subjek, 40) }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 text-sm text-center space-x-3">
                                            <a href="{{ route('messages.show', $message) }}" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-xs font-semibold rounded hover:bg-blue-700 transition">
                                                👁️ Lihat
                                            </a>
                                            <form action="{{ route('messages.delete', $message) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 transition">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($messages->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                            {{ $messages->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-12 text-center">
                        <p class="text-6xl mb-4">📭</p>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Tidak ada pesan masuk</h3>
                        <p class="text-gray-500 dark:text-gray-400">Semua pesan akan muncul di sini setelah pengunjung mengirimkan pesan kontak.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

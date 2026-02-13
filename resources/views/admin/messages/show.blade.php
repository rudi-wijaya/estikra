<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Pesan
            </h2>
            <a href="{{ route('messages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <!-- Status Badge -->
                    <div class="mb-8 flex items-center justify-between">
                        <div>
                            <span class="inline-flex px-4 py-2 text-sm font-semibold rounded-full {{ $message->status === 'belum dibaca' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' }}">
                                ✓ {{ ucfirst($message->status) }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Diterima: {{ $message->created_at->format('d/m/Y pukul H:i') }}
                        </div>
                    </div>

                    <!-- Sender Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">👤 Nama Pengirim</h3>
                            <p class="text-xl font-semibold">{{ $message->nama }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">📧 Email</h3>
                            <p class="text-lg">
                                <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 break-all">
                                    {{ $message->email }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-3">📌 Subjek</h3>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $message->subjek }}</h2>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-4">💬 Pesan</h3>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg whitespace-pre-wrap text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $message->pesan }}
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 flex-wrap">
                        @if ($message->status === 'belum dibaca')
                            <form action="{{ route('messages.mark-as-read', $message) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    ✓ Tandai Sudah Dibaca
                                </button>
                            </form>
                        @endif
                        
                        <form action="{{ route('messages.delete', $message) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dikembalikan.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                🗑️ Hapus Pesan
                            </button>
                        </form>

                        <a href="mailto:{{ $message->email }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            ✉️ Balas Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

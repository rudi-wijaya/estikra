<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Berita -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold">📰 Berita</h3>
                            <span class="text-3xl font-bold text-blue-600">0</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Total berita yang telah dibuat</p>
                        <div class="mt-4 flex gap-2">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                                Kelola Berita
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                + Buat Baru
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Galeri -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold">🖼️ Galeri</h3>
                            <span class="text-3xl font-bold text-purple-600">0</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Total foto dalam galeri</p>
                        <div class="mt-4 flex gap-2">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 transition">
                                Kelola Galeri
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                + Upload
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold">📊 Statistik</h3>
                            <span class="text-3xl font-bold text-green-600">0</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Pengunjung bulan ini</p>
                        <div class="mt-4">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                Lihat Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Selamat datang, Admin! 👋</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Anda sedang masuk ke panel administrasi SD Negeri 3 Krasak Bangsri. Gunakan menu di atas untuk mengelola konten website sekolah.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div class="border-l-4 border-blue-600 pl-4">
                            <h4 class="font-semibold text-blue-600">📚 Kelola Konten</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Tambah, edit, atau hapus berita dan foto galeri</p>
                        </div>
                        <div class="border-l-4 border-purple-600 pl-4">
                            <h4 class="font-semibold text-purple-600">🔐 Keamanan</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Logout kapan saja untuk mengakhiri sesi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

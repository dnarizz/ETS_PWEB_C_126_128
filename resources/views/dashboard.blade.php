<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl">
                <div class="p-8 md:p-10 text-gray-900 dark:text-gray-100">
                    
                    <!-- Pesan Selamat  -->
                    <div class="flex items-center space-x-4 mb-8 pb-4 border-b border-gray-100 dark:border-gray-700">
                        <svg class="w-10 h-10 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                        <div>
                            <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Pengguna' }}!</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __("Anda berhasil masuk ke sistem manajemen perpustakaan.") }}</p>
                        </div>
                    </div>
                    
                    <!-- Kartu Navigasi Utama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- Kartu 1: List Buku (Manajemen Buku) --}}
                        <a href="{{ route('books.index') }}" 
                           class="block p-6 bg-gray-50 dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition duration-300 border-l-4 border-red-600">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <div>
                                    <p class="text-xl font-bold text-gray-900 dark:text-white">Kelola Daftar Buku</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">Lihat semua koleksi, tambah, edit, atau hapus buku.</p>
                                </div>
                            </div>
                        </a>
                        
                        <!--Kartu 2: List Peminjaman (Riwayat/Status Pinjaman) -->
                        <a href="{{ route('borrow.screen') }}" 
                           class="block p-6 bg-gray-50 dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition duration-300 border-l-4 border-blue-600">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-xl font-bold text-gray-900 dark:text-white">Status Peminjaman</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">Cek riwayat peminjaman, tanggal jatuh tempo, dan status pengembalian.</p>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
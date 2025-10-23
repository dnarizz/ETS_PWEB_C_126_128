<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pinjam Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Kartu Utama -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl sm:rounded-xl overflow-hidden">
                <div class="p-8 md:p-10">
                    
                    <!-- HEADER BUKU -->
                    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                        {{ $book->title }}
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-6 border-b pb-4 border-gray-100 dark:border-gray-700">
                        Oleh: <span class="font-semibold">{{ $book->author }}</span>
                    </p>
                    
                    <!-- DETAIL -->
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        
                        <!-- Kategori -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-inner">
                            <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Kategori</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white mt-1">{{ $book->genre ?? $book->category }}</p>
                        </div>
                        
                        <!-- Status Stok -->
                        <div class="p-4 rounded-lg shadow-inner 
                            @if ($book->stock > 0) bg-green-50 dark:bg-green-800 @else bg-red-50 dark:bg-red-800 @endif">
                            
                            <p class="text-xs font-semibold uppercase 
                                @if ($book->stock > 0) text-green-600 dark:text-green-300 @else text-red-600 dark:text-red-300 @endif">
                                STATUS STOK
                            </p>
                            <p class="text-2xl font-bold mt-1 
                                @if ($book->stock > 0) text-green-700 dark:text-green-200 @else text-red-700 dark:text-red-200 @endif">
                                {{ $book->stock }} Tersedia
                            </p>
                        </div>
                    </div>

                    <!-- ERROR -->
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <strong class="font-bold">Gagal!</strong>
                            <span class="block sm:inline ml-2">{{ session('error') }}</span>
                        </div>
                    @endif

                    <!-- AKSI KONFIRMASI -->
                    <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                        Apakah Anda yakin ingin meminjam buku ini?
                    </h3>

                    <form action="{{ route('borrow.store', $book->id) }}" method="POST" class="flex space-x-4">
                        @csrf
                        
                        {{-- Tombol Konfirmasi Pinjam --}}
                        <button type="submit" 
                            @if ($book->stock < 1) disabled @endif
                            class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-lg shadow-md transition duration-150 
                            {{ $book->stock < 1 ? 'bg-gray-400 text-gray-700 cursor-not-allowed' : 'bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500' }}">
                            
                            @if ($book->stock < 1)
                                Stok Habis
                            @else
                                Konfirmasi Peminjaman
                            @endif
                        </button>
                        
                        <!-- Tombol Batal -->
                        <a href="{{ route('books.index') }}" 
                           class="inline-flex items-center px-8 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm transition duration-150">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
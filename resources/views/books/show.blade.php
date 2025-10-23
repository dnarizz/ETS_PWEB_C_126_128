<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Tombol Kembali -->
            <a href="{{ route('books.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-150 mb-6 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>

            <!--  Card Detail Buku -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl">
                
                <!-- Card Header-->
                <div class="p-6 bg-red-600 dark:bg-red-700 sm:rounded-t-xl">
                    <h3 class="text-3xl font-extrabold text-white">
                        <!-- $book->title-->
                    </h3>
                </div>
                
                <!-- Card Body -->
                <div class="p-8 text-gray-900 dark:text-gray-100 space-y-4">
                    
                    <div class="grid grid-cols-2 gap-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                        <!-- Author -->
                        <div>
                            <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Author</p>
                            <p class="text-lg font-medium">{{ $book->author }}</p>
                        </div>
                        <!-- Genre  -->
                        <div>
                            <p class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Genre</p>
                            <p class="text-lg font-medium">{{ $book->genre }}</p>
                        </div>
                    </div>
                    
                    <!-- Status Stok -->
                    <div class="pt-2">
                        <p class="text-sm font-semibold uppercase text-gray-500 dark:text-gray-400">Stok Tersedia</p>
                        <p class="text-2xl font-bold mt-1 
                            {{ $book->stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ $book->stock }}
                        </p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="pt-4">
                        <p class="text-sm font-semibold uppercase text-gray-500 dark:text-gray-400 mb-2">Deskripsi</p>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $book->description }}
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-6">
                        @if($book->stock > 0)
                            <a href="{{ route('borrow.borrow', $book->id) }}"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                                 Konfirmasi Pinjam Buku
                            </a>
                        @else
                            <button disabled
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-md text-white bg-red-400 cursor-not-allowed">
                                 Stok Habis
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
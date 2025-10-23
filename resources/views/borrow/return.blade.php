<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buku yang Sedang Dipinjam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Kontainer Utama -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl">
                <div class="p-6">
                    
                    <!-- Pesan Sukses -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow-md" role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline ml-2">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($borrows->isEmpty())
                        <!-- Desain untuk tampilan kosong -->
                        <div class="text-center py-10 border border-dashed border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <svg class="w-12 h-12 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.208 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.892 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.892 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.108 18 16.5 18s-3.332.477-4.5 1.253"></path>
                            </svg>
                            <p class="mt-3 text-lg font-medium text-gray-700 dark:text-gray-300">Hore! Kamu belum meminjam buku apa pun saat ini.</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Saatnya cek koleksi buku kami dan mulai meminjam!</p>
                            <a href="{{ route('books.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                                📚 Lihat Koleksi Buku
                            </a>
                        </div>
                    @else
                        <!-- Tabel Daftar Peminjaman -->
                        <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Judul Buku</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Pinjam</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jatuh Tempo</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($borrows as $b)
                                        @php
                                            $isLate = \Carbon\Carbon::now()->greaterThan($b->due_date);
                                        @endphp
                                        <tr class="hover:bg-red-50 dark:hover:bg-red-900 transition duration-150">
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-600 dark:text-red-400">
                                                {{ $b->book->title ?? 'Buku Tidak Ditemukan' }}
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                {{ \Carbon\Carbon::parse($b->borrow_date)->format('d M Y') }}
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $isLate ? 'text-red-600 dark:text-red-400' : 'text-yellow-600 dark:text-yellow-400' }}">
                                                {{ \Carbon\Carbon::parse($b->due_date)->format('d M Y') }}
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $isLate ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ $isLate ? 'TERLAMBAT' : 'Aktif' }}
                                                </span>
                                            </td>
                                            
                                            <!-- Aksi -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <form action="{{ route('borrow.return', $b->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                                         Kembalikan Buku
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Peminjaman Buku Perpustakaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    
    <!--  HEADER  -->
    <div class="relative min-h-screen">
        <header class="p-6 flex justify-between items-center max-w-7xl mx-auto">
            <!-- Logo  -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-900 dark:text-white">
                <span class="text-red-500">Ohara</span>Alexandria
            </a>

            <!-- Login & Register  -->
            <nav class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg shadow-md transition duration-150 ease-in-out">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>

        <!--  Body -->
        <main class="py-20 max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-7xl">
                Temukan Dunia Baru.
            </h1>
            <p class="mt-4 text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Sistem Peminjaman Buku Digital dan Fisik Perpustakaan Anda. Pinjam, baca, dan kembalikan dengan mudah.
            </p>
            
            <div class="mt-8 flex justify-center space-x-4">
                <!--  Tombol Halaman Index Buku  -->
                <a href="{{ route('books.index') }}" 
                   class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 transition duration-150 ease-in-out">
                    Lihat Koleksi Buku
                </a>
                
                <!--  Tombol ke Register (Jika belum login)  -->
                @guest
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                        Bergabung Sekarang
                    </a>
                @endguest
            </div>
        </main>
        
        <!--  CARD  -->
        <div class="pb-16 max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                
                <!--  Card 1 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-2xl transition duration-300 ease-in-out hover:shadow-red-500/50">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-500 text-white mb-4">
                        <!--  Icon  -->
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.497 9.55 5 8 5c-4.478 0-8 2.058-8 4.667 0 1.054.498 2.02 1.408 2.825L6 18l-4 4V12c-1.408-0.805-1.408-1.771-1.408-2.825C1.408 6.058 4.922 4 8 4c1.55 0 2.832 0.497 4 1.253zM12 6.253v13m0-13C13.168 5.497 14.45 5 16 5c4.478 0 8 2.058 8 4.667 0 1.054-0.498 2.02-1.408 2.825L18 18l4 4V12c1.408-0.805 1.408-1.771 1.408-2.825C22.592 6.058 19.078 4 16 4c-1.55 0-2.832 0.497-4 1.253z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Koleksi Terverifikasi</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Jelajahi ribuan judul dari berbagai genre. Semua buku terjamin ketersediaannya dan siap untuk dipinjam.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-2xl transition duration-300 ease-in-out hover:shadow-red-500/50">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-500 text-white mb-4">
                        <!--  Icon -->
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18V6M6 12h12"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Akses Cepat & Akurat</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Reservasi buku fisik atau baca versi digital langsung dari perangkat Anda.</p>
                </div>

            </div>
        </div>
        
        <!--  FOOTER  -->
        <footer class="py-4 text-center text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700">
            &copy; {{ date('Y') }} OharaAlexandria - Sistem Peminjaman Perpustakaan.
        </footer>
    </div>
</body>
</html>
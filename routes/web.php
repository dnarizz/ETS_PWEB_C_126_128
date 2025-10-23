<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\BookController;

Route::resource('books', BookController::class)->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books/{id}', [BookController::class, 'show'])->name('book.show');

use App\Http\Controllers\BorrowController;

// form pinjam buku
Route::get('/borrow/{id}', [BorrowController::class, 'borrow'])->name('borrow.borrow');

// proses simpan pinjaman
Route::post('/borrow/{id}', [BorrowController::class, 'store'])->name('borrow.store');

// daftar buku yang sedang dipinjam
Route::get('/my-borrowings', [BorrowController::class, 'index'])->name('borrow.index');

// proses pengembalian buku
Route::post('/return/{id}', [BorrowController::class, 'returnBook'])->name('borrow.return');

Route::get('/borrowings', [BorrowController::class, 'screen'])->name('borrow.screen');

Route::get('/borrow/return/{id}', [BorrowController::class, 'returnBook'])->name('borrow.return');

require __DIR__.'/auth.php';

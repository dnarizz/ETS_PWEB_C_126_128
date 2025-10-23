<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function borrow($id)
    {
        $book = Book::findOrFail($id);
        return view('borrow.borrow', compact('book'));
    }

    public function store(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }

        $borrow = new Borrowing();
        $borrow->id = Auth::id();
        $borrow->id = $book->id;
        $borrow->borrow_date = Carbon::now();
        $borrow->due_date = Carbon::now()->addDays(7);
        $borrow->status = 'borrowed';
        $borrow->save();

        $book->stock -= 1;
        $book->save();

        return redirect()->route('books.show', $book->id)
                         ->with('success', 'Buku berhasil dipinjam!');
    }

    public function index()
    {
        $borrows = Borrowing::where('id', Auth::id())
                            ->where('status', 'borrowed')
                            ->with('book')
                            ->get();

        return view('borrow.return', compact('borrows'));
    }

    public function returnBook($id)
    {
        $borrow = Borrowing::findOrFail($id);
        $book = $borrow->book;

        $borrow->return_date = Carbon::now();



        $borrow->status = 'returned';
        $borrow->save();

        $book->stock += 1;
        $book->save();

        return redirect()->route('borrow.index')->with('success', 'Buku berhasil dikembalikan!');
    }


public function screen()
{
    $borrowings = Borrowing::with('book')
                 ->latest()
                 ->get();
                 
    return view('borrow.screen', compact('borrowings'));
}
}

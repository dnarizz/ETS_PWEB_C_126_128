<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


   public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'stock' => 'nullable|integer|min:0',
        'genre' => 'nullable|string',
        'description' => 'nullable|string',
    ]);

    $book->update($validated);
    
    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
}


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}

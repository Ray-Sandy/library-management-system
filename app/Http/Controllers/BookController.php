<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('page.book.book', compact('books'));
    }

    public function create()
    {
        return view('page.book.create');
    }

    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('author', $request->author);
        Session::flash('publisher', $request->publisher);
        Session::flash('year', $request->year);
        Session::flash('isbn', $request->isbn);
        Session::flash('status', $request->status);
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'required|string|unique:books,isbn',
            'status' => 'required|in:available,borrowed',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'status' => $request->status,
        ];

        // Simpan data buku
        Book::create($data);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect('admin/books')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('page.book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {   
        // Validasi input
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|numeric',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'status' => 'required|in:available,borrowed',
        ]);

        // Update data buku
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'status' => $request->status,
        ]);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}

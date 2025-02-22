<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    // Method untuk meminjam buku dengan sekali klik
    public function borrowing(Book $book)
    {
        // Pastikan buku tersedia
        if ($book->status != 'available') {
            return redirect()->back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        // Buat peminjaman
        Borrowing::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'book_id' => $book->id,
            'borrow_date' => now(),
            'status' => 'borrowed',
        ]);

        // Update status buku menjadi "borrowed"
        $book->update(['status' => 'borrowed']);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
    }
}

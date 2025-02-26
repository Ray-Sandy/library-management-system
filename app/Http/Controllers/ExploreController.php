<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;

class ExploreController extends Controller
{
    /**
     * Menampilkan daftar buku yang tersedia untuk dipinjam.
     */
    public function index(Request $request)
    {
        $stocks = Stock::all();
        return view('page.member.explore', compact('stocks'));
    }
    public function search(Request $request)
    {
        // Pencarian buku berdasarkan judul atau ISBN
        $search = $request->input('search');

        $query = "SELECT * FROM stocks WHERE stock > 0";
        $bindings = [];

        if ($search) {
            $query .= " AND (title LIKE ? OR isbn LIKE ?)";
            $bindings = ["%$search%", "%$search%"];
        }

        // Mengambil data buku yang tersedia
        $books = DB::select($query, $bindings);

        return view('page.member.explore', compact('books', 'search'));
    }

    /**
     * Proses peminjaman buku oleh member.
     */
    public function borrow($id)
    {
        // Cari buku berdasarkan ID
        $book = DB::selectOne("SELECT * FROM stocks WHERE id = ?", [$id]);

        // Cek apakah stok buku masih tersedia
        if (!$book || $book->stock <= 0) {
            return redirect()->route('member.explore')->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        // Kurangi stok buku
        DB::update("UPDATE stocks SET stock = stock - 1 WHERE id = ?", [$id]);

        // Simpan data peminjaman ke history
        DB::insert("INSERT INTO history (user_id, stock_id, borrowed_at, status, created_at, updated_at) VALUES (?, ?, NOW(), 'borrowed', NOW(), NOW())", [auth()->id(), $id]);

        return redirect()->route('member.explore')->with('success', 'Buku berhasil dipinjam!');
    }

    public function myLibrary()
    {
        $userId = auth()->id();

        $borrowedBooks = DB::select("
            SELECT h.id, s.title, s.author, s.publisher, s.year, s.isbn, h.borrowed_at, h.returned_at, h.status
            FROM history h
            JOIN stocks s ON h.stock_id = s.id
            WHERE h.user_id = ? AND h.status = 'borrowed'
            ORDER BY h.borrowed_at DESC
        ", [$userId]);

        return view('page.member.mylibrary', compact('borrowedBooks'));
    }

    public function returnBook($id)
    {
        $userId = auth()->id();

        // Cek apakah buku ada dalam daftar pinjaman user
        $borrow = DB::selectOne("
            SELECT * FROM history WHERE id = ? AND user_id = ? AND status = 'borrowed'
        ", [$id, $userId]);

        if (!$borrow) {
            return redirect()->route('member.mylibrary')->with('error', 'Buku tidak ditemukan atau sudah dikembalikan.');
        }

        // Update status peminjaman menjadi "returned"
        DB::update("
            UPDATE history SET status = 'returned', returned_at = NOW(), updated_at = NOW() WHERE id = ?
        ", [$id]);

        // Tambahkan stok kembali ke tabel stocks
        DB::update("
            UPDATE stocks SET stock = stock + 1 WHERE id = ?
        ", [$borrow->stock_id]);

        return redirect()->route('member.mylibrary')->with('success', 'Buku berhasil dikembalikan.');
    }

}

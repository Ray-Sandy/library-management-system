<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('page.admin.stock.stock', compact('stocks'));
    }

    public function create()
    {
        return view('page.admin.stock.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'required|string|unique:stocks,isbn',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'title.required' => 'Judul buku wajib diisi.',
            'title.string' => 'Judul buku harus berupa teks.',
            'title.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',

            'author.required' => 'Nama penulis wajib diisi.',
            'author.string' => 'Nama penulis harus berupa teks.',
            'author.max' => 'Nama penulis tidak boleh lebih dari 255 karakter.',

            'publisher.required' => 'Nama penerbit wajib diisi.',
            'publisher.string' => 'Nama penerbit harus berupa teks.',
            'publisher.max' => 'Nama penerbit tidak boleh lebih dari 255 karakter.',

            'year.required' => 'Tahun terbit wajib diisi.',
            'year.integer' => 'Tahun terbit harus berupa angka.',
            'year.min' => 'Tahun terbit tidak boleh lebih kecil dari 1900.',
            'year.max' => 'Tahun terbit tidak boleh lebih besar dari tahun saat ini.',

            'isbn.required' => 'ISBN wajib diisi.',
            'isbn.string' => 'ISBN harus berupa teks.',
            'isbn.unique' => 'ISBN sudah digunakan, gunakan ISBN yang berbeda.',

            'stock.required' => 'Jumlah stok wajib diisi.',
            'stock.integer' => 'Jumlah stok harus berupa angka.',
            'stock.min' => 'Jumlah stok tidak boleh kurang dari 0.'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('stock_images', 'public');
        }

        // Stock::create($request->all());
        Stock::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'stock' => $request->stock,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.stocks.index')->with('success', 'Stock added successfully.');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('page.admin.stock.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            // 'isbn' => 'required|string|unique:stocks,isbn,' . $stock->id,
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($stock->image) {
                Storage::disk('public')->delete($stock->image);
            }
    
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('stock_images', 'public');
            $stock->image = $imagePath;
        }

        // $stock->update($request->all());
        $stock->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            // 'isbn' => $request->isbn,
            // 'stock' => $request->stock,
        ]);

        return redirect()->route('admin.stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy($id)
    {
        Stock::destroy($id);
        return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted successfully.');
    }
}

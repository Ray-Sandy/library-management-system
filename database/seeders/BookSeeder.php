<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'publisher' => 'Scribner',
                'year' => 1925,
                'isbn' => '9780743273565',
                'status' => 'available',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'publisher' => 'J.B. Lippincott & Co.',
                'year' => 1960,
                'isbn' => '9780061120084',
                'status' => 'available',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'year' => 1949,
                'isbn' => '9780451524935',
                'status' => 'borrowed',
            ],
            // Tambahkan data buku lainnya di sini (total 10 buku)
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

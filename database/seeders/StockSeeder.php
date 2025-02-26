<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            [
                'title' => 'Belajar Laravel',
                'author' => 'John Doe',
                'publisher' => 'Tech Books',
                'year' => 2023,
                'isbn' => '978-1234567890',
                'stock' => 10,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mastering PHP',
                'author' => 'Jane Doe',
                'publisher' => 'Code Books',
                'year' => 2022,
                'isbn' => '978-0987654321',
                'stock' => 5,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fundamentals of JavaScript',
                'author' => 'Chris Smith',
                'publisher' => 'Web Dev Press',
                'year' => 2021,
                'isbn' => '978-1122334455',
                'stock' => 8,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Python for Data Science',
                'author' => 'Anna Johnson',
                'publisher' => 'AI Books',
                'year' => 2020,
                'isbn' => '978-6677889900',
                'stock' => 7,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'React Native Essentials',
                'author' => 'Michael Brown',
                'publisher' => 'Mobile Dev Media',
                'year' => 2019,
                'isbn' => '978-5544332211',
                'stock' => 6,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Django for Beginners',
                'author' => 'Robert White',
                'publisher' => 'Python Dev Books',
                'year' => 2021,
                'isbn' => '978-9988776655',
                'stock' => 4,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Introduction to Algorithms',
                'author' => 'Thomas H. Cormen',
                'publisher' => 'MIT Press',
                'year' => 2018,
                'isbn' => '978-0262033848',
                'stock' => 12,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Machine Learning with Python',
                'author' => 'Sebastian Raschka',
                'publisher' => 'Packt Publishing',
                'year' => 2020,
                'isbn' => '978-1783555130',
                'stock' => 9,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publisher' => 'Prentice Hall',
                'year' => 2008,
                'isbn' => '978-0132350884',
                'stock' => 15,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt & David Thomas',
                'publisher' => 'Addison-Wesley',
                'year' => 1999,
                'isbn' => '978-0201616224',
                'stock' => 3,
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);
        Book::create(['isbn' => '978-0134685991', 'title' => 'Effective Java', 'author' => 'Joshua Bloch', 'publisher' => 'Addison-Wesley', 'publication_year' => 2018, 'category' => 'Programming', 'quantity' => 3, 'available' => 3, 'description' => 'Java programming best practices']);
        Book::create(['isbn' => '978-0596517748', 'title' => 'JavaScript: The Good Parts', 'author' => 'Douglas Crockford', 'publisher' => "O'Reilly", 'publication_year' => 2008, 'category' => 'Programming', 'quantity' => 2, 'available' => 2]);
        Book::create(['isbn' => '978-0201633610', 'title' => 'Design Patterns', 'author' => 'Gang of Four', 'publisher' => 'Addison-Wesley', 'publication_year' => 1994, 'category' => 'Software Engineering', 'quantity' => 2, 'available' => 2]);
        Book::create(['isbn' => '978-0132350884', 'title' => 'Clean Code', 'author' => 'Robert Martin', 'publisher' => 'Prentice Hall', 'publication_year' => 2008, 'category' => 'Software Engineering', 'quantity' => 4, 'available' => 4]);
        Book::create(['isbn' => '978-0262033848', 'title' => 'Introduction to Algorithms', 'author' => 'Cormen et al', 'publisher' => 'MIT Press', 'publication_year' => 2009, 'category' => 'Algorithms', 'quantity' => 2, 'available' => 2]);
    }
}

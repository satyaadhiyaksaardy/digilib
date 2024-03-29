<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bookCategories = BookCategory::factory(10)->create();

        User::factory(20)
            ->has(
                Book::factory()
                    ->count(15)
                    ->sequence(fn($sequence) => ['book_category_id' => $bookCategories->random()->id]))
            ->create();

        User::factory(4)
            ->admin()
            ->has(
                Book::factory()
                    ->count(10)
                    ->sequence(fn($sequence) => ['book_category_id' => $bookCategories->random()->id]))
            ->create();
    }
}

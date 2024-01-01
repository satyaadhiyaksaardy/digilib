<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'quantity' => fake()->numberBetween(1, 100),
            'file_path' => fake()->file(storage_path('dummy/file'), 'storage/app/books', false),
            'cover_path' => fake()->file(storage_path('dummy/cover'), 'storage/app/public/covers', false),
        ];
    }
}

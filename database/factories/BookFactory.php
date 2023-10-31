<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->isbn13,
            'image' => $this->faker->imageUrl(480, 640),
            'published' => $this->faker->date,
            'publisher' => $this->faker->company,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
			'name' => fake()->name(),
			'author' => fake()->name(),
			'genre' => fake()->name(),
			'sinopsis' => fake()->name(),
			'restriction' => 18,
			'main' => fake()->name(),
			'secondary' => fake()->name(),
        ];
    }
}

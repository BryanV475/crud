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
			'name' => $this->faker->name,
			'author' => $this->faker->name,
			'genre' => $this->faker->name,
			'sinopsis' => $this->faker->name,
			'restriction' => $this->faker->name,
			'main' => $this->faker->name,
			'secondary' => $this->faker->name,
        ];
    }
}

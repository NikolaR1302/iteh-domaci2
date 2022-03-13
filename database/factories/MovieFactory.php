<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'director' => $this->faker->name(),
            'year' => $this->faker->year(),
            'user_id' => User::factory(),
            'genre_id' => Genre::factory()
        ];
    }
}

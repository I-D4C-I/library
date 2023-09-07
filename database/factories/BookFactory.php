<?php

namespace Database\Factories;

use App\Enums\BookType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Book>
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
            'title' => implode(" ", fake()->words()),
            'type' => BookType::getRandomValue(),
            'user_id' => User::get()->random()->id,
        ];
    }
}

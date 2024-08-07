<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => 'loremloremloremloremloremlorem',
            'publish' =>  $this->faker->boolean,
            'type' => 'free',
            'language' => 'English'
        ];
    }
}

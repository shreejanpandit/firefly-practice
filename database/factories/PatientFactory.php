<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = \App\Models\Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $genders = ['male', 'female', 'other'];

        return [
            'name' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date(),
            'age' => $this->faker->numberBetween(1, 100),
            'gender' => $genders[array_rand($genders)],
            'image' => 'uploads/download.png', // or use a default image path
        ];
    }
}

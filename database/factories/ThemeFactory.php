<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::upper($this->faker->words(6, true)),
            'status' => $this->faker->randomElement(['ACTIVE', 'LOCKED']),
            'teacher_id' => 1
        ];
    }
}

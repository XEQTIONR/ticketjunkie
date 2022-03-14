<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShowType>
 */
class ShowTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->words(
                ($this->faker->randomNumber(1)%2 + 1),
                true)
            ),
            'description' => $this->faker->paragraph(),
            'status' => 'created',
        ];
    }
}

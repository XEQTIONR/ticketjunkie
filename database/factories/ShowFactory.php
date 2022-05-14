<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$faker = Faker::create();
        return [
            'name' => $this->faker->catchPhrase(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'banner' => $this->faker->imageUrl(640,480),
            'status' => 'created',
            'show_type_id' => \App\Models\ShowType::factory(),
        ];
    }
}

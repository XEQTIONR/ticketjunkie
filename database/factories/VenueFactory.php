<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->company();
        return [
            'name' => $name,
            'title' => $name,
            'unit' => $this->faker->secondaryAddress(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
            'mapping_platform' => 'google',
            'mapping_platform_id' => strval($this->faker->randomNumber(4)),
            'status' => 'created',
        ];
    }
}

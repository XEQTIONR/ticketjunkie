<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organizer>
 */
class OrganizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'business_name' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'phone_number' => $this->faker->phoneNumber(),
            'tin' =>  $this->faker->numerify('##########'),
            'bank_name' => $this->faker->company() . ' Bank',
            'bank_account_number' => $this->faker->numerify('##########'),
            'status' => 'created',
            'created_by' => User::factory(),
        ];
    }
}

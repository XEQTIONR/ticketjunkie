<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'confirmation_number' => $this->faker->md5(),
            'status' => 'created',
            'type' => 'seat',
            'section' =>  strtoupper($this->faker->randomLetter()),
            'seat_number' => strval($this->faker->numberBetween(0,100)),
            'current_price' => 500000,
            'show_id' => \App\Models\Show::factory(),
            'show_slot_id' => \App\Models\ShowSlot::factory(),
            'belongs_to_id' => \App\Models\User::factory(),
        ];
    }
}

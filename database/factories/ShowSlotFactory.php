<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShowSlot>
 */
class ShowSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $carbon = Carbon::parse($this->faker->dateTimeThisYear('+12 months'));
        return [
            'name' => strval( $this->faker->randomNumber( 1, true) ),
            'description' => $this->faker->paragraph(),
            'show_id' => \App\Models\Show::factory(),
            'venue_id' => \App\Models\Venue::factory(),
            'starts_at' => $carbon,
            'ends_at' => $carbon->copy()->addHours($this->faker->numberBetween(4,12)),
        ];
    }
}

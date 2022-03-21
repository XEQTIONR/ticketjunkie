<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'ticket_id' => Ticket::factory(),
            'price' => $this->faker->randomNumber(5, true)
        ];
    }
}

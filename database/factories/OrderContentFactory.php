<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
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
        $user = User::factory();
        return [
            'order_id' => Order::factory()->state([ 'customer_id' => $user]),
            //'ticket_id' => Ticket::factory()->state([ 'belongs_to_id' => $user]),
            'price' => $this->faker->randomNumber(5, true)
        ];
    }
}

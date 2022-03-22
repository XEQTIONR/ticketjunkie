<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizer;
use App\Models\Show;
use App\Models\ShowSlot;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Organizer::factory(10)->has(
            Show::factory()->has(
                ShowSlot::factory(2)->has(
                    Ticket::factory()
                        ->count(10)
                        ->state(fn(array $attr, ShowSlot $slot) => ['show_id' => $slot->show->id])->has(
                            OrderContent::factory()
                                ->state(fn(array $attr, Ticket $ticket) => ['order_id' => Order::factory()
                                        ->state(['customer_id' => $ticket->belongs_to_id])])
                        )
                ),
            'showSlots'),
        'shows')
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderContent;
use App\Models\ShowType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        $types = ShowType::factory()
            ->count(4)
            ->create()
            ->map(function ($item) {
            return ['show_type_id' => $item->id];
        })->values()->all();

        Organizer::factory(10)->has(
            Show::factory()
                ->count(4)
                ->state(new Sequence( ...$types ))
                ->has(
                ShowSlot::factory(2)->has(
                    Ticket::factory()
                        ->count(10)
                        ->state(fn(array $attr, ShowSlot $slot) => ['show_id' => $slot->show->id])->has(
                            OrderContent::factory()
                                ->state(fn(array $attr, Ticket $ticket) => ['order_id' => Order::factory()
                                    ->state(['customer_id' => $ticket->belongs_to_id])
                                ])
                        )
                ),
            'slots'),
        'shows')
            ->create();
    }
}

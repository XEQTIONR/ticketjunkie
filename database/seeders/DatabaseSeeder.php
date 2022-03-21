<?php

namespace Database\Seeders;

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
                        ->state(function (array $attr, ShowSlot $slot) {
                            return [
                                'show_slot_id' => $slot->id,
                                'show_id' => $slot->show->id
                            ];
                        })
                        ->has(OrderContent::factory())
                ),
            'showSlots'),
        'shows')
            ->create();
    }
}

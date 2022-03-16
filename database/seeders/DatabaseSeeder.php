<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        Show::factory(10)
            ->has(
                ShowSlot::factory(2)->has(
                    Ticket::factory()
                        ->count(10)
                        ->state(function (array $attr, ShowSlot $slot) {
                            return [
                                'show_slot_id' => $slot->id,
                                'show_id' => $slot->show->id
                            ];
                        })
                ),
                'showSlots')
            ->create();
    }
}

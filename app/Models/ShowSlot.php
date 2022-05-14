<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowSlot extends Model
{
    public $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime'
    ];

    use HasFactory;

    public function show(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->BelongsTo(Show::class);
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
